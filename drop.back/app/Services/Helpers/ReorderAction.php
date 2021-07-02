<?php

namespace App\Services\Helpers;

use App\Helpers\HttpRequestHelper;
use App\Models\Helpers\ReorderRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

trait ReorderAction {
  /**
   * @param int $currentId
   * @param int $desiredId
   * @param string|Model $className
   * @param string $orderFieldName
   * @return boolean
   */
  public function reorder(int $currentId, int $desiredId, string $className, string $orderFieldName = 'display_order'): bool {
    /* @var $desired ReorderRecord|Model */
    $desired = null;
    if (!HttpRequestHelper::isEmptyParameter($desiredId)) {
      $desired = $className::query()->where('id', $desiredId)->first();
    }

    /* @var $current ReorderRecord|Model */
    $current = $className::query()->where('id', $currentId)->first();
    if ($current) {
      $current->move(Arr::get($desired, $orderFieldName, 0));
      return true;
    }

    return false;
  }
}