<?php

namespace App\Http\Controllers\Admin;

use App\Slide;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\SlideRequest;
use App\Services\SlideService;

class SlideController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $slideService;

    public function __construct(SlideService $slideService)
    {
        $this->slideService = $slideService;
    }

    public function index()
    {
        $slides = $this->slideService->getAll();
        return view('admin.slides.index')->with('slides', $slides);
    }

    public function store(SlideRequest $request)
    {
        $slide = new Slide();
        $slide->url = $request->url;
        $slide->order = $request->order ?: 0;
        $slide->status = $request->status ? 1 : 0;
        $slide->save();
        if($request->has('image')){
            $slide->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.slides.index');
    }

    public function update(SlideRequest $request, Slide $slide)
    {
        $slide->update([
            'url' => $request->url,
            'order' => $request->order ?: 0,
            'status' => $request->status ? 1 : 0
        ]);

        if($request->has('image')){
            $slide->clearMediaCollection('images');
            $slide->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.slides.index');
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();

        return redirect()->back();
    }
}
