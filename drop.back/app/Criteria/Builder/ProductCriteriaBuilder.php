<?php

namespace App\Criteria\Builder;

use App\Criteria\Base\QuickCriteria;
use App\Criteria\Base\SelectAll;
use App\Criteria\Base\SortByStrategyCriteria;
use App\Criteria\Product\OnlyDiscount;
use App\Criteria\Product\OnlyNew;
use App\Criteria\Product\OnlySale;
use App\Criteria\Product\WhereCategories;
use App\Criteria\Product\WhereCategory;
use App\Criteria\Product\WhereParamsValues;
use App\Criteria\Product\WithDefaultRelationship;
use App\Models\Scopes\CriteriaScopes;
use App\Query\EloquentBuilder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductCriteriaBuilder extends CriteriaBuilder {
	/**
	 * @var bool
	 */
	protected $isNew = false;

	/**
	 * @var bool
	 */
	protected $isDiscount = false;

	/**
	 * @var bool
	 */
	protected $isSale = false;

	/**
	 * @param bool $enable
	 * @return $this
	 */
	public function enableIsNew(bool $enable = true) {
		$this->isNew = $enable;
		return $this;
	}

	/**
	 * @param bool $enable
	 * @return $this
	 */
	public function enableIsDiscount(bool $enable = true) {
		$this->isDiscount = $enable;
		return $this;
	}

	/**
	 * @param bool $enable
	 * @return $this
	 */
	public function enableIsSale(bool $enable = true) {
		$this->isSale = $enable;
		return $this;
	}

  /**
   * @return array
   */
  public function getListCriteria(): array {
    return $this->unionParentsAndChildrenCriteria(parent::getListCriteria(), [
    	new SelectAll(),

      new WithDefaultRelationship(),

	    $this->request->has('categoryId') ? new WhereCategory((int)$this->request->get('categoryId')) : null,

      'categoriesIds' => new WhereCategories(Arr::wrap($this->request->get('categoriesIds', []))),

      'paramsValues' => new WhereParamsValues(Arr::wrap($this->request->get('paramsValues', []))),

      new QuickCriteria(function ($builder) {
        /* @var CriteriaScopes|EloquentBuilder $builder */
        return $builder->orderBy(Db::raw("if(" . $builder->withAlias('stock_quantity') . " = 0,1,0)"), 'asc');
      }),

	    ($this->request->has('hasDiscount')) ? new OnlyDiscount() : null,
	    ($this->request->has('hasNew')) ? new OnlyNew() : null,
	    ($this->request->has('hasSale')) ? new OnlySale() : null,

      $this->isNew ? new OnlyNew() : null,
      $this->isDiscount ? new OnlyDiscount() : null,
      $this->isSale ? new OnlySale() : null,

	    ($this->request->has('name-order'))
		    ? new SortByStrategyCriteria('name', $this->request->get('name-order'))
		    : ((!$this->request->has('price-order') && !$this->request->has('presence-order') && !$this->request->has('date-order'))
          ? new SortByStrategyCriteria('name', 'asc')
	        : null),
	    ($this->request->has('price-order'))
		    ? new SortByStrategyCriteria('price_old', $this->request->get('price-order'))
		    : null,
	    ($this->request->has('presence-order'))
		    ? new SortByStrategyCriteria('stock_quantity', $this->request->get('presence-order'))
		    : null,
	    ($this->request->has('date-order'))
		    ? new SortByStrategyCriteria('created_at', $this->request->get('date-order'))
		    : null,

    ]);
  }
}