<?php

namespace App\Import\Seeder;

use App\Collection\CategoryCollection;
use App\Import\Collection\CategoryCollection as CategoryEntityCollection;
use App\Import\Collection\OfferCollection;

class BaseSeeder {
  /**
   * @param CategoryEntityCollection $collection
   * @return CategorySeeder
   */
  public function categorySeeder(CategoryEntityCollection $collection) : CategorySeeder {
    return new CategorySeeder($collection);
  }

  /**
   * @param OfferCollection $offerCollection
   * @param CategoryCollection $categoryCollection
   *
   * @return ProductSeeder
   */
  public function productSeeder(OfferCollection $offerCollection, CategoryCollection $categoryCollection) : ProductSeeder {
    return new ProductSeeder($offerCollection, $categoryCollection);
  }
}