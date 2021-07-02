<?php

namespace App\Mail;

use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewRequest extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * @var Request
	 */
	public $request;

	/**
	 * NewRequest constructor.
	 *
	 * @param Request $request
	 */
	public function __construct(Request $request) {
		$this->request = $request;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from(config('mail.from.address'))
			->replyTo($this->request->email)
			->subject('New request')
			->view('emails.request', ['request' => $this->request]);
	}
}
