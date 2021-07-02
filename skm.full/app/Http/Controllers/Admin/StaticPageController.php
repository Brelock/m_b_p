<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StaticPageRequest;
use App\StaticPage;
use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    public function index()
    {
        $pages = StaticPage::all();

        return view('admin.static_pages.index', compact('pages'));
    }

    public function edit(StaticPage $static_page)
    {
        return view('admin.static_pages.edit', compact('static_page'));
    }

    public function update(StaticPageRequest $request, StaticPage $static_page)
    {
        $static_page->update($request->except('_token', '_method'));

        return redirect()->route('admin.static-pages.index')->with(['message' => 'Страница отредактирована.', 'class' => 'success']);
    }
}
