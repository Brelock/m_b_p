<?php

namespace App\Services;

use App\DTO\CategoryDto;
use App\Models\Category;
use App\Services\Helpers\PromiseActionsTrait;
use App\Import\Entity\Category as CategoryEntity;

class CategoryService {
  use PromiseActionsTrait;

  /**
   * @var Category
   */
  private $category;

  /**
   * CategoryItemService constructor.
   *
   * @param Category $category
   */
  public function __construct(Category $category) {
    $this->category = $category;
  }

  /**
   * @return Category
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * Check is category created in DB or no.
   *
   * @return bool
   */
  public function isNewCategory(): bool {
    return !$this->category->exists;
  }

  /**
   * @param CategoryDto $categoryDto
   * @return CategoryService
   */
  public function changeAttributes(CategoryDto $categoryDto): self {
    $this->category->fill($categoryDto->toArray());
    return $this;
  }

  /**
   * @param CategoryEntity $entity
   * @return CategoryService
   */
  public function copyFromCategoryEntity(CategoryEntity $entity) : self {
    $this->category->fill($entity->toArray());
    return $this;
  }

  /**
   * @param Category|null $category
   * @return CategoryService
   */
  public function attachOrDetachParentCategory(?Category $category) : self {
    $this->category->parent()->associate($category);
    return $this;
  }

  /**
   * @param array $paramsIds
   * @return CategoryService
   */
  public function attachParams(array $paramsIds) : self {
    $this->recordPromiseAction(function() use($paramsIds) {
      $this->category->params()->sync($paramsIds);
    });

    return $this;
  }

  /**
   * @return CategoryService
   */
  public function commitChanges(): self {
    $this->category->save();

    $this->releasePromiseActions();

    return $this;
  }
}