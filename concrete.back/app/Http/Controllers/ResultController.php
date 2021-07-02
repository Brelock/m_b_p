<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultRequest;
use App\Services\Actions\ResultServiceAction;

class ResultController extends Controller {
	/**
	 * @var ResultServiceAction
	 */
	protected $service;

	/**
	 * ResultController constructor.
	 *
	 * @param ResultServiceAction $service
	 */
	public function __construct(ResultServiceAction $service) {
		$this->service = $service;
	}
	public function store(ResultRequest $request) {
		$result = $this->service->createResult($request->createDto());
		return response()->json([
			"status" => "success",
			"data" => $result->result,
		]);
	}
}
