<?php

namespace App\Helpers;

/**
 * Helper for basic rounding numbers throughout the application.
 *
 * @package App\Helpers
 */
class NumberHelper {
  /**
   * Price rounding under one format.
   *
   * @param float $number
   * @param boolean|integer $floor
   * @return float
   */
  public static function round(float $number, $floor = false): float {
    return $floor === false && !is_numeric($floor)
      ? ceil($number)
      : round($number, ($floor === false ? 2 : $floor));
  }

  /**
   * @param float $number
   * @param int $count
   * @param int $default
   *
   * @return float
   */
  public static function divideByCount(float $number, int $count, int $default = 0): float {
    if ($count > 0) return $number / $count;

    return $default;
  }

  /**
   * @param float $number
   * @param int $precision
   * @param int $round
   *
   * @return int
   */
  public static function toPercent(float $number, int $precision = 2, int $round = 100): int {
    return round($number, $precision) * $round;
  }

  /**
   * @param float $number
   * @return float
   */
  public static function toPositive(float $number) : float {
    return $number < 0 ? -$number : $number;
  }
}