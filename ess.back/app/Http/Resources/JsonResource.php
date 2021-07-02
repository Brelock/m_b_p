<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource as CoreJsonResource;

class JsonResource extends CoreJsonResource {
  /**
   * Build array of item by json resource.
   *
   * @param mixed $resource
   * @param Request|null $request
   * @param boolean $wrap
   *
   * @return array
   */
  public static function rawData($resource, $request = null, $wrap = true) : array {
    if(empty($resource))
      return [];

    if(!$wrap) static::withoutWrapping();

    return (new static($resource))->toResponse($request ?? request())->getData(true);
  }

  /**
   * Build array of items by json resource.
   *
   * @param  mixed  $resource
   * @param Request|null $request
   * @param boolean $wrap
   * @param string|\Closure|array $key
   *
   * @return array
   */
  public static function rawList($resource, $request = null, $wrap = true, $key = null) {
    if(!$wrap) static::withoutWrapping();

    $data = static::collection($resource)
      ->toResponse(($request ?? request()))
      ->getData(true);

    if($key)
      return resourceGet($data, $key);

    return $data;
  }

  /**
   * Build array of items by json resource.
   *
   * @param  mixed  $resource
   * @param Request|null $request
   *
   * @return array
   */
  public static function rawPaginator($resource, $request = null) {
    return static::rawList($resource, $request, false, 'data');
  }
}