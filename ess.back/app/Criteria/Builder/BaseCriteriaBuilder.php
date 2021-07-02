<?php

namespace App\Criteria\Builder;

use App\Criteria\ICriteria;
use App\Criteria\ICriteriaBuilder;
use Illuminate\Http\Request;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Arr;

/**
 * Criteria builder for building a query based on a list of criteria filtered based on the query.
 *
 * @package App\Criteria
 */
abstract class BaseCriteriaBuilder implements ICriteriaBuilder {
  /**
   * @var Request
   */
  protected $request;

  /**
   * Flag to determine where the request came from.
   * It's true - request from web site, it's false - request to API.
   *
   * @var bool
   */
  protected $forFrontend = false;

  /**
   * List of criteria to be excluded from the list.
   *
   * @var ICriteria[] $exceptCriteria
   */
  protected $exceptClassesNamesCriteria = [];

  /**
   * BaseCriteriaBuilder constructor.
   *
   * @param Request|null $request
   * @return void
   */
  public function __construct(Request $request = null) {
    $this->request = $request ?: \request();
    $this->fromClient($this->request->has('_fromClient'));
  }

  /**
   * Define requests from client version (not from admin).
   *
   * @param bool $forFrontend
   * @return $this
   */
  public function fromClient($forFrontend = true) {
    $this->forFrontend = $forFrontend;
    return $this;
  }

  /**
   * Determine the presence of the `light` parameter in the request to understand what size the response should be given to the client.
   *
   * @return bool
   */
  public function needLightResponse() {
    return $this->getRequest()->has('light');
  }

  /**
   * Getter for Request object.
   *
   * @return Request
   */
  public function getRequest(): Request {
    return $this->request;
  }

  /**
   * Offset values from old keys in request to request with new names by keys.
   *
   * @param array $keys
   * @return $this
   */
  public function replaceRequestKeys(array $keys): self {
    foreach ($keys as $key => $value) {
      $this->getRequest()->offsetSet($value, $this->getRequest()->get($key));
    }

    return $this;
  }

  /**
   * Returns max number parameter from request.
   *
   * @param string $key The key
   * @param mixed $default The default value if the parameter key does not exist
   * @return integer
   */
  public function max($key = 'max', $default = 15) {
    return $this->getRequest()->get($key, $default ?? config('params.defaultLimit'));
  }

  /**
   * Returns page parameter from request.
   *
   * @param string $key The key
   * @param mixed $default The default value if the parameter key does not exist
   * @return integer
   */
  public function page($key = 'page', $default = 1) {
    return $this->getRequest()->get($key, $default);
  }

  /**
   * Check if list of criteria is not empty.
   *
   * @return bool
   */
  public function hasListCriteria(): bool {
    return !empty($this->filterListCriteria());
  }

  /**
   * Returns builder by applies criteria.
   *
   * @param EloquentBuilder|QueryBuilder|CriteriaScopes $builder builder to be execute query and get results.
   * @return EloquentBuilder|QueryBuilder|CriteriaScopes
   */
  public function compose($builder) {
    foreach ($this->filterListCriteria() as $filterParameter => $criteria) {
      $this->applyCriteria($criteria, $builder);
    }

    return $builder;
  }

  /**
   * Returns builder by applied single criteria.
   *
   * @param ICriteria $criteria the criteria condition.
   * @param EloquentBuilder|QueryBuilder|CriteriaScopes $builder builder to be execute query and get results.
   * @return EloquentBuilder|QueryBuilder|CriteriaScopes
   */
  public function applyCriteria(ICriteria $criteria, $builder) {
    return $criteria->apply($builder);
  }

  /**
   * To store criteria that need to be dynamically excluded from the list.
   *
   * @param string $criteria
   * @return ICriteriaBuilder
   */
  public function addExceptedCriteriaClassName(string $criteria): ICriteriaBuilder {
    $this->exceptClassesNamesCriteria[] = $criteria;
    return $this;
  }

  /**
   * Merge two arrays with list criteria.
   * Need if criteria extends other criteria.
   *
   * @param ICriteria[] $parents
   * @param ICriteria[] $children
   * @return mixed
   * @see getListCriteria()
   */
  protected function unionParentsAndChildrenCriteria($parents, $children) {
    foreach ($children as $key => $criteria) {
      if (is_numeric($key)) {
        array_push($parents, $criteria);
      } else {
        $parents[$key] = $criteria;
      }
    }

    return $parents;
  }

  /**
   * Returns an associative array with a list of criteria that is prefiltered by the parameters, being as the keys of the elements of the array with the parameters, being in the request.
   *
   * @return ICriteria[]
   * @see getListCriteria()
   */
  protected function filterListCriteria() {
    $listCriteria = $this->getListCriteria();

    // exclude empty criteria
    $listCriteria = array_filter($listCriteria, function ($item) {
      return !empty($item);
    });

    // exclude no need criteria from list by classes names
    $listCriteria = array_filter($listCriteria, function ($criteria) {
      /* @var ICriteria $criteria */
      return !in_array(get_class($criteria), $this->exceptClassesNamesCriteria);
    });

    $checkedRequestParameters = $this->request->only(array_keys($listCriteria));

    $listCriteriaFromRequest = Arr::only($listCriteria, array_keys($checkedRequestParameters));
    $defaultListCriteria = array_filter($listCriteria, function ($key) {
      return is_numeric($key);
    }, ARRAY_FILTER_USE_KEY);

    return array_merge($defaultListCriteria, $listCriteriaFromRequest);
  }
}