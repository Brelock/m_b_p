<?php

namespace App\Delivery;

use App\DTO\OrderDto;
use App\Models\Order;

interface DeliveryProvider {
  /**
   * @param  OrderDto $dto
   * @param  Order $order
   *
   * @return Invoice
   */
  public function generateInvoice(OrderDto $dto, Order $order) : Invoice;
}