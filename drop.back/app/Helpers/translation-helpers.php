<?php

if (!function_exists('t')) {
  /**
   * Translate the given message.
   *
   * Use laravel function `__` with concat to key file name with translations.
   *
   * @param  string  $file
   * @param  string  $key
   * @param  array  $replace
   * @param  string  $locale
   *
   * @return string|array|null
   * @see __
   */
  function t(string $file, string $key, array $replace = [], string $locale = null) {
    return __("{$file}.{$key}", $replace, $locale);
  }
}

if (!function_exists('tAttr')) {
  /**
   * Translate the given message.
   *
   * Use laravel function `__` with concat to key file name with translations.
   *
   * @param  array|object $item
   * @param  string $attribute
   * @param  string $language
   * @param  mixed  $defaultValue
   *
   * @return string|array|null
   */
  function tAttr($item, $attribute, $language = null, $defaultValue = null) {
    return \App\Helpers\Translater::tAttr($item, $attribute, $language, $defaultValue);
  }
}

if (!function_exists('tItems')) {
  /**
   * Translate the given message.
   *
   * Use laravel function `__` with concat to key file name with translations.
   *
   * @param  array  $items
   * @param  string $file
   * @param  array  $replace
   * @param  string $locale
   *
   * @return array
   * @see __
   */
  function tItems(array $items, string $file = 'messages', array $replace = [], string $locale = null) : array {
    return array_map(function($item) use($file, $replace, $locale) {
      return t($file, $item, $replace, $locale);
    }, $items);
  }
}