<?php

namespace App\Services\Actions;

use App\DTO\CategoryDto;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryServiceAction {
  /**
   * @param CategoryDto $categoryDto
   * @return Category
   */
  public function createCategory(CategoryDto $categoryDto): Category {
    return $this->saveCategory(new Category(), $categoryDto);
  }

  /**
   * @param Category $category
   * @param CategoryDto $categoryDto
   * @return Category
   */
  public function updateCategory(Category $category, CategoryDto $categoryDto): Category {
    return $this->saveCategory($category, $categoryDto);
  }

  /**
   * @param Category $category
   * @param CategoryDto $categoryDto
   * @return Category
   */
  protected function saveCategory(Category $category, CategoryDto $categoryDto): Category {
    $serviceItemService = new CategoryService($category);
    $serviceItemService
      ->changeAttributes($categoryDto)
      ->commitChanges();

    return $serviceItemService->getCategory();
  }
}