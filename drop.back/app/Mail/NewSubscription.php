<?php

namespace App\Mail;

use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSubscription extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * @var Subscription
	 */
	public $subscription;

	/**
	 * NewSubscription constructor.
	 *
	 * @param Subscription $subscription
	 */
	public function __construct(Subscription $subscription) {
		$this->subscription = $subscription;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from(config('mail.from.address'))
			->subject('Новый запрос')
			->view('emails.subscription', ['callback' => $this->subscription]);
	}
}
