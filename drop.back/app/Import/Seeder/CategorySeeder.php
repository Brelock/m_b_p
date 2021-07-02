<?php

namespace App\Import\Seeder;

use App\Collection\CategoryCollection;
use App\Import\Collection\CategoryCollection as CategoryEntityCollection;
use App\Models\Category;
use App\Import\Entity\Category as CategoryEntity;
use App\Services\CategoryService;

class CategorySeeder {
  /**
   * @var CategoryEntityCollection
   */
  protected $entities;

  /**
   * CategorySeeder constructor.
   *
   * @param CategoryEntityCollection $entities
   */
  public function __construct(CategoryEntityCollection $entities) {
    $this->entities = $entities->keyBy(function ($entity) {
      /* @var CategoryEntity $entity */
      return $entity->getId();
    });
  }

  /**
   * @return CategoryCollection
   */
  protected function fetchExistModels() : CategoryCollection {
    /* @var CategoryCollection $categories */
    $categories = Category::all();

    return $categories->keyByExternalId();
  }

  /**
   * @param CategoryEntity $category
   * @param Category|null $parent
   *
   * @return Category
   */
  protected function createNewCategory(CategoryEntity $category, ?Category $parent) : Category {
    return $this->saveCategory(new Category(), $category, $parent);
  }

  /**
   * @param Category $model
   * @param CategoryEntity $entity
   * @param Category|null $parent
   *
   * @return Category
   */
  protected function saveCategory(Category $model, CategoryEntity $entity, ?Category $parent) : Category {
    $service = new CategoryService($model);

    $service
      ->copyFromCategoryEntity($entity)
      ->attachOrDetachParentCategory($parent);

    $service->commitChanges();

    return $service->getCategory();
  }

  /**
   * @param CategoryEntity $entity
   * @param CategoryCollection $collection
   * @param CategoryEntity|null $entityParent
   *
   * @return CategoryCollection
   */
  protected function seed(CategoryEntity $entity, CategoryCollection $collection, ?CategoryEntity $entityParent = null) : CategoryCollection {
    $newParentCategory = null;
    if($entityParent) {
    	$parentOfEntityParent = $entityParent->hasParentId()
		    ? $collection->findByExternalId($entityParent->getParentId())
		    : null;

      $newParentCategory = $collection->findByExternalId($entityParent->getId());
      if(!$newParentCategory) {
        $newParentCategory = $this->createNewCategory($entityParent, $parentOfEntityParent);
	      $collection->push($newParentCategory);
      } else {
	      $this->saveCategory($newParentCategory, $entityParent, $parentOfEntityParent);
      }
    }

    /* @var Category $existCategory */
    $existCategory = $collection->findByExternalId($entity->getId());

    if(!$existCategory) {
      $newCategory = $this->createNewCategory($entity, $newParentCategory);
	    $collection->push($newCategory);
    } else {
	    $this->saveCategory($existCategory, $entity, $newParentCategory);
    }

    $subCategories = $entity->getSubCategories();
    if($subCategories->isNotEmpty())
      foreach($subCategories as $subCategory)
        $collection = $collection->merge($this->seed($subCategory, $collection, $entity));

    return $collection;
  }

  /**
   * @return CategoryCollection
   */
  public function run() : CategoryCollection {
    $existCategories = $this->fetchExistModels();

	  $existCategories
		  ->diffKeys($this->entities)
		  ->each(function ($category) {
		  	/* @var Category $category */

			  $category->delete();
		  });

	  $this->entities
		  ->buildTreeWithSubCategories()
		  ->each(function($rawCategory) use(&$existCategories) {
		    /* @var CategoryEntity $rawCategory */

			  $existCategories = $existCategories->merge($this->seed($rawCategory, $existCategories));
		  });

    return $existCategories;
  }
}