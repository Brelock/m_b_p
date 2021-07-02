<?php

namespace App\Criteria\Product;

use App\Criteria\ICriteria;
use App\Enums\ProductStatusTypes;
use App\Models\Param;
use App\Models\ProductParam;
use App\Models\Scopes\CriteriaScopes;
use App\Models\Scopes\OrderScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class OnlySale implements ICriteria {

  /**
   * SELECT * FROM `products` AS `p`
   * JOIN `product_param` AS `pp` ON `pp`.`product_id`=`p`.`id`
   * JOIN `params` ON `params`.`id`=`pp`.`param_id`
   * WHERE `params`.`title`='Big Sale'
   *
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder|OrderScopes $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder|OrderScopes
   */
  public function apply($builder) {
  	$productParamTbName = ProductParam::getTableName();
  	$paramsTbName = Param::getTableName();

    return $builder
	    ->join($productParamTbName, "{$productParamTbName}.product_id", '=', $builder->withAlias('id'))
	    ->join($paramsTbName, "{$paramsTbName}.id", '=', "{$productParamTbName}.param_id")
	    ->where("{$paramsTbName}.title", ProductStatusTypes::SALE);
  }
}