<?php

namespace App\Criteria\Product;

use App\Criteria\Helpers\HasJoins;
use App\Criteria\ICriteria;
use App\Models\ParamValue;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;

class WhereParamsValues implements ICriteria {
  use HasJoins;

  /**
   * @var array
   */
  protected $paramsValuesIDs;

	/**
	 * WhereParamsValues constructor.
	 *
	 * @param array $paramsValuesIDs
	 */
  public function __construct(array $paramsValuesIDs) {
    $this->paramsValuesIDs = $paramsValuesIDs;
  }

	/**
	 * @return array
	 */
  public function reorganizationParamValues(): array {
  	$productParamValues = ParamValue::query()
		  ->whereIn('id', $this->paramsValuesIDs)
		  ->get()
		  ->groupBy("param_id");

	  return $productParamValues
		  ->map(function($paramValues) {
			  return collect($paramValues)->pluck('id')->all();
		  })
		  ->toArray();
  }

  /**
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder|mixed
   */
  public function apply($builder) {
	  DB::statement("set sql_mode='';");
    return $builder->when(!empty($this->paramsValuesIDs), function($builder) {
    	foreach($this->reorganizationParamValues() as $paramID => $paramValueIds) {
		    /* @var CriteriaScopes|EloquentBuilder|QueryBuilder $builder */
		    $builder->fromCriteria(new WhereExistParamValues($paramValueIds));
	    }
    });
  }
}