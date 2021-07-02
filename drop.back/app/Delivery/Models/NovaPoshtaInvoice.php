<?php

namespace App\Delivery\Models;

use App\Delivery\Invoice;
use App\NovaPoshta\Entity\CreatedInternetDocument;

class NovaPoshtaInvoice implements Invoice {
  /**
   * @var CreatedInternetDocument
   */
  protected $internetDocument;

  /**
   * NovaPoshtaInvoice constructor.
   *
   * @param CreatedInternetDocument $internetDocument
   */
  public function __construct(CreatedInternetDocument $internetDocument) {
    $this->internetDocument = $internetDocument;
  }

  /**
   * @return string
   */
  public function getTTN(): string {
    return $this->internetDocument->getTtn();
  }

  /**
   * @return string
   */
  public function getRef(): string {
    return $this->internetDocument->getRef();
  }

  /**
   * @return float
   */
  public function getCost(): float {
    return (float)$this->internetDocument->getCost();
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [
      'ttn' => $this->getTTN(),
      'ref' => $this->getRef(),
      'cost' => $this->getCost(),
      'estimated_delivery_date' => $this->internetDocument->getEstimatedDeliveryDate(),
      'type_document' => $this->internetDocument->getType(),
    ];
  }
}