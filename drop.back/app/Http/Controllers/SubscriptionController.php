<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Services\Actions\SubscriptionServiceAction;

class SubscriptionController extends Controller {
	/**
	 * @var SubscriptionServiceAction
	 */
	protected $service;

	/**
	 * CallbackController constructor.
	 *
	 * @param SubscriptionServiceAction $service
	 */
	public function __construct(SubscriptionServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * @param SubscriptionRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(SubscriptionRequest $request) {
		$this->service->createSubscription($request->createDto());
		return redirect()
			->back()
			->with(['status' => 'success', 'message' => 'Заявка на подписку отправлена']);

	}
}
