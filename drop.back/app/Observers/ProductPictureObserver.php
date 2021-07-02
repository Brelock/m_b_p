<?php

namespace App\Observers;

use App\Models\ProductPicture;

class ProductPictureObserver {
  /**
   * Handle the price type cart form "deleted" event.
   *
   * @param  ProductPicture $model
   * @return void
   */
  public function deleted(ProductPicture $model) {
    $model->deleteFile($model->file_name);
    $model->deleteFile($model->thumbnail_name);
  }
}
