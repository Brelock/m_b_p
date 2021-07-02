<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\Builder\OrderCriteriaBuilder;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;

class OrderController extends Controller {
  /**
   * @param OrderCriteriaBuilder $criteriaBuilder
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index(OrderCriteriaBuilder $criteriaBuilder) {
    $paginator = Order::filterToPaginate($criteriaBuilder, $criteriaBuilder->max(), $criteriaBuilder->page());
    return view('admin.orders.index', [
      'paginator' => $paginator->appends($criteriaBuilder->getRequest()->all()),
      'orders' => OrderResource::rawPaginator($paginator, $criteriaBuilder->getRequest()),
    ]);
  }

  /**
   * @param OrderCriteriaBuilder $criteriaBuilder
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function archived(OrderCriteriaBuilder $criteriaBuilder) {
    return $this->index($criteriaBuilder->enableOnlyArchived());
  }

  /**
   * @param Order $order
   * @return \Illuminate\Http\JsonResponse
   */
  public function archive(Order $order) {
    $service = new OrderService($order);
    $service
      ->archive()
      ->commitChanges();

    return response()->json([
      'status' => 'success',
      'order' => new OrderResource($service->getOrder()),
    ]);
  }
}