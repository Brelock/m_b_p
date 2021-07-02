<?php

namespace App\Http\Controllers;

class StatisticController extends SeoController {
  /**
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
	public function index() {
		return view('statistic.index');
	}
}
