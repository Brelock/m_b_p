<?php

namespace App\Models\Mixins;

use App\Models\SunportParamPicture;

trait SunportParamPictureMixin {
  /**
   * @return bool
   */
  public function isNew(): bool {
    return !$this->exists;
  }

  /**
   * @return string|null
   */
  public function getPictureFileName(): ?string {
    /* @var SunportParamPicture|self $this */
    return isset($this->picture_file_name) ? $this->picture_file_name : null;
  }
}