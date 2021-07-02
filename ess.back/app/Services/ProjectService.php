<?php

namespace App\Services;

use App\DTO\ProjectDto;
use App\Models\Project;
use App\Models\ProjectPicture;
use App\Services\Helpers\PromiseActionsTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class ProjectService {
	use PromiseActionsTrait;

	/**
	 * @var Project
	 */
	private $project;

	/**
	 * ProjectService constructor.
	 *
	 * @param Project $project
	 */
	public function __construct(Project $project) {
		$this->project = $project;
	}

	/**
	 * @return Project
	 */
	public function getProject() {
		return $this->project;
	}

	/**
	 * @param ProjectDto $projectDto
	 * @return $this
	 */
	public function changeAttributes(ProjectDto $projectDto): self {
		$this->project->fill($projectDto->toArray());
		return $this;
	}

	/**
	 * @param bool $isMain
	 * @param UploadedFile[]|array $files
	 * @return ProjectService
	 */
	public function uploadFiles(array $files, bool $isMain = false): self {
		$this->recordPromiseAction(function () use ($files, $isMain) {
			foreach ($files as $file) {
				$newPicture = new ProjectPicture();
				/* @var UploadedFile $uploadedImage */
				$uploadedImage = $file;
				$pictureService = new PictureService($uploadedImage);
				$newFileName = $pictureService->storeToFolder($newPicture->directoryStorage());
				if (!empty($newFileName)) {
					$newPicture->picture_name = $newFileName;
					$newThumbFileName = "thumb_" . $newFileName;

					if ($pictureService->createThumbnail($newPicture->assetRelative($newFileName), $newPicture->assetRelative($newThumbFileName))) {
						$newPicture->thumb_name = $newThumbFileName;
					}
					if($isMain) {
						$newPicture->is_main = 1;
						/* @var ProjectPicture $oldMainPicture */
						$oldMainPicture = $this->project->mainPicture()->first();
						if($oldMainPicture) {
							$this->deletePictureThumb($oldMainPicture);
						}
						$this->project->mainPicture()->save($newPicture);
					}
					else {
						$this->project->pictures()->save($newPicture);
					}
				}
			}
		});
		return $this;
	}

	/**
	 * @param array $picturesIdToDelete
	 * @return ProjectService
	 */
	public function deleteFiles(array $picturesIdToDelete): self {
		$this->recordPromiseAction(function () use ($picturesIdToDelete) {
			/* @var Collection|ProjectPicture[] $deletingPictures */
			$deletingPictures = $this->project->pictures()
				->whereIn('id', $picturesIdToDelete)
				->get();

			$deletingPictures->each(function ($picture) {
				/* @var ProjectPicture $picture */
				$this->deletePictureThumb($picture);
			});
		});
		return $this;
	}

	/**
	 * @param ProjectPicture $picture
	 * @return bool|null
	 * @throws \Exception
	 */
	public function deletePictureThumb(ProjectPicture $picture) {
		$picture->deleteFile($picture->picture_name);
		$picture->deleteFile($picture->thumb_name);
		return $picture->delete();
	}

	/**
	 * @return ProjectService
	 */
	public function commitChanges(): self {
		$this->project->save();

		$this->releasePromiseActions();

		return $this;
	}
}