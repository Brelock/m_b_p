<?php

if (!function_exists('jsonResponse')) {
  /**
   * Create a new JSON response instance.
   *
   * @param  string|array|object  $messages
   * @param  int  $status
   * @param  array  $headers
   * @param  array $optionalData
   * @param  int  $options
   * @return \Illuminate\Http\JsonResponse
   */
  function jsonResponse($messages = [], $status = 200, $optionalData = [], array $headers = [], $options = 0) : \Illuminate\Http\JsonResponse {
    $messages = is_string($messages) ? [[$messages]] : $messages;
    $optionalData = !empty($optionalData)
      ? ['data' => $optionalData]
      : (is_array($optionalData) ? $optionalData : []);

    return response()->json(array_merge(['status' => $status, 'messages' => $messages], $optionalData), $status, $headers, $options);
  }
}

if (!function_exists('resourceGet')) {
  /**
   * @param array|object $resource
   * @param string|\Closure|array $key
   * @param mixed $default
   *
   * @return mixed
   */
  function resourceGet($resource, $key, $default = null) {
    return \App\Helpers\ArrayHelper::getValue($resource, $key, $default);
  }
}

if (!function_exists('resourceFilledOutGet')) {
  /**
   * @param array|object $resource
   * @param string|\Closure|array $key
   * @param mixed $default
   *
   * @return mixed
   */
  function resourceFilledOutGet($resource, $key, $default = null) {
    return \App\Helpers\ArrayHelper::getNotEmptyValue($resource, $key, $default);
  }
}