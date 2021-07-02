<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LinkRequest;
use App\Models\Admin\Region;
use App\Models\Admin\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller {
  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
   */
  public function index() {
    $links = Link::orderBy('ordering')->paginate(20);

    return view('admin.links.index', ['links' => $links]);
  }

  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
   */
  public function edit($id) {
    $link = Link::findOrFail($id);
    $regions = Region::all();

    return view('admin.links.edit', ['link' => $link, 'regions' => $regions]);

  }

  /**
   * @param Request $request
   * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update(Request $request) {
    $links = Link::findOrFail($request->get('id'));

    if ($links->update($request->all())) {
      return redirect('admin/links')->with(['message' => 'Ссылка сохранена', 'class' => 'success']);
    }
    return redirect('admin/links')->with('error', 'Ошибка');
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
   */
  public function create() {
    $link = new Link();
    $regions = Region::all();

    return view('admin.links.edit', ['link' => $link, 'regions' => $regions]);

  }

  /**
   * @param LinkRequest $request
   * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store(LinkRequest $request) {
    $links = new Link();
    $links->fill($request->all());
    if ($links->save()) {
      return redirect('admin/links')->with(['message' => 'Ссылка  сохранена', 'class' => 'success']);
    }
  }

  /**
   * @param $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy($id) {
    if (is_array($id)) {
      $city = Link::whereIn('id', $id);
    } else {
      $city = Link::find($id);
    }
    if ($city->delete()) {
      return response()->json(["class" => "success", "message" => 'Ссылка удалена'], 200);
    }
  }

}
