<?php

namespace App\Http\Controllers;


class InsuranceController extends SeoController {
  /**
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index() {
    return view('insurance.index');
  }
}
