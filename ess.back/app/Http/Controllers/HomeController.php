<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends SeoController {

	/**
	 * HomeController constructor.
	 *
	 * @param Request $request
	 */
	public function __construct(Request $request) {
		$this->middleware('auth');
		parent::__construct($request);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		return view('admin.home');
	}
}
