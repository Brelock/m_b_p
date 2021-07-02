<?php

namespace App\Models\Mixins;

use App\Collection\ProductCollection;
use App\Enums\ProductStatusTypes;
use App\Models\Param;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

trait ProductMixin {
	/**
	 * @param Builder $query
	 * @param mixed $value
	 * @return \Closure
	 */
  protected function getFullTextSearchColumn($query, $value) {
	  return function ($query, $value) {
		  /**
		   * @var Builder $query
		   * @var mixed $value
		   */
		  return $query->where(function ($query) use ($value) {
			  /**
			   * @var Builder $query
			   * @var mixed $value
			   */
			  $query
				  ->where('name', 'like', "%{$value}%")
				  ->orWhere('art', 'like', "%{$value}%");
		  });
	  };
  }

  /**
   * @param array $models
   * @return ProductCollection|Collection
   */
  public function newCollection(array $models = []) {
    return new ProductCollection($models);
  }

  /**
   * @return bool
   */
  public function hasExternalId() : bool {
    return !empty($this->external_id);
  }

	/**
	 * @return bool
	 */
	public function isSale() {
		return $this->params()->where(Param::getTableName().".title", ProductStatusTypes::SALE)->exists();
	}

	/**
	 * @return bool
	 */
	public function isDiscount() {
		return $this->params()->where(Param::getTableName().".title", ProductStatusTypes::DISCOUNT)->exists();
	}

	/**
	 * @return bool
	 */
	public function isNew() {
		return $this->params()->where(Param::getTableName().".title", ProductStatusTypes::NEW)->exists();

	}
}