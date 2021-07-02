<?php

namespace App\Mail;

use App\Models\Callback;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCallback extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * @var Callback
	 */
	public $callback;

	/**
	 * NewCallback constructor.
	 *
	 * @param Callback $callback
	 */
	public function __construct(Callback $callback) {
		$this->callback = $callback;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from(config('mail.from.address'))
			->subject('Новый запрос')
			->view('emails.callback', ['callback' => $this->callback]);
	}
}
