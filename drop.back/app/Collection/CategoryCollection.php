<?php

namespace App\Collection;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryCollection extends Collection {
  /**
   * Returns collections with keys by external_id from Category.
   *
   * @return CategoryCollection
   */
  public function keyByExternalId() {
    return $this->keyBy(function($category) {
      /* @var Category $category */
      if($category->hasExternalId())
        return $category->external_id;

      return $category->id;
    });
  }

  /**
   * @param  string $id
   * @return Category|null
   */
  public function findByExternalId(string $id) : ?Category {
    return $this->firstWhere('external_id', $id);
  }

  /**
   * @param  string $parentId
   * @return Category|null
   */
  public function findByParentExternalId(string $parentId) : ?Category {
    return $this->firstWhere('external_parent_id', $parentId);
  }

	/**
	 * @param  Category|null $parentCategory
	 * @return $this
	 */
	public function buildTreeWithSubCategories(?Category $parentCategory = null): self {
		/* @var Category[] $nested */
		$nested = [];

		/* @var Category[] $categories */
		$categories = $this->items;

		foreach ($categories as $category) {
			if ($category->parent_id == optional($parentCategory)->id) {
				$subCategories = $this->buildTreeWithSubCategories($category);

				if ($subCategories->isNotEmpty()) {
					$category->_subCategories = !$category->_subCategories
						? new CategoryCollection($subCategories)
						: $category->_subCategories->merge($subCategories);

					if($parentCategory) {
						$parentCategory->_totalProducts += $category->_totalProducts;
					}
				} else if($parentCategory) {
					$parentCategory->_totalProducts += $category->products_count;

					$category->_totalProducts = $category->products_count;
				}

				$nested[] = $category;
			}
		}

		return new self($nested);
	}

  /**
   * @return CategoryCollection
   */
	public function clearParentCategory() : self {
	  /* @var Category $category */
	  $category = $this->first();
	  return new self($category ? $category->_subCategories : []);
  }
}