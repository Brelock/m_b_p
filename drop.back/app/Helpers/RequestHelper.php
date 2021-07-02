<?php

namespace App\Helpers;

/**
 * Helper to provide work with request data.
 *
 * @package App\Helpers
 */
class RequestHelper {
  /**
   * Checking value is not empty.
   *
   * @param  mixed $value
   * @param  boolean $forceCoreEmpty
   * @return boolean
   */
  public static function isEmpty($value, $forceCoreEmpty = false) {
    return $value === '' ||
           $value === [] ||
           $value === null ||
           (is_string($value) && trim($value) === '') ||
           ($forceCoreEmpty ? empty($value) : false);
  }

  /**
   * Calculate offset by limit and current page.
   *
   * @param  int $limit
   * @param  int $page
   *
   * @return int
   */
  public static function offsetPages($limit, int $page = 1) : int {
    $offset = 0;
    if ($page >= 1) {
      $offset = ($page - 1) * $limit;
    }

    return $offset;
  }
}
