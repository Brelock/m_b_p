<?php

namespace App\Helpers;

/**
 * Helper to provide work with request data.
 *
 * @package App\Helpers
 */
class HttpRequestHelper {
  /**
   * Checking value is not empty.
   *
   * @param $value mixed
   * @param $checkEmptyFunction boolean
   * @return boolean
   */
  public static function isEmptyParameter($value, $checkEmptyFunction = false) {
    return $value === ''
      || $value === []
      || $value === null
      || (is_string($value) && trim($value) === '')
      || ($checkEmptyFunction ? empty($value) : false);
  }

  /**
   * Calculate offset by limit and current page.
   *
   * @param $limit
   * @param int $page
   * @return float|int
   */
  public static function getOffsetPages($limit, $page = 1) {
    $offset = 0;
    if ($page >= 1) {
      $offset = ($page - 1) * $limit;
    }

    return $offset;
  }
}
