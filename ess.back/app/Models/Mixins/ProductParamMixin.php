<?php

namespace App\Models\Mixins;

trait ProductParamMixin {
  /**
   * @return bool
   */
  public function isNew(): bool {
    return !$this->exists;
  }
}