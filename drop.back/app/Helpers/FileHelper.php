<?php

namespace App\Helpers;

use Illuminate\Support\Arr;

/**
 * FileHelper provides additional files functionality that you can use in your application.
 *
 * @package App\Helpers
 */
class FileHelper {
  /**
   * @param string $fileName
   * @return string
   */
  public static function getExtension(string $fileName) : string {
    return Arr::get(pathinfo($fileName), 'extension', '');
  }

  /**
   * @param string $extension
   * @return string
   */
  public static function generateNewName(string $extension) : string {
    $newFileName = uniqid(time(), true);
    return "{$newFileName}.{$extension}";
  }
}