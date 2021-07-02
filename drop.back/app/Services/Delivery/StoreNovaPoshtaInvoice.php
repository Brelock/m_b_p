<?php

namespace App\Services\Delivery;

use App\Delivery\Invoice;
use App\Models\NovaPoshtaInternetDocument;
use App\Models\Order;

class StoreNovaPoshtaInvoice implements StoreDeliveryInvoice {
  /**
   * @param Order $order
   * @param Invoice $invoice
   *
   * @return bool
   */
  public function store(Order $order, Invoice $invoice): bool {
    $result = $order
      ->novaPoshtaInternetDocument()
      ->save(new NovaPoshtaInternetDocument($invoice->toArray()));

    return $result !== false;
  }
}