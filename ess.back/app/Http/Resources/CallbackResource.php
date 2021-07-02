<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\LazyEagerRelationsLoading;
use App\Models\Callback;

class CallbackResource extends JsonResource {
	use LazyEagerRelationsLoading;

  /**
   * @param \Illuminate\Http\Request $request
   * @return array
   */
	public function toArray($request): array {
		/* @var Callback|self $this */
		return [
			'id' => $this->id,

			'name' => $this->name,
			'phone' => $this->phone,
			'email' => $this->email,
			'region' => $this->region,
			'message' => $this->message,
			'type' => $this->type,

			'created_at' => $this->created_at->format('j M Y'),

      'routeDelete' => route('admin.callbacks.destroy', ['callback' => $this]),

		];
  }

  /**
   * @return array
   */
  public function relations(): array {
  	//
  }
}