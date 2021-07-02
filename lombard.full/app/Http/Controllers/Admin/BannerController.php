<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Banner;
use App\Http\Requests\CommonRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $paginate = 10;
        $page = $request->has('page') ? $request->page*$paginate-$paginate : 0;
        $banners = Banner::paginate(10);

        return view('admin.banners.index', compact('banners', 'page'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.banners.create', compact('banner'));
    }

    public function store(CommonRequest $request)
    {
        $banner = new Banner;

        $this->saveBanner($request, $banner);

        return redirect()->route('banners.index')
            ->with(['message' => 'Баннер сохранён', 'class' => 'success']);
    }

    private function saveBanner(CommonRequest $request, $banner)
    {
        $input = $request->except('_token', '_method');

        if ($request->has('image')) {

            $banner->deleteImage($banner->image, 'banners');

            $input['image'] = $banner->saveImage($request->image, 'banners', 1920, 1080);
        } else {
            $input['image'] = $banner->image;
        }
        if ($request->has('image_mobile')) {

            $banner->deleteImage($banner->image_mobile, 'image_mobile');

            $input['image_mobile'] = $banner->saveImage($request->image_mobile, 'banners',665,500);
        } else {
            $input['image_mobile'] = $banner->image_mobile;
        }
        $banner->fill($input);
        $banner->save();
    }

    public function update(CommonRequest $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $this->saveBanner($request, $banner);

        return redirect()->route('banners.index')
            ->with(['message' => 'Баннер сохранён', 'class' => 'success']);
    }

    public function destroyAll(Request $request)
    {
        if( $request->banners && count($request->banners)){

            Banner::destroy($request->banners);
            return redirect()->route('banners.index')
                ->with(['message' => 'Баннеры удалены.', 'class' => 'success']);
        } else {
            return back()->with(['message' => 'Не выбрано ни одного баннера', 'class' => 'warning']);
        }

    }
    public function destroy(Banner $banner) {

        if ($banner->delete()){
            return response()->json( [
                "class" => "success", "message" => 'Баннер удален'
            ] );
        }
    }
}
