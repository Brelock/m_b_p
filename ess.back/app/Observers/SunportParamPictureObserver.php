<?php

namespace App\Observers;

use App\Models\SunportParamPicture;

class SunportParamPictureObserver {
  /**
   * Handle the sunport param picture "deleting" event.
   *
   * @param \App\Models\SunportParamPicture $sunportParamPicture
   * @return bool
   */
  public function deleting(SunportParamPicture $sunportParamPicture) {
    if($sunportParamPicture->picture_file_name)
      $sunportParamPicture->deleteFile($sunportParamPicture->picture_file_name);

    return true;
  }
}
