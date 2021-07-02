<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\ProductCriteriaBuilder;
use App\Http\Resources\ProductResource;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class MainController extends Controller {
	/**
	 * @param ProductCriteriaBuilder $criteriaBuilder
	 * @return View
	 */
  public function index(ProductCriteriaBuilder $criteriaBuilder) {
  	$productsNew = ProductResource::rawPaginator(
  		Product::filterToPaginate(
  			$criteriaBuilder->enableIsNew(),
			  $criteriaBuilder->max('max', 15),
			  $criteriaBuilder->page()
		  ));
  	$productsDiscount = ProductResource::rawPaginator(
  		Product::filterToPaginate(
  			$criteriaBuilder->enableIsNew(false)->enableIsDiscount(),
			  $criteriaBuilder->max('max', 15),
			  $criteriaBuilder->page()
		  ));

  	$productsSale = ProductResource::rawPaginator(
  		Product::filterToPaginate(
  			$criteriaBuilder->enableIsDiscount(false)->enableIsSale(),
			  $criteriaBuilder->max('max', 15),
			  $criteriaBuilder->page()
		  ));
    $banners = Banner::query()->get();
    return view('main.index', compact(
	    'productsNew',
	    'productsDiscount',
	    'productsSale',
	    'banners'
    ));
  }
}
