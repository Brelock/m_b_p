<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\ProductCriteriaBuilder;
use App\Criteria\Product\WithDefaultRelationship;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class SunpowerController extends SeoController {
  /**
   * Kness Controller constructor.
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
    $productPerformance = Product::query()->where('type', '=', 2)->orderBy('display_order')->get();
    $productMaxeon = Product::query()->where('type', '=', 3)->orderBy('display_order')->get();
    if ($productPerformance)
      $productPerformance->load(WithDefaultRelationship::relations());
    if ($productMaxeon)
      $productMaxeon->load(WithDefaultRelationship::relations());
    return view('sunpower.index', [
      'productPerformances' => ProductResource::rawList($productPerformance, $criteriaBuilder->getRequest(), false),
      'productMaxeons' => ProductResource::rawList($productMaxeon, $criteriaBuilder->getRequest(), false),

    ]);
  }
}
