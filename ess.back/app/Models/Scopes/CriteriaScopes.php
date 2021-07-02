<?php

namespace App\Models\Scopes;

use App\Criteria\Builder\BaseCriteriaBuilder;
use App\Criteria\Builder\CriteriaBuilder;
use App\Criteria\ICriteria;
use App\Criteria\ICriteriaBuilder;
use App\Helpers\HttpRequestHelper;
use App\Query\EloquentBuilder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as LengthAwarePaginatorContract;
use App\Query\EloquentBuilder as Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Trait CriteriaScopes
 * @package App\Models\Scopes
 *
 * @method Builder|self fullTextSearch($value)
 * @method Builder|self orderByParams($column, $value)
 * @method Builder|self filterWhere($value, \Closure $condition)
 * @method LengthAwarePaginatorContract|LengthAwarePaginator prePaginate($limit, $page = null)
 * @method static Builder|self alias($alias)
 * @method static Builder|self fromCriteriaBuilder(ICriteriaBuilder $criteriaBuilder)
 * @method static Builder|self fromCriteria(ICriteria... $list)
 * @method static Builder|self mergeWithBuilder(self | Builder $builder)
 * @method static Builder|self nPerGroup(string $group, int $n = 10)
 */
trait CriteriaScopes {
  /**
   * @var string
   */
  protected $alias;

  ##### SCOPES #####

  /**
   * Initializes this query builder by criteria builder.
   *
   * @param self|Builder $query the eloquent builder.
   * @param ICriteriaBuilder|BaseCriteriaBuilder $criteriaBuilder the builder of list criteria.
   * @return CriteriaScopes|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder returns build query builder by criteria.
   * @see CriteriaBuilder
   */
  public function scopeFromCriteriaBuilder($query, ICriteriaBuilder $criteriaBuilder) {
    return $criteriaBuilder->compose($query);
  }

  /**
   * Apply single criteria to this query builder.
   *
   * @param self|Builder $query the eloquent builder.
   * @param ICriteria[] $list
   * @return CriteriaScopes|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
   */
  public function scopeFromCriteria($query, ICriteria... $list) {
    foreach ($list as $criteria) {
      $criteria->apply($query);
    }

    return $query;
  }

  /**
   * Set alias to from.
   *
   * @param Builder $query
   * @param string $alias
   *
   * @return Builder
   */
  public function scopeAlias($query, $alias) {
    $this->alias = $alias;
    $table = $query->getModel()->getTable();
    return $query->from("{$table} as {$alias}");
  }

  /**
   * Scope for eloquent builder for get name column with global alias of query.
   *
   * @param self|Builder $query the eloquent builder.
   * @param string $column the field in table in database.
   *
   * @return string returns column with alias. For example 'alias.column'
   */
  public function scopeWithAlias($query, $column) {
    return $this->withAlias($column);
  }

  /**
   * Add condition for fulltext search with operator '%like%'.
   *
   * @param Builder $query
   * @param mixed $value
   *
   * @return Builder
   */
  public function scopeFullTextSearch($query, $value) {
    $value = (string)$value;
    return $this->fullTextSearchByColumn($query, $value, $this->getFullTextSearchColumn($query, $value));
  }

  /**
   * Add "order by" to query by column and method sort: asc or desc.
   *
   * @param Builder $query
   * @param string $column
   * @param string $value
   *
   * @return Builder
   */
  public function scopeOrderByParams($query, $column, $value) {
    return $this->orderByColumn($query, array_merge(['id', 'created_at', 'updated_at'], $this->fillable), $column, $value);
  }

  /**
   * Add condition to query if value is not empty.
   *
   * @param Builder $query
   * @param mixed $value
   * @param \Closure $condition
   *
   * @return Builder
   */
  public function scopeFilterWhere($query, $value, $condition) {
    if (!HttpRequestHelper::isEmptyParameter($value)) {
      $condition($query, $value);
    }

    return $query;
  }

  /**
   * Set limit to query with builder's function paginate.
   *
   * @param Builder $query
   * @param integer $limit
   * @param integer $page
   *
   * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|LengthAwarePaginator
   */
  public function scopePrePaginate($query, $limit, $page = null) {
    // if limit from query is correct
    $max = (int)$limit > 0 || (int)$limit === -1 ? (int)$limit : config('params.defaultLimit');
    if ($max === -1) {
      $max = $query->toBase()->getCountForPagination();
      return $query->paginate($max, ['*'], 'page', $page, $max);
    }

    return $query->paginate($max);
  }

  /**
   * Merge two query builder.
   *
   * @param self|Builder $query
   * @param self|Builder $builder
   *
   * @return self|Builder
   */
  public function scopeMergeWithBuilder($query, $builder) {
    foreach (Arr::wrap($builder->toBase()->joins) as $join) {
      /* @var JoinClause $join */
      $query->toBase()->joins[] = $join;
    }

    $query->toBase()->mergeWheres($builder->toBase()->wheres, $builder->toBase()->bindings);
    return $query;
  }

  /**
   * @param self|Builder $query
   * @param string $group
   * @param int $n
   */
  public function scopeNPerGroup($query, string $group, int $n = 10) {
    // queried table
    $table = ($this->getTable());

    // initialize MySQL variables inline
    $query->from(DB::raw("(SELECT @rank:=0, @group:=0) as vars, {$table}"));

    // if no columns already selected, let's select *
    if (!$query->getQuery()->columns) {
      $query->select("{$table}.*");
    }

    // make sure column aliases are unique
    $groupAlias = 'group_' . md5(time());
    $rankAlias = 'rank_' . md5(time());

    // apply mysql variables
    $query->addSelect(DB::raw(
      "@rank := IF(@group = {$group}, @rank+1, 1) as {$rankAlias}, @group := {$group} as {$groupAlias}"
    ));

    // make sure first order clause is the group order
    $query->getQuery()->orders = (array)$query->getQuery()->orders;
    array_unshift($query->getQuery()->orders, ['column' => $group, 'direction' => 'asc']);

    // prepare subquery
    $subQuery = $query->toSql();

    // prepare new main base Query\Builder
    $newBase = $this->newQuery()
      ->from(DB::raw("({$subQuery}) as {$table}"))
      ->mergeBindings($query->getQuery())
      ->where($rankAlias, '<=', $n)
      ->getQuery();

    // replace underlying builder to get rid of previous clauses
    $query->setQuery($newBase);
  }

  ##### SCOPES #####

  #### METHODS ####

	/**
	 * @return string
	 */
	public static function getTableName() : string {
		return (new static())->getTable();
	}

  /**
   * Overrides the base query builder with my.
   *
   * @param self|Builder $query
   * @return EloquentBuilder
   */
  public function newEloquentBuilder($query) {
    return new EloquentBuilder($query);
  }

  /**
   * Get name column with global alias of query.
   *
   * @param string $column the field in table in database.
   * @return string returns column with alias. For example 'alias.column'
   */
  public function withAlias($column) {
    $tbName = $this->getTable();
    return $this->alias ? "{$this->alias}.{$column}" : "{$tbName}.{$column}";
  }

  /**
   * Full text search by set column.
   *
   * @param Builder $query
   * @param string $value
   * @param string|\Closure $column
   *
   * @return Builder
   */
  public function fullTextSearchByColumn($query, $value, $column) {
    if (!HttpRequestHelper::isEmptyParameter($value) && is_string($value)) {
      if ($column instanceof \Closure && is_callable($column)) {
        return $column($query, $value);
      } else if (is_string($column)) {
        $query->where($column, 'like', "%{$value}%");
      }
    }

    return $query;
  }

  /**
   * Sort results by set column.
   *
   * @param Builder $query
   * @param array $columns
   * @param string $queryColumn
   * @param string $queryValue
   *
   * @return Builder
   */
  public function orderByColumn($query, $columns, $queryColumn, $queryValue) {
    // check $queryColumn in fillable columns from model
    $column = in_array($queryColumn, $columns) ? $queryColumn : Arr::get($columns, 0);
    // check $queryValue with two params for sort (asc or desc)
    $value = in_array($queryValue, ['asc', 'desc']) ? $queryValue : 'asc';
    return $query->orderBy($this->withAlias($column), $value);
  }

  #### METHODS ####

  ##### ABSTRACT FUNCTIONS #####

  /**
   * Returns column in table of database or callback with built condition for fulltext search.
   *
   * @param Builder $query the eloquent builder.
   * @param mixed $value string value.
   *
   * @return string|\Closure
   */
  abstract protected function getFullTextSearchColumn($query, $value);

  ##### ABSTRACT FUNCTIONS #####
}