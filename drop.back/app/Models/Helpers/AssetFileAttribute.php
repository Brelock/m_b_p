<?php

namespace App\Models\Helpers;

use App\Services\FileService;
use Illuminate\Contracts\Filesystem\Filesystem;

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
   * @return FileService
   */
  public function useFilesystem() : FileService {
    /* @var FileService $fileService */
    $fileService = app(FileService::class);

    return $fileService;
  }

  /**
   * @return Filesystem
   */
  public function useDiskFilesystem() : Filesystem {
    return $this->useFilesystem()->getDisk();
  }

  /**
   * @param string $fileName
   *
   * @return bool
   */
  public function fileExists(string $fileName) : bool {
    return $this->useDiskFilesystem()->exists($this->assetRelative($fileName));
  }

  /**
   * @param string $fileName
   *
   * @return bool
   */
  public function deleteFile(string $fileName) : bool {
    if($this->fileExists($fileName)) {
      return $this->useDiskFilesystem()->delete($this->assetRelative($fileName));
    }

    return false;
  }

  /**
   * Builds the absolute address of the file for output on the site.
   *
   * @param string $fileName
   *
   * @return string
   */
  public function assetAbsolute(string $fileName) : string {
    if(!empty($fileName))
      return $this->useDiskFilesystem()->url($this->assetRelative($fileName));

    return $fileName;
  }

  /**
   * Builds the relative path of the file.
   *
   * @param $fileName
   * @return string
   */
  public function assetRelative(string $fileName) : string {
    if(!empty($fileName)) {
      $directoryPath = $this->directoryStorage();
      return "{$directoryPath}/{$fileName}";
    }

    return $fileName;
  }

  /**
   * @param string $fileName
   * @return string
   */
  public function storagePath(string $fileName) : string {
    return $this->useFilesystem()->storagePath($this->assetRelative($fileName));
  }
}