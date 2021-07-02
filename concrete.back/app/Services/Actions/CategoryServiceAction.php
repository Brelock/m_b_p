<?php

namespace App\Services\Actions;

use App\DTO\CategoryDto;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryServiceAction {
	/**
	 * @param Category $category
	 * @param CategoryDto $dto
	 * @return Category
	 */
	public function updateCategory(Category $category, CategoryDto $dto): Category {
		return $this->saveCategory($category, $dto);
	}

	/**
	 * @param Category $category
	 * @param CategoryDto $categoryDto
	 * @return Category
	 */
	protected function saveCategory(Category $category, CategoryDto $categoryDto): Category {
		$serviceItemService = new CategoryService($category);

		if ($categoryDto->hasFiles()) {
			$serviceItemService->deleteFiles(array_keys($categoryDto->getFiles()));
			$serviceItemService->uploadFiles($categoryDto->getFiles());
		}

		$serviceItemService
			->changeAttributes($categoryDto)
			->commitChanges();

		return $serviceItemService->getCategory();
	}
}