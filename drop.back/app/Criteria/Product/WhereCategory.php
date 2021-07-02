<?php

namespace App\Criteria\Product;

use App\Criteria\ICriteria;
use App\Models\Category;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WhereCategory implements ICriteria {
	/**
	 * @var int
	 */
	public $categoryId;

	/**
	 * WhereCategory constructor.
   *
	 * @param int $categoryId
	 */
	public function __construct(int $categoryId) {
		$this->categoryId = $categoryId;
	}

	/**
	 * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
	 * @return CriteriaScopes|EloquentBuilder|QueryBuilder|mixed
	 */
	public function apply($builder) {
	  $category = $this->getCategory();

		return $builder->when(!empty($category), function($builder) use($category) {
			/* @var CriteriaScopes|EloquentBuilder|QueryBuilder $builder */
			return $builder->whereIn($builder->withAlias('category_id'), $this->getAllNestedCategoriesIds($category));
		});
	}

  /**
   * @return Category|null
   */
	public function getCategory() : ?Category {
	  /* @var Category $category */
	  $category = Category::query()
      ->with(['subCategories'])
      ->find($this->categoryId);

	  return $category;
  }

  /**
   * @param Category $category
   * @return array
   */
  public function getAllNestedCategoriesIds(Category $category) : array {
	  $ids = [$category->id];

	  foreach($category->subCategories as $subCategory) {
      $ids = array_merge($ids, $this->getAllNestedCategoriesIds($subCategory));
    }

	  return $ids;
  }
}