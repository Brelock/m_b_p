<?php

namespace App\Observers;

use App\Models\Sunport;
use App\Models\SunportParam;
use App\Models\SunportParamPicture;

class SunportObserver {
  /**
   * Handle the sunport "deleting" event.
   *
   * @param  Sunport $sunport
   * @return bool
   */
  public function deleting(Sunport $sunport) {
    if($sunport->xls_file_name)
      $sunport->deleteFile($sunport->xls_file_name);

    if($sunport->picture_file_name)
      $sunport->deleteFile($sunport->picture_file_name);

    $sunport->params->each(function($param) {
      /* @var SunportParam $param */
      $param->delete();
    });

    $sunport->paramsPicture->each(function($pictureParam) {
      /* @var SunportParamPicture $pictureParam */
      $pictureParam->delete();
    });

    return true;
  }
}
