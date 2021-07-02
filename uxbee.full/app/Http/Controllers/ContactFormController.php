<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\NewRequest;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller {
	/**
	 * Send mail to admin
	 *
	 * @param ContactFormRequest $request
	 * @return mixed
	 */
	public function sendMail(ContactFormRequest $request) {
		Mail::to(env('ADMIN_MAIL_ADDRESS') ?: '')->send(new NewRequest($request));

		return response()->json(['status' => 'success', 'message' => 'Request sent.']);
	}
}
