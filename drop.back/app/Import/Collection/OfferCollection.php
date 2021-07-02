<?php

namespace App\Import\Collection;

use App\Import\Entity\BaseEntity;
use App\Import\Entity\Offer;

class OfferCollection extends BaseCollection {
  /**
   * @param array $item
   * @return BaseEntity
   */
  public function mapToEntity(array $item): BaseEntity {
    return Offer::mapFromArray($item);
  }

  /**
   * @return OfferCollection
   */
  public function keyById() : self {
    return $this->keyBy(function($offer) {
      /* @var Offer $offer */
      return $offer->getId();
    });
  }

  /**
   * @return array
   */
  public function ids() : array {
    return $this
      ->map(function($offer) {
        /* @var Offer $offer */
        return $offer->getId();
      })
      ->all();
  }
}