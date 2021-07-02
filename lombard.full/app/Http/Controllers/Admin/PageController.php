<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommonRequest;
use App\Models\Admin\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::get();

        return view('admin.pages.index', compact('pages'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('admin.pages.create', compact('page'));
    }

    public function update(CommonRequest $request, $id)
    {
        $input = $request->except('_token', '_method', 'images');

        $input['meta_title_ru'] = $request->meta_title_ru ? $request->meta_title_ru : $request->title_ru;
        $input['meta_title_uk'] = $request->meta_title_uk ? $request->meta_title_uk : $request->title_uk;
        $input['meta_description_ru'] = $request->meta_description_ru ? $request->meta_description_ru : substr(strip_tags(html_entity_decode($request->description_ru)), 0, strrpos(substr(strip_tags(html_entity_decode($request->description_ru)), 0, 300), ' '));
        $input['meta_description_uk'] = $request->meta_description_uk ? $request->meta_description_uk : substr(strip_tags(html_entity_decode($request->description_uk)), 0, strrpos(substr(strip_tags(html_entity_decode($request->description_uk)), 0, 300), ' '));

        $page = Page::findOrFail($id);

        if ($request->has('image')) {

            $page->deleteImage($page->image, 'page');

            $input['image'] = $page->saveImage($request->image, 'page', 1200, null);
        } else {
            $input['image'] = $page->image;
        }

        $page->update($input);


        return redirect()->route('pages.index')
            ->with(['message' => 'Страница отредактирована.', 'class' => 'success']);
    }

}
