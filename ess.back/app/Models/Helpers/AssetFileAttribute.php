<?php

namespace App\Models\Helpers;

use App\Helpers\FileHelper;

/**
 * Trait for working with files in model.
 *
 * @package App\Models\Helpers
 */
trait AssetFileAttribute {
  /**
   * Relative path to storage files.
   *
   * @return string
   */
  abstract public function directoryStorage() : string;

  /**
   * Returns used dist for store files.
   *
   * @param string $diskName
   * @return \Illuminate\Contracts\Filesystem\Filesystem
   */
  public function usedDisk(string $diskName = null) {
    return FileHelper::usePublicDisk($diskName);
  }

  /**
   * @param string $fileName
   * @param string|null $diskName
   *
   * @return bool
   */
  public function fileExists(string $fileName, string $diskName = null) : bool {
    $directoryPath = $this->directoryStorage();
    return $this->usedDisk($diskName)->exists("{$directoryPath}/{$fileName}");
  }

  /**
   * @param string $fileName
   * @param string|null $diskName
   *
   * @return bool
   */
  public function deleteFile(string $fileName, string $diskName = null) : bool {
    if($this->fileExists($fileName, $diskName)) {
      $directoryPath = $this->directoryStorage();
      return $this->usedDisk($diskName)->delete("{$directoryPath}/{$fileName}");
    }

    return false;
  }

  /**
   * Builds the absolute address of the file for output on the site.
   *
   * @param string $fileName
   * @param string $diskName
   * @return string
   */
  public function assetAbsolute(string $fileName, string $diskName = null) : string {
    $directoryPath = $this->directoryStorage();
    return $this->usedDisk($diskName)->url("{$directoryPath}/{$fileName}");
  }

  /**
   * Builds the relative path of the file.
   *
   * @param $fileName
   * @return string
   */
  public function assetRelative(string $fileName) : string {
    $directoryPath = $this->directoryStorage();
    return "{$directoryPath}/{$fileName}";
  }

  /**
   * @param string $fileName
   * @return string
   */
  public function assetRelativeToStoragePublic(string $fileName) : string {
    $relativePath = $this->assetRelative($fileName);
    return storage_path("app/public/{$relativePath}");
  }
}