<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\ReorderRecordFormRequest;
use App\Models\Banner;
use App\Services\Actions\BannerServiceAction;
use Illuminate\View\View;

class BannerController extends Controller {
	/**
	 * @var BannerServiceAction
	 */
	protected $service;

	/**
	 * BannerController constructor.
	 *
	 * @param BannerServiceAction $service
	 */
	public function __construct(BannerServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * @return View
	 */
	public function index(): View {
		$banners = Banner::query()->orderBy('display_order', 'ASC')->get();
		return view('admin.banners.index', ['banners' => $banners]);
	}

	/**
	 * @param BannerRequest $bannerRequest
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function create(BannerRequest $bannerRequest) {
		$this->service->createBanner($bannerRequest->createDto());

    return redirect()->to(route('admin.banners.index'));
	}

	/**
	 * @param integer $banner
	 * @param BannerRequest $bannerRequest
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(int $banner, BannerRequest $bannerRequest) {
		$bannerModel = Banner::query()->findOrFail($banner);
		$this->service->updateBanner($bannerModel, $bannerRequest->createDto());
		return redirect()->to(route('admin.banners.index'));
	}

	/**
	 * @param Banner $banner
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(Banner $banner) {
		$this->service->deleteBanner($banner);

		return redirect()->to(route('admin.banners.index'));
	}

	/**
	 * @param ReorderRecordFormRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function reorder(ReorderRecordFormRequest $request) {
		if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), Banner::class)) {
			return response()->json(['status' => 'reorder']);
		}

		return response()->json(['error' => 'Элемент не найден'], 404);
	}
}
