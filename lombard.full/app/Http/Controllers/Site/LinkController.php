<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\Link;

class LinkController extends Controller {
  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
   */
  public function index() {
    $links = Link::query()->orderBy('ordering')->get();

    return view('site.main.links', ['links' => $links]);
  }
}
