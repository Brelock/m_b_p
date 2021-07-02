<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\CallbackRequest;
use App\Mail\NewCallbackRequest;
use App\Models\Admin\Settings;
use App\Models\Common\Callback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CallbackController extends Controller
{
    public function store(CallbackRequest $request)
    {
        $callback = Callback::create($request->only('phone', 'name'));

        $settings = Settings::first();

        Mail::to($settings->admin_email)->queue(new NewCallbackRequest($callback));

        return response()->json( [
            "status" => "success", "message" => 'Заявка отправлена.'
        ] );
    }
}
