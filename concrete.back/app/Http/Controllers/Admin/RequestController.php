<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request;
use Illuminate\View\View;

class RequestController extends Controller {
	/**
	 * GetDisplay a listing of the resource.
	 *
	 * @return View
	 */
	public function index(): View {
		$requests = Request::query()->get();
		return view('admin.requests.index', ['requests' => $requests]);
	}
}
