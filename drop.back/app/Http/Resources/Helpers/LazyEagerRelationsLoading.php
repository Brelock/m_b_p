<?php

namespace App\Http\Resources\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

trait LazyEagerRelationsLoading {
  /**
   * @param Request|null $request
   * @return array
   */
  public function loadRelations($request = null) {
    $request = $request ?: request();

    /* @var Model|self $this */
    return array_map(function($relationLoad) {
      if(is_array($relationLoad) && array_key_exists('load', $relationLoad)) {
        $relation = Arr::get($relationLoad, 'dependencyRelation');
        if(is_array($relation)) {
          foreach($relation as $relationName) {
            if($this->relationLoaded($relationName)) {
              return Arr::get($relationLoad, 'load')($relationName);
            }
          }

          return Arr::get($relationLoad, 'load')(Arr::get($relation, 0));
        }

        return Arr::get($relationLoad, 'load')();
      }

      return $relationLoad();
    }, Arr::where($this->relations($request), function($value, $key) {
      /* @var Model $this */
      if(is_array($value) && array_key_exists('dependencyRelation', $value)) {
        $relation = Arr::get($value, 'dependencyRelation');
        if(is_array($relation)) {
          foreach($relation as $relationName) {
            if($this->relationLoaded($relationName)) return true;
          }

          return false;
        } else {
          return $this->relationLoaded(Arr::get($value, 'dependencyRelation'));
        }
      }

      return $this->relationLoaded($key);
    }));
  }

  /**
   * @return array
   */
  abstract public function relations() : array;
}