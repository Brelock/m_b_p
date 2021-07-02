<?php

namespace App\Import\Collection;

use App\Import\Entity\BaseEntity;
use App\Import\Entity\Category;

class CategoryCollection extends BaseCollection {
  /**
   * @param array $item
   * @return BaseEntity
   */
  public function mapToEntity(array $item): BaseEntity {
    return Category::mapFromArray($item);
  }

  /**
   * @param null|string $parentId
   *
   * @return CategoryCollection
   */
  public function buildTreeWithSubCategories(?string $parentId = null) : self {
    /* @var Category[] $nested */
    $nested = [];

    /* @var Category[] $categories */
    $categories = $this->items;

    $displayOrder = 0;

    foreach ($categories as $i => $category) {
    	if ($category->getParentId() == $parentId) {
		    $category->displayOrder = ++$displayOrder;

        $subCategories = $this->buildTreeWithSubCategories($category->getId());

        if ($subCategories->isNotEmpty())
          $category->subCategories = $category->subCategories->merge($subCategories)->sortByDisplayOrder();

        $nested[] = $category;
      }
    }

    return new self($nested);
  }

	/**
	 * @return $this
	 */
  public function sortByDisplayOrder(): self {
  	return $this->sortBy(function($category) {
		  /* @var Category $category */
		  return $category->displayOrder;
	  });
  }

  /**
   * Returns list of ID's from category.
   *
   * @return array
   */
  public function externalIds() : array {
    return $this
      ->map(function($entity) {
        /* @var Category $entity */
        return $entity->getId();
      })
      ->all();
  }
}