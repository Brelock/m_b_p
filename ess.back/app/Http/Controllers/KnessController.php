<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\ProductCriteriaBuilder;
use App\Criteria\Product\WithDefaultRelationship;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class KnessController extends SeoController {
  /**
   * PrivatePersonController constructor.
   * @param Request $request
   */
  public function __construct(Request $request) {
    parent::__construct($request);
  }

  /**
   * @param ProductCriteriaBuilder $criteriaBuilder
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index(ProductCriteriaBuilder $criteriaBuilder) {
    $productKness = Product::query()->where('type', '=', 1)->orderBy('display_order')->first();
    if ($productKness)
      $productKness->load(WithDefaultRelationship::relations());
    return view('kness.index', [
      'product' => ProductResource::rawData($productKness, $criteriaBuilder->getRequest(), false),
    ]);
  }
}
