<?php

namespace App\Http\Controllers;


class PrivatePoliceController extends SeoController {
  /**
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index() {
    return view('private-police.index');
  }

}
