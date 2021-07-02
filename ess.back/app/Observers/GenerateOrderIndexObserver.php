<?php

namespace App\Observers;

use App\Models\Helpers\ReorderRecord;
use Illuminate\Database\Eloquent\Model;

/**
 * Class observer of the events change the models with sort indexes for generate new index before save new model.
 *
 * @package App\Observers
 */
class GenerateOrderIndexObserver {
  /**
   * Generate sort index before save new model.
   *
   * @param Model|ReorderRecord $model
   * @return void
   */
  public function saving($model) {
    // generate new order index if model is new record
    if(!$model->exists && empty($model->display_order)) {
      $model->setOrderIndex($model->generateOrderIndex());
    }
  }
}