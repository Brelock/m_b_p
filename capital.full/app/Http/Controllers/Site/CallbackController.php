<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\CallbackRequest;
use App\Mail\NewCallbackRequest;
use App\Models\Admin\Settings;
use App\Models\Common\Callback;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CallbackController extends Controller {

  /**
   * @param CallbackRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(CallbackRequest $request) {
      $callback = Callback::create($request->only('phone', 'name'));

        $settings = Settings::first();

        Mail::to($settings->admin_email)->queue(new NewCallbackRequest($callback));

      return response()->json([
        "status" => "success", "message" => 'Заявка отправлена.'
      ]);
    }
}
