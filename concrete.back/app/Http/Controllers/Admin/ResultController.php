<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\View\View;

class ResultController extends Controller {
	/**
	 * GetDisplay a listing of the resource.
	 *
	 * @return View
	 */
	public function index(): View {
		$results = Result::query()->get();
		return view('admin.results.index', ['results' => $results]);
	}
}
