<?php

namespace App\Services;

use App\DTO\NewsDto;
use App\Models\News;
use App\Models\NewsPicture;
use App\Services\Helpers\PromiseActionsTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class NewsService {
	use PromiseActionsTrait;

	/**
	 * @var News
	 */
	private $news;

	/**
	 * CategoryService constructor.
	 *
	 * @param News $news
	 */
	public function __construct(News $news) {
		$this->news = $news;
	}

	/**
	 * @return News
	 */
	public function getNews() {
		return $this->news;
	}

	/**
	 * @param NewsDto $newsDto
	 * @return NewsService
	 */
	public function changeAttributes(NewsDto $newsDto): self {
		$this->news->fill($newsDto->toArray());
		return $this;
	}

	/**
	 * @param bool $isMain
	 * @param UploadedFile[]|array $files
	 * @return NewsService
	 */
	public function uploadFiles(array $files, bool $isMain = false): self {
		$this->recordPromiseAction(function () use ($files, $isMain) {
			foreach ($files as $file) {
				$newPicture = new NewsPicture();
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
						/* @var NewsPicture $oldMainPicture */
						$oldMainPicture = $this->news->mainPicture()->first();
						if($oldMainPicture) {
							$this->deletePictureThumb($oldMainPicture);
						}
						$this->news->mainPicture()->save($newPicture);
					}
					else {
						$this->news->pictures()->save($newPicture);
					}
				}
			}
		});
		return $this;
	}

	/**
	 * @param array $picturesIdToDelete
	 * @return NewsService
	 */
	public function deleteFiles(array $picturesIdToDelete): self {
		$this->recordPromiseAction(function () use ($picturesIdToDelete) {
			/* @var Collection|NewsPicture[] $deletingPictures */
			$deletingPictures = $this->news->pictures()
				->whereIn('id', $picturesIdToDelete)
				->get();

			$deletingPictures->each(function ($picture) {
				/* @var NewsPicture $picture */
				$this->deletePictureThumb($picture);
			});
		});
		return $this;
	}

	/**
	 * @param NewsPicture $picture
	 * @return bool|null
	 * @throws \Exception
	 */
	public function deletePictureThumb(NewsPicture $picture) {
		$picture->deleteFile($picture->picture_name);
		$picture->deleteFile($picture->thumb_name);
		return $picture->delete();
	}

	/**
	 * @return NewsService
	 */
	public function commitChanges(): self {
		$this->news->save();

		$this->releasePromiseActions();

		return $this;
	}

}