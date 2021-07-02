<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\ProductCriteriaBuilder;
use App\Criteria\Product\WithDefaultRelationship;
use App\Criteria\Category\WithDefaultRelationship as CategoryWithDefaultRelationship;
use App\Helpers\Auth\AuthenticatedUser;
use App\Http\Requests\ProductOrderRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\OrderResource;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Services\Actions\CartServiceAction;
use App\Services\Actions\UrlServiceAction;

class ProductController extends Controller {
  /**
   * @var CartServiceAction
   */
  protected $cartService;

	/**
	 * @var UrlServiceAction
	 */
  protected $urlService;

	/**
	 * ProductController constructor.
	 *
	 * @param CartServiceAction $cartService
	 * @param UrlServiceAction $urlService
	 */
  public function __construct(CartServiceAction $cartService, UrlServiceAction $urlService) {
    $this->cartService = $cartService;
    $this->urlService = $urlService;
  }

  /**
   * @param ProductCriteriaBuilder $criteriaBuilder
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index(ProductCriteriaBuilder $criteriaBuilder) {

    $paginator = Product::filterToPaginate($criteriaBuilder, $criteriaBuilder->max(), $criteriaBuilder->page());

	  $category = Category::whereId(request()->get('categoryId'))->first();
	  if($category) {
		  $category->load(CategoryWithDefaultRelationship::relations());
	  }

    return view('products.index', [
      'paginator' => $paginator->appends($criteriaBuilder->getRequest()->all()),
      'products' => ProductResource::rawPaginator($paginator, $criteriaBuilder->getRequest()),
      'category' => CategoryResource::rawData($category ?: null, null, false),
      'action' => $this->urlService->getUrlWithoutSortParams()
    ]);
  }

  /**
   * @param Product $product
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function show(Product $product) {
    $product->load(WithDefaultRelationship::relations());

    return view('products.show', [
      'product' => ProductResource::rawData($product, null, false),
    ]);
  }

  /**
   * @param  ProductOrderRequest $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function order(ProductOrderRequest $request) {
    $order = Order::findOrReturnNewByCookieHash(AuthenticatedUser::getOrGenerateHashInSession($request));

    $order->attachOwner(AuthenticatedUser::getUser());

    $order = $this->cartService->putProduct($order, $request->getProduct());

    return response()->json([
      'status' => 'success',
      'order' => new OrderResource($order),
      'redirectTo' => route('cart.index'),
    ]);
  }
}
