<?php

namespace App\Http\Controllers\Admin;


use App\Brands;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


class BrandsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $brand = Brands::first();

        if(!$brand) { $brand = Brands::create(); }

        return view('admin.brands.index',compact('brand'));
    }

    public function store(Request $request)
    {
        $brand = Brands::first();

        if(!$brand) { $brand = Brands::create(); }

        $this->updateMediaCollection($brand, 'images', $request->input('photo-collection', []));

        return redirect()->route('admin.brands.index');
    }

    private function updateMediaCollection($model, $collectionName, $requestFilenames)
    {
        if (count($model->getMedia($collectionName)) > 0) {
            foreach ($model->getMedia($collectionName) as $media) {
                if (!in_array($media->file_name, $requestFilenames)) {
                    $media->delete();
                }
            }
        }

        $media = $model->getMedia($collectionName)->pluck('file_name')->toArray();

        foreach ($requestFilenames as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $model->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection($collectionName);
            }
        }
    }

}
