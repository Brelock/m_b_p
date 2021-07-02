<?php

namespace App\Services\Actions;

use App\DTO\ResultDto;
use App\Models\Category;
use App\Models\Result;
use App\Services\ResultService;

class ResultServiceAction {
	/**
	 * @param ResultDto $dto
	 * @return Result
	 */
	public function createResult(ResultDto $dto): Result {
		return $this->saveResult(new Result(), $dto);
	}

	/**
	 * @param Result $result
	 * @param ResultDto $dto
	 * @return Result
	 */
	protected function saveResult(Result $result, ResultDto $dto): Result {
		$service = new ResultService($result);
		$service
			->changeAttributes($dto)
			->calculation($dto->getParamsToCalculate(), $this->getFormula($dto->getCategoryId()))
			->commitChanges();

		return $service->getRequest();
	}

	/**
	 * @param int $categoryId
	 * @return string
	 */
	public function getFormula(int $categoryId): string {
		return Category::query()->whereId($categoryId)->value('formula');
	}

}