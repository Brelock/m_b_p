<?php

namespace App\Import\Reader\Rozetka;

use App\Import\Collection\CategoryCollection;
use App\Import\Entity\Category;
use App\Import\Reader\BaseXMLReader;

class CategoryXMLReader extends BaseXMLReader {
  /**
   * @var string
   */
  protected $referenceTagName = 'categories';

  /**
   * @var CategoryCollection
   */
  protected $categories;

  /**
   * @return CategoryCollection
   */
  public function getCategories(): CategoryCollection {
    return $this->categories;
  }

  /**
   * Initialize collection with widgets.
   */
  protected function init() {
    parent::init();

    $this->categories = new CategoryCollection();
  }

  /**
   * Parse tag <category>.
   */
  protected function parseCategory() {
    $this->categories->push(
      new Category(
        $this->getReader()->getAttribute('id'),
        $this->getReader()->readString(),
        $this->getReader()->getAttribute('parentId')
      )
    );
  }
}