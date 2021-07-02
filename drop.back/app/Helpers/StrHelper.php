<?php

namespace App\Helpers;

use Illuminate\Support\Arr;

/**
 * StrHelper provides additional string functionality that you can use in your application.
 *
 * @package App\Helpers
 */
class StrHelper {
  /**
   * Convert string to camelCase format.
   *
   * For example:
   *
   * ```php
   * $result = StrHelper::toCamelCase('camel_case');
   *
   * the result is:
   * // 'camelCase'
   * ```
   *
   * @param string $str
   * @param bool $capitalise_first_char
   * @return null|string|string[]
   */
  public static function toCamelCase($str, $capitalise_first_char = false) {
    if ($capitalise_first_char) {
      $str[0] = strtoupper($str[0]);
    }

    $func = function ($c) {
      return strtoupper($c[1]);
    };

    return preg_replace_callback('/_([a-z])/', $func, $str);
  }

  /**
   * Transliteration from Russian to English.
   *
   * ```php
   * $result = StrHelper::transliteration('перевести слово');
   *
   * the result is:
   * // 'perevesti slovo'
   * ```
   *
   * @param string $string
   * @return string
   */
  public static function transliteration($string) {
    $table = [
      'ж' => 'zh',
      'ч' => 'ch',
      'щ' => 'shh',
      'ш' => 'sh',
      'ю' => 'yu',
      'ё' => 'yo',
      'я' => 'ya',
      'э' => 'e',
      'а' => 'a',
      'б' => 'b',
      'в' => 'v',
      'г' => 'g',
      'д' => 'd',
      'е' => 'e',
      'з' => 'z',
      'и' => 'i',
      'й' => 'y',
      'к' => 'k',
      'л' => 'l',
      'м' => 'm',
      'н' => 'n',
      'о' => 'o',
      'п' => 'p',
      'р' => 'r',
      'с' => 's',
      'т' => 't',
      'у' => 'u',
      'ф' => 'f',
      'х' => 'h',
      'ц' => 'c',
      'ъ' => '',
      'ь' => '',
      'ы' => 'i',
      'Ж' => 'Zh',
      'Ч' => 'Ch',
      'Щ' => 'Shh',
      'Ш' => 'Sh',
      'Ю' => 'Yu',
      'Ё' => 'Yo',
      'Я' => 'Ya',
      'Э' => 'E',
      'А' => 'A',
      'Б' => 'B',
      'В' => 'V',
      'Г' => 'G',
      'Д' => 'D',
      'Е' => 'E',
      'З' => 'Z',
      'И' => 'I',
      'Й' => 'Y',
      'К' => 'K',
      'Л' => 'L',
      'М' => 'M',
      'Н' => 'N',
      'О' => 'O',
      'П' => 'P',
      'Р' => 'R',
      'С' => 'S',
      'Т' => 'T',
      'У' => 'U',
      'Ф' => 'F',
      'Х' => 'H',
      'Ц' => 'C',
      'Ъ' => '',
      'Ь' => '',
      'Ы' => 'I',
    ];

    return str_replace(
      array_keys($table),
      array_values($table),
      $string
    );
  }

  /**
   * Remove all spaces from word.
   *
   * ```php
   * $result = StrHelper::removeAllSpaces('  пробел пробел   и еще раз пробел');
   *
   * the result is:
   * // 'пробелпробелиещеразпробел'
   * ```
   *
   * @param string $str
   * @return null|string|string[]
   */
  public static function removeAllSpaces(string $str) {
    return preg_replace('/\s+/', '', $str);
  }

  /**
   * Filters and cuts empty email addresses.
   *
   * @param string $emails
   * @return array
   */
  public static function getAllEmails(string $emails) {
    return static::exceptEmptyMails(explode(",", static::removeAllSpaces($emails)));
  }

  /**
   * Cuts empty email addresses.
   *
   * @param array $emails
   * @return array
   */
  public static function exceptEmptyMails(array $emails) {
    return Arr::where($emails, function ($value) {
      return !RequestHelper::isEmpty($value);
    });
  }

  /**
   * Abbreviates text containing html elements.
   *
   * @param string $line
   * @param int $symbolsCount
   * @return null|string|string[]
   */
  public static function shortenHtmlLine($line, $symbolsCount = 150) {
    if (!is_string($line)) return $line;

    $string = preg_replace("/<[^>]*>/", "", $line);
    $string = preg_replace("/&nbsp;/", " ", $string);
    $string = preg_replace("/[\r\n]+/", " ", $string);

    $length = mb_strlen($string);
    if ($length > $symbolsCount && preg_match("/^.{{$symbolsCount}}\S*\s/", $string, $match)) {
      $string = preg_replace("/(\.|\,)\s*?\S?$/", "", Arr::get($match, 0, $string));
    }

    return $string;
  }
}
