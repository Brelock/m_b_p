<?php

namespace App\Models\Mixins;

trait SunportParamMixin {
  /**
   * @return bool
   */
  public function isNew(): bool {
    return !$this->exists;
  }
}