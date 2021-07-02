<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\CartCriteriaBuilder;
use App\Criteria\Builder\CriteriaBuilder;
use App\Criteria\Order\WithDefaultRelationship;
use App\Delivery\DeliveryFactory;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\EditOrderProductRequest;
use App\Http\Requests\FlashSuccessOrderRequest;
use App\Http\Resources\NovaPoshta\NovaPoshtaCityResource;
use App\Http\Resources\OrderProductResource;
use App\Http\Resources\OrderResource;
use App\Models\NovaPoshtaCity;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\Actions\CartServiceAction;

class CartController extends Controller {
  const _FLASH_SUCCESS_ORDER_KEY = '_successOrder';

  /**
   * @var CartServiceAction
   */
  protected $cartService;

  /**
   * CartController constructor.
   *
   * @param CartServiceAction $cartService
   */
  public function __construct(CartServiceAction $cartService) {
    $this->cartService = $cartService;
  }

  /**
   * Display a listing of the resource.
   *
   * @param CartCriteriaBuilder $cartCriteriaBuilder
   * @param CriteriaBuilder $criteriaBuilder
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index(CartCriteriaBuilder $cartCriteriaBuilder, CriteriaBuilder $criteriaBuilder) {
    $order = Order::findOne($cartCriteriaBuilder);

    return view('cart.index', [
      'order' => OrderResource::rawData($order, $cartCriteriaBuilder->getRequest(), false),
      'novaposhtaCities' => NovaPoshtaCityResource::rawList(NovaPoshtaCity::fetchAll($criteriaBuilder), null, false),
    ]);
  }

  /**
   * @param EditOrderProductRequest $request
   * @param OrderProduct $orderProduct
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function editItem(EditOrderProductRequest $request, OrderProduct $orderProduct) {
    $orderProduct = $this->cartService->editProduct($orderProduct, $request->createDto());

    return response()->json([
      'status' => 'edited',
      'orderProduct' => new OrderProductResource($orderProduct),
    ]);
  }

  /**
   * @param OrderProduct $orderProduct
   * @return \Illuminate\Http\JsonResponse
   */
  public function deleteItem(OrderProduct $orderProduct) {
    if($this->cartService->deleteProduct($orderProduct))
      return response()->json(['status' => 'deleted']);

    return response()->json(['status' => 'failed']);
  }

  /**
   * @param CheckoutRequest $request
   * @param CartCriteriaBuilder $cartCriteriaBuilder
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function checkout(CheckoutRequest $request, CartCriteriaBuilder $cartCriteriaBuilder) {
    /* @var Order $order */
    $order = Order::findOneOrFail($cartCriteriaBuilder);
    $order->checkHasProducts();

    $orderDto = $request->createdDto();
    $invoice = DeliveryFactory::createProvider($orderDto->getDeliveryType())->generateInvoice($orderDto, $order);

    $order = $this->cartService->checkout($order, $orderDto, $invoice);

    $request
      ->session()
      ->flash(self::_FLASH_SUCCESS_ORDER_KEY, $order->load(WithDefaultRelationship::relations()));

    return response()->json([
      'status' => 'decorated',
      'order' => new OrderResource($order),
    ]);
  }

  /**
   * @param FlashSuccessOrderRequest $request
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function success(FlashSuccessOrderRequest $request) {
    return view('cart.success', [
      'order' => OrderResource::rawData($request->getSuccessOrder(), null, false),
    ]);
  }
}
