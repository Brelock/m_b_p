<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRequest;
use App\Services\Actions\RequestServiceAction;

class RequestController extends Controller {
	/**
	 * @var RequestServiceAction
	 */
	protected $service;

	/**
	 * RequestController constructor.
	 *
	 * @param RequestServiceAction $service
	 */
	public function __construct(RequestServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * @param RequestRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(RequestRequest $request) {
		$this->service->createRequest($request->createDto());

		return response()->json([
			"status" => "success", "message" => 'Request sent.'
		]);
	}
}
