<?php

namespace App\NovaPoshta\Collection;

use App\Helpers\RequestHelper;
use App\NovaPoshta\Entity\BaseEntity;
use Illuminate\Support\Collection;

abstract class BaseCollection extends Collection {
  /**
   * Map item of array to entity.
   *
   * @param array $item
   * @return BaseEntity
   */
  abstract public function hydrate(array $item) : BaseEntity;

  /**
   * @return static
   */
  public function init() {
    return $this->preFilter()->mainHydrate();
  }

  /**
   * @return static
   */
  public function mainHydrate() {
    return $this->map(function($item) {
      return $this->hydrate($item);
    });
  }

  /**
   * @return static
   */
  public function preFilter() {
    return $this;
  }

  /**
   * Retrieve data from a collection in chunks.
   *
   * @param int $max
   * @param int $page
   * @return BaseCollection
   */
  public function paginate(int $max, int $page) : self {
    $offset = RequestHelper::offsetPages($max, $page);
    return $this->slice($offset, $max);
  }

  /**
   * Chunk the results of the collection.
   *
   * @param \Closure $callback
   * @param int $max
   * @return bool
   */
  public function piece(\Closure $callback, int $max) {
    $page = 1;

    do {
      $results = $this->paginate($max, $page);
      $results = $results->init();

      $countResults = $results->count();

      if($countResults == 0)
        break;

      if($callback($results, $page) === false)
        return false;

      unset($results);

      $page++;
    } while($countResults == $max);

    return true;
  }
}