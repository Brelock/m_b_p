<?php

namespace App\Services\Delivery;

use App\Enums\DeliveryTypes;
use App\Models\Order;

class StoreDeliveryInvoiceFactory {
  /**
   * @param Order $order
   * @return StoreDeliveryInvoice
   */
  public static function createStore(Order $order) : StoreDeliveryInvoice {
    switch($order->delivery_type) {
      case DeliveryTypes::NOVA_POSHTA: {
        return new StoreNovaPoshtaInvoice();
      }
      break;

      default: {
        return new StoreNullObjectInvoice();
      }
      break;
    }
  }
}