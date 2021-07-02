<?php

namespace App\Models\Mixins;

use App\Collection\ProductPictureCollection;
use App\Services\FileService;
use Illuminate\Database\Eloquent\Builder;

trait ProductPictureMixin {
  /**
   * @param array $models
   * @return ProductPictureCollection|\Illuminate\Database\Eloquent\Collection
   */
  public function newCollection(array $models = []) {
    return new ProductPictureCollection($models);
  }

  /**
   * @param Builder $query
   * @param string $value
   * @return bool
   */
  protected function getFullTextSearchColumn($query, $value) {
    return 'file_name';
  }

  /**
   * @param FileService $fileService
   * @param string|null $newFileName
   *
   * @return bool
   */
  public function createThumbnailVersion(FileService $fileService, string $newFileName = null) : bool {
    $originalPath = $this->assetRelative($this->file_name);
    $thumbnailPath = $this->assetRelative($newFileName ?: "thumb_{$this->file_name}");

    if($fileService->createThumbnail($originalPath, $thumbnailPath))
      return true;

    return false;
  }
}