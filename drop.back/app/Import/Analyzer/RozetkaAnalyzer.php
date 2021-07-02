<?php

namespace App\Import\Analyzer;

use App\Import\Collection\CategoryCollection;
use App\Import\Collection\OfferCollection;
use App\Import\Reader\Rozetka\CategoryXMLReader;
use App\Import\Reader\Rozetka\OfferXMLReader;

class RozetkaAnalyzer extends BaseAnalyzer {
  /**
   * @var CategoryXMLReader
   */
  protected $categoryXmlReader;

  /**
   * Close reading of opened XML document.
   */
  public function __destruct() {
    if($this->categoryXmlReader)
      $this->categoryXmlReader->closeReading(true);
  }

  /**
   * @return CategoryCollection
   * @throws \Exception
   */
  public function getCategories(): CategoryCollection {
    $this->categoryXmlReader = new CategoryXMLReader($this->filePath);
    $this->categoryXmlReader
      ->enableOrDisableReadCloseAfterParsingStops(false)
      ->parse();

    return $this->categoryXmlReader->getCategories();
  }

  /**
   * @return OfferCollection
   * @throws \Exception
   */
  public function getOffers(): OfferCollection {
    $offerXmlReader = new OfferXMLReader(
      (!$this->categoryXmlReader ? $this->filePath : null),
      ($this->categoryXmlReader ? $this->categoryXmlReader->getReader() : null)
    );

    $offerXmlReader->parse();

    return $offerXmlReader->getOffers();
  }
}