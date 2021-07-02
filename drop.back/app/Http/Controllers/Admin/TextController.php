<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaticPagesRequest;
use App\Models\StaticPage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class TextController extends Controller {
  /**
   * @param Collection $pages
   * @return View
   */
  protected function renderIndexView(Collection $pages) : View {
    return view('admin.text.index', ['staticPages' => $pages]);
  }

  /**
   * @return View
   */
  public function index(): View {
    return $this->renderIndexView(StaticPage::get());
  }

  /**
   * @param StaticPagesRequest $request
   * @return View
   */
  public function update(StaticPagesRequest $request) : View {
    $types = $request->get('types', []);
    $descriptions = $request->get('descriptions', []);

    $pages = StaticPage::query()
      ->whereIn('type', $types)
      ->get()
      ->map(function($page) use($descriptions) {
        /* @var StaticPage $page */
        if(Arr::has($descriptions, $page->type))
          $page->update(['description' => Arr::get($descriptions, $page->type)]);

        return $page;
      });

    return $this->renderIndexView($pages);
  }
}
