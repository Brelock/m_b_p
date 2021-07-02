<?php

namespace App\Http\Resources\Project;

use App\Models\ProjectPicture;
use Illuminate\Http\Resources\Json\JsonResource;

class PictureResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var ProjectPicture|self $this */
    return [
      'id' => $this->id,
      'project_id' => $this->project_id,
	    'is_main' => $this->is_main,

      'picture_name' => $this->picture_name,
      'thumb_name' => $this->thumb_name,
	    'display_order' => $this->display_order,

      'full_link' => $this->assetAbsolute($this->picture_name),
      'thumb_full_link' => $this->assetAbsolute(($this->thumb_name ?: $this->picture_name)),
    ];
  }
}
