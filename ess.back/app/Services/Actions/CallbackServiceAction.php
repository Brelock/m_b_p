<?php

namespace App\Services\Actions;

use App\DTO\CallbackDto;
use App\Mail\NewCallback;
use App\Models\Callback;
use App\Models\Settings;
use App\Services\CallbackService;
use Illuminate\Support\Facades\Mail;

class CallbackServiceAction {
	/**
	 * @param CallbackDto $dto
	 * @return callable
	 */
	public function createCallback(CallbackDto $dto): Callback {
		return $this->saveCallback(new Callback(), $dto);
	}

	/**
	 * @param Callback $callback
	 * @param CallbackDto $dto
	 * @return callable
	 */
	protected function saveCallback(Callback $callback, CallbackDto $dto): Callback {
		$service = new CallbackService($callback);

		$service
			->changeAttributes($dto)
			->commitChanges();

		$this->sendMail($this->getAdminMail(), $service->getCallback());

		return $service->getCallback();
	}

	/**
	 * @param string $adminMail
	 * @param Callback $callback
	 * @return mixed
	 */
	protected function sendMail(string $adminMail, Callback $callback) {
		return Mail::to($adminMail)->send(new NewCallback($callback));
	}

	/**
	 * @return string
	 */
	protected function getAdminMail(): string {
		$settings = Settings::getInstanceModel();
		return $settings->email;
	}
}