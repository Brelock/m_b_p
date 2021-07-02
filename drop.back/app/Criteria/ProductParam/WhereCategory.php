<?php

namespace App\Criteria\ProductParam;

use App\Criteria\Helpers\HasJoins;
use App\Criteria\ICriteria;
use App\Models\Product;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class WhereCategory implements ICriteria {
  use HasJoins;

  /**
   * @var int|null
   */
  protected $categoryId;

  /**
   * WhereCategory constructor.
   *
   * @param int|null $categoryId
   */
  public function __construct(?int $categoryId) {
    $this->categoryId = $categoryId;
  }

  /**
   * @return array
   */
  public function joins(): array {
    $productTbName = Product::getTableName();
    return [
      $productTbName => function($builder) use($productTbName) {
        /* @var CriteriaScopes|EloquentBuilder|QueryBuilder $builder */
        return $builder->join($productTbName, function ($join) use($builder, $productTbName) {
          /* @var JoinClause $join */
          $join
            ->on("{$productTbName}.id", '=', $builder->withAlias('product_id'))
            ->where("{$productTbName}.category_id", $this->categoryId);
        });
      }
    ];
  }

  /**
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    DB::statement("set sql_mode='';");

    return $this
      ->applyJoins($builder)
      ->groupBy($builder->withAlias('id'));
  }
}