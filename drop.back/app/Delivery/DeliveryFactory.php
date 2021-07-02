<?php

namespace App\Delivery;

use App\Delivery\Models\NovaPoshtaInvoice;
use App\Delivery\Models\NullObjectInvoice;
use App\Delivery\Providers\NovaPoshtaDeliveryProvider;
use App\Delivery\Providers\NullObjectDeliveryProvider;
use App\Enums\DeliveryTypes;
use App\Models\Order;

class DeliveryFactory {
  /**
   * @param Order $order
   * @return Invoice
   */
  public static function createInvoice(Order $order) : Invoice {
    switch($order->delivery_type) {
      case DeliveryTypes::NOVA_POSHTA: {
        if($order->novaPoshtaInternetDocument)
          return new NovaPoshtaInvoice($order->novaPoshtaInternetDocument->createEntityInternetDocument());
      }

      default: {
        return new NullObjectInvoice();
      }
      break;
    }
  }

  /**
   * @param  int $deliveryType
   * @return DeliveryProvider
   */
  public static function createProvider(int $deliveryType) : DeliveryProvider {
    switch($deliveryType) {
      case DeliveryTypes::NOVA_POSHTA: {
        return app(NovaPoshtaDeliveryProvider::class);
      }
      break;

      default: {
        return new NullObjectDeliveryProvider();
      }
      break;
    }
  }
}