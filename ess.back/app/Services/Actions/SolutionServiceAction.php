<?php

namespace App\Services\Actions;

use App\DTO\SolutionDto;
use App\Models\Solution;
use App\Services\Helpers\ReorderAction;
use App\Services\SolutionService;

class SolutionServiceAction {
	use ReorderAction;
	/**
	 * @param SolutionDto $dto
	 * @return Solution
	 */
	public function createSolution(SolutionDto $dto): Solution {
		return $this->saveSolution(new Solution(), $dto);
	}

	/**
	 * @param Solution $solution
	 * @param SolutionDto $dto
	 * @return Solution
	 */
	public function updateSolution(Solution $solution, SolutionDto $dto): Solution {
		return $this->saveSolution($solution, $dto);
	}

	/**
	 * @param Solution $solution
	 * @param SolutionDto $solutionDto
	 * @return Solution
	 */
	protected function saveSolution(Solution $solution, SolutionDto $solutionDto): Solution {
		$serviceItemService = new SolutionService($solution);

    if ($solutionDto->hasFile())
      $serviceItemService->uploadNewFile($solutionDto->getUploadedFile());

    if ($solutionDto->hasDeletePicture())
      $serviceItemService->deletePicture();

		$serviceItemService
			->changeAttributes($solutionDto)
			->commitChanges();

		return $serviceItemService->getSolution();
	}

  /**
   * @param Solution $solution
   * @return $this
   */
	public function deleteSolution(Solution $solution){
    $serviceItemService = new SolutionService($solution);
    $serviceItemService
      ->deletePicture();

    return $this;
  }

}