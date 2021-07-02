<?php

namespace App\Services\Actions;

use App\Delivery\Invoice;
use App\DTO\EditOrderProductDto;
use App\DTO\OrderDto;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\OrderService;

class CartServiceAction {
  /**
   * @param Order $order
   * @param Product $product
   *
   * @return Order
   */
  public function putProduct(Order $order, Product $product) : Order {
    $service = new OrderService($order);

    $service
      ->active()
      ->addProduct($product)
      ->commitChanges();

    return $service->getOrder();
  }

  /**
   * @param OrderProduct $orderProduct
   * @param EditOrderProductDto $dto
   *
   * @return OrderProduct
   */
  public function editProduct(OrderProduct $orderProduct, EditOrderProductDto $dto) : OrderProduct {
    $orderProduct->fill($dto->toArray());
    $orderProduct->save();

    $service = new OrderService($orderProduct->order);

    $service->recalculateAmounts();

    return $orderProduct;
  }

  /**
   * @param OrderProduct $orderProduct
   * @return bool
   */
  public function deleteProduct(OrderProduct $orderProduct) : bool {
    if($orderProduct->forceDelete()) {
      $service = new OrderService($orderProduct->order);

      $service->recalculateAmounts();

      return true;
    }

    return false;
  }

  /**
   * @param  Order $order
   * @param  OrderDto $dto
   * @param  Invoice $deliveryInvoice
   *
   * @return Order
   */
  public function checkout(Order $order, OrderDto $dto, Invoice $deliveryInvoice) : Order {
    $service = new OrderService($order);

    $service
      ->changeAttributes($dto)
      ->attachNewDeliveryInvoice($deliveryInvoice)
      ->active()
      ->confirm()
      ->commitChanges();

    return $service->getOrder();
  }
}
