<?php

namespace App\Import\Analyzer;

use App\Import\Collection\CategoryCollection;
use App\Import\Collection\OfferCollection;

abstract class BaseAnalyzer {
  /**
   * @var string
   */
  protected $filePath;

  /**
   * BaseAnalyzer constructor.
   *
   * @param string $filePath
   */
  public function __construct(string $filePath) {
    $this->filePath = $filePath;
  }

  /**
   * @return CategoryCollection
   */
  abstract public function getCategories(): CategoryCollection;

  /**
   * @return OfferCollection
   */
  abstract public function getOffers(): OfferCollection;
}