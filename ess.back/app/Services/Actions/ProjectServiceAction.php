<?php

namespace App\Services\Actions;

use App\DTO\ProjectDto;
use App\Models\Project;
use App\Services\Helpers\ReorderAction;
use App\Services\ProjectService;

class ProjectServiceAction {
	use ReorderAction;
	/**
	 * @param ProjectDto $dto
	 * @return Project
	 */
	public function createProject(ProjectDto $dto): Project {
		return $this->saveProject(new Project(), $dto);
	}

	/**
	 * @param Project $project
	 * @param ProjectDto $dto
	 * @return Project
	 */
	public function updateProject(Project $project, ProjectDto $dto): Project {
		return $this->saveProject($project, $dto);
	}

	/**
	 * @param Project $project
	 * @param ProjectDto $projectDto
	 * @return Project
	 */
	protected function saveProject(Project $project, ProjectDto $projectDto): Project {
		$serviceItemService = new ProjectService($project);

		if ($projectDto->hasMainFile())
			$serviceItemService->uploadFiles([$projectDto->getMainFile()], $projectDto->hasMainFile());

		if ($projectDto->hasFiles())
			$serviceItemService->uploadFiles($projectDto->getFiles());

		if($projectDto->hasToDeleteFiles()) {
			$serviceItemService->deleteFiles($projectDto->getPicturesIdToDelete());
		}

		$serviceItemService
			->changeAttributes($projectDto)
			->commitChanges();

		return $serviceItemService->getProject();
	}

}