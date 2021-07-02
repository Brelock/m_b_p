<?php

namespace App\Http\Controllers;

use App\StaticPage;

class StaticPageController extends Controller
{
    public function __invoke(StaticPage $page)
    {
        return view('site.static_pages.index', compact('page'));
    }
}
