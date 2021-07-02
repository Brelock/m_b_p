<?php

namespace App\Collection;

use App\Models\ProductPicture;
use Illuminate\Database\Eloquent\Collection;

class ProductPictureCollection extends Collection {
  /**
   * @return ProductPictureCollection
   */
  public function keyByFileName(): self {
    return $this->keyBy('file_name');
  }

  /**
   * @return ProductPictureCollection
   */
  public function keyById(): self {
    return $this->keyBy('id');
  }

  /**
   * @return array
   */
  public function getIds(): array {
    return $this->keyById()->keys()->all();
  }

  /**
   * @return ProductPictureCollection
   */
  public function mapToMoveZipArchive(): self {
    return $this
      ->filter(function ($picture) {
        /* @var ProductPicture $picture */
        return $picture->fileExists($picture->file_name);
      })
      ->mapWithKeys(function ($picture) {
        /* @var ProductPicture $picture */
        return [$picture->assetRelative($picture->file_name) => $picture->file_name];
      });
  }
}