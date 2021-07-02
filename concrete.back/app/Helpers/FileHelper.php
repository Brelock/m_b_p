<?php

namespace App\Helpers;

use App\Enums\DirectoriesStorage;
use App\Enums\FileExtension;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

/**
 * FileHelper provides additional files functionality that you can use in your application.
 *
 * @package App\Helpers
 */
class FileHelper {
  /**
   * Use public disk by default. For global using.
   *
   * @param string|null $name
   * @return \Illuminate\Contracts\Filesystem\Filesystem
   */
  public static function usePublicDisk($name = null) {
    return Storage::disk($name ?: 'public');
  }

  /**
   * Delete file.
   *
   * @param string $filePath
   * @param \Illuminate\Contracts\Filesystem\Filesystem $disk
   * @return bool
   */
  public static function deleteFile($filePath, $disk = null) {
    $disk = $disk ?: static::usePublicDisk();
    if($disk->exists($filePath)) {
      return $disk->delete($filePath);
    }

    return false;
  }

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