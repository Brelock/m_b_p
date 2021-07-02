<?php

namespace App\Services\Actions;

use App\DTO\SubscriptionDto;
use App\Mail\NewSubscription;
use App\Models\Subscription;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Mail;

class SubscriptionServiceAction {
	/**
	 * @param SubscriptionDto $dto
	 * @return Subscription
	 */
	public function createSubscription(SubscriptionDto $dto): Subscription {
		return $this->saveSubscription(new Subscription(), $dto);
	}

	/**
	 * @param Subscription $subscription
	 * @param SubscriptionDto $dto
	 * @return Subscription
	 */
	protected function saveSubscription(Subscription $subscription, SubscriptionDto $dto): Subscription {
		$service = new SubscriptionService($subscription);

		$service
			->changeAttributes($dto)
			->commitChanges();

		$this->sendMail($this->getAdminMail(), $service->getSubscription());

		return $service->getSubscription();
	}

	/**
	 * @param string $adminMail
	 * @param Subscription $subscription
	 * @return mixed
	 */
	protected function sendMail(string $adminMail, Subscription $subscription) {
		return Mail::to($adminMail)->send(new NewSubscription($subscription));
	}

	/**
	 * @return string
	 */
	protected function getAdminMail(): string {
		return env('ADMIN_ADDRESS');
	}
}