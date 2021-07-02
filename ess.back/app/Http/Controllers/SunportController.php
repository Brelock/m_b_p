<?php

namespace App\Http\Controllers;


use App\Criteria\Product\WithDefaultRelationship as ProductWithDefaultRelationship;
use App\Criteria\Sunport\WithDefaultRelationship as SunportWithDefaultRelationship;
use App\Enums\ProductsType;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SunportResource;
use App\Models\Product;
use App\Models\Sunport;
use Illuminate\Http\Request;

class SunportController extends SeoController {
  /**
   * Sunport Controller constructor.
   * @param Request $request
   */
  public function __construct(Request $request) {
    parent::__construct($request);
  }

  /**
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index() {
    $productsSunport = Product::query()->where('type', ProductsType::SUNPORT)->orderBy('display_order')->get();
    $sunport = Sunport::query()->orderBy('display_order')->get();
    if ($sunport)
      $sunport->load(SunportWithDefaultRelationship::relations());
    if ($productsSunport)
      $productsSunport->load(ProductWithDefaultRelationship::relations());
    return view('sunport.index', [
      'products' => ProductResource::rawList($productsSunport, null, false),
      'sunports' => SunportResource::rawList($sunport, null, false),
      ]);
  }
}
