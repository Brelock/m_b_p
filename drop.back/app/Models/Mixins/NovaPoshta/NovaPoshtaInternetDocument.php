<?php

namespace App\Models\Mixins\NovaPoshta;

use App\NovaPoshta\Entity\CreatedInternetDocument;

trait NovaPoshtaInternetDocument {
  /**
   * @return CreatedInternetDocument
   */
  public function createEntityInternetDocument() : CreatedInternetDocument {
    return new CreatedInternetDocument(
      $this->ref,
      $this->cost,
      $this->created_at->format('d.m.Y'),
      $this->ttn,
      'InternetDocument'
    );
  }
}