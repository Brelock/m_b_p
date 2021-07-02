<?php

namespace App\Helpers;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Helper to determine the choice of data from the user's language.
 *
 * @package App\Helpers
 */
class Translater {
  /**
   * The replacement value that replaces found search values.
   *
   * @var string
   */
  public static $alias = '{lang}';

  /**
   * Gets a value from an array or object by a key or property that has a language suffix.
   *
   * For example:
   *
   * ```php
   * $item = [
   *    'name_ru' => 'Русский',
   *    'name_en' => 'English',
   * ];
   *
   * // user's language: Russian
   *
   * $result = Translater::tAttr($item, 'name_{lang}');
   *
   * the result is:
   * // 'Русский'
   * ```
   *
   * If the property or key by language suffix is not found - the value will be returned by the property or key with the default language.
   *
   * For example:
   *
   * ```php
   * $item = [
   *    'name_en' => 'English',
   * ];
   *
   * // user's language: Russian
   * // default language: English
   *
   * $result = Translater::tAttr($item, 'name_{lang}');
   *
   * the result is:
   * // 'English'
   *
   * --------------------------------------------------
   *
   * $item = [
   *    'name_en' => 'English',
   * ];
   *
   * // user's language: Russian
   * // default language: Russian
   *
   * $result = Translater::tAttr($item, 'name_{lang}');
   *
   * the result is:
   * // null
   * ```
   *
   * @param object|array $item
   * @param string $attribute
   * @param string|null $language
   * @param string|null $defaultValue
   * @return mixed
   */
  public static function tAttr($item, $attribute, $language = null, $defaultValue = null) {
    $language = $language ?: LaravelLocalization::getCurrentLocale();
    return ArrayHelper::getNotEmptyValue(
      $item,
      static::tFieldName($attribute, $language),
      ArrayHelper::getNotEmptyValue(
        $item,
        static::tFieldName($attribute, config('laravellocalization.defaultLanguage')),
        $defaultValue
      )
    );
  }

  /**
   * Replace '{lang}' to language suffix.
   *
   * For example:
   *
   * ```php
   * $result = Translater::tFieldName('name_{lang}');
   *
   * // user's language Russian
   *
   * the result is:
   * // 'name_ru'
   *
   * ------------------------------------------------
   *
   * $result = Translater::tFieldName('name_{lang}', 'en');
   *
   * the result is:
   * // 'name_en'
   * ```
   *
   * @param $attribute string
   * @param $language string
   * @return string|null
   */
  public static function tFieldName($attribute, $language = null) {
    $language = $language ?: LaravelLocalization::getCurrentLocale();
    $language = static::languageToFormat($language);

    return $language
      ? str_replace(static::$alias, $language, $attribute)
      : null;
  }

  /**
   * Filter language string to underscore format.
   *
   * @param $language string
   * @return string
   */
  public static function languageToFormat($language) {
    if(!RequestHelper::isEmpty($language)) {
      $language = preg_replace("/\-|\s+/", "_", $language);
      $language = strtolower($language);
    }

    return $language;
  }
}