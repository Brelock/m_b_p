<?php

namespace App\Services\Actions;

use App\DTO\RequestDto;
use App\Mail\NewRequest;
use App\Models\Request;
use App\Models\Setting;
use App\Services\RequestService;
use Illuminate\Support\Facades\Mail;

class RequestServiceAction {
	/**
	 * @param RequestDto $dto
	 * @return Request
	 */
	public function createRequest(RequestDto $dto): Request {
		return $this->saveRequest(new Request(), $dto);
	}

	/**
	 * @param Request $request
	 * @param RequestDto $dto
	 * @return Request
	 */
	protected function saveRequest(Request $request, RequestDto $dto): Request {
		$service = new RequestService($request);

		$service
			->changeAttributes($dto)
			->commitChanges();

		$this->sendMail($this->getAdminMail(), $service->getRequest());

		return $service->getRequest();
	}

	/**
	 * @param string $adminMail
	 * @param Request $request
	 * @return mixed
	 */
	protected function sendMail(string $adminMail, Request $request) {
		return Mail::to($adminMail)->send(new NewRequest($request));
	}

	/**
	 * @return string
	 */
	protected function getAdminMail(): string {
		$settings = Setting::query()->first();
		return $settings->email;
	}
}