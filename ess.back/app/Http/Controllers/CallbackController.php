<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallbackRequest;
use App\Services\Actions\CallbackServiceAction;
use Illuminate\Http\Request;

class CallbackController extends SeoController {
	/**
	 * @var CallbackServiceAction
	 */
	protected $service;

	/**
	 * CallbackController constructor.
	 *
	 * @param CallbackServiceAction $service
	 * @param Request $request
	 */
	public function __construct(CallbackServiceAction $service, Request $request) {
		$this->service = $service;

		parent::__construct($request);
	}

	/**
	 * @param CallbackRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(CallbackRequest $request) {
		$this->service->createCallback($request->createDto());

		return response()->json([
			"status" => "success", "message" => 'Callback sent.'
		]);
	}
}
