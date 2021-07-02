<?php

namespace App\Delivery\Providers;

use App\Delivery\DeliveryProvider;
use App\Delivery\Invoice;
use App\Delivery\Models\NullObjectInvoice;
use App\DTO\OrderDto;
use App\Models\Order;

class NullObjectDeliveryProvider implements DeliveryProvider {
  /**
   * @param  OrderDto $dto
   * @param  Order $order
   *
   * @return Invoice
   */
  public function generateInvoice(OrderDto $dto, Order $order): Invoice {
    return new NullObjectInvoice();
  }
}