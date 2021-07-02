<?php

namespace App\Widgets;

use App\Collection\CategoryCollection;
use App\Models\Category;
use \Arrilot\Widgets\AbstractWidget;

class CategoryWidget extends AbstractWidget {
  /**
   * Treat this method as a controller action.
   * Return view() or other content to display.
   */
  public function run() {
    /* @var CategoryCollection $categories */
    $categories = Category::query()->withCount('products')->get();

    return view('widgets.categories-sidebar', [
      'categories' => $categories->buildTreeWithSubCategories()->clearParentCategory(),
    ]);
  }
}