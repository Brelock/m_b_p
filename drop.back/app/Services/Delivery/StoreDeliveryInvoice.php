<?php

namespace App\Services\Delivery;

use App\Delivery\Invoice;
use App\Models\Order;

interface StoreDeliveryInvoice {
  /**
   * @param Order $order
   * @param Invoice $invoice
   *
   * @return bool
   */
  public function store(Order $order, Invoice $invoice) : bool;
}