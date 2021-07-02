<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\FeedRequest;
use App\Mail\NewFeedbackRequest;
use App\Models\Admin\Settings;
use App\Models\Common\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function store(FeedRequest $request)
    {
        $feedback = Feedback::create($request->only('phone','body', 'name', 'city'));

        $settings = Settings::first();

        Mail::to($settings->admin_email)->queue(new NewFeedbackRequest($feedback));

        return response()->json( [
            "status" => "success", "message" => 'Отзыв отправлен.'
        ] );
    }
}
