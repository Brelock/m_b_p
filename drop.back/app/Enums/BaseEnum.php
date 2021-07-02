<?php

namespace App\Enums;

use App\Helpers\ArrayHelper;
use App\Helpers\StrHelper;

/**
 * Helper for working with classes with const.
 *
 * @package App\Enums
 */
abstract class BaseEnum {
  /**
   * Returns constants in class.
   *
   * For example,
   *
   * ```php
   * class MyClass {
   *    const CONST_1 = 1;
   *    const CONST_2 = 2;
   * }
   *
   * $result = MyClass::getConstants();
   * // the result is:
   * // [
   * //   'CONST_1' => 1,
   * //   'CONST_2' => 2,
   * // ]
   *
   * @return array
   */
  public static function getConstants() {
    try {
      $class = new \ReflectionClass(static::class);
      return $class->getConstants();
    } catch (\ReflectionException $exception) {
      return [];
    }
  }

  /**
   * Returns constants in class with format for config params.
   *
   * For example,
   *
   * ```php
   * class MyClass {
   *    const CONST_1 = 1;
   *    const CONST_2 = 2;
   * }
   *
   * $result = MyClass::toConfigFormat();
   * // the result is:
   * // [
   * //   'const1' => 1,
   * //   'const2' => 2,
   * // ]
   *
   * @return array
   * @see getConstants()
   */
  public static function toConfigFormat() {
    return ArrayHelper::arrayMapAssoc(function ($constName, $constValue) {
      return [static::formatting($constName), $constValue];
    }, static::getConstants());
  }

  /**
   * Formatting list of names const to camel case.
   *
   * @param $constName
   * @return string
   */
  public static function formatting($constName) {
    return StrHelper::toCamelCase(strtolower($constName));
  }

  /**
   * @return array
   */
  public static function toArray() {
    return static::toConfigFormat();
  }

  /**
   * Array of values const.
   *
   * @return array
   */
  public static function getValues() {
    return array_values(static::getConstants());
  }
}
