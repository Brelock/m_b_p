<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\PictureReorderRecordFormRequest;
use App\Models\News;
use App\Models\NewsPicture;
use App\Services\Actions\NewsServiceAction;
use Illuminate\View\View;

class NewsController extends Controller {
	/**
	 * @var NewsServiceAction
	 */
	protected $service;

	/**
	 * NewsController constructor.
	 *
	 * @param NewsServiceAction $service
	 */
	public function __construct(NewsServiceAction $service) {
		$this->service = $service;
	}
	/**
	 * GetDisplay a listing of the resource.
	 *
	 * @return View
	 */
	public function index(): View {
		$news = News::query()->get();
		return view('admin.news.index', ['news' => $news]);
	}


	/**
	 * @return View
	 */
	public function create(): View {
		return view('admin.news.edit', ['news' => new News()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param NewsRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function store(NewsRequest $request) {

		$this->service->createNews($request->createDto());

		return redirect()
			->route('admin.news.index')
			->with(['message' => 'Новость сохранена.', 'class' => 'success']);
	}

	/**
	 * @param News $news
	 * @return View
	 */
	public function edit(News $news): View {
		return view('admin.news.edit', ['news' => $news]);
	}

	/**
	 * Update the specified resource in storage
	 *
	 * @param NewsRequest $request
	 * @param News $news
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function update(NewsRequest $request, News $news) {
		$this->service->updateNews($news, $request->createDto());

		return redirect()
			->route('admin.news.index')
			->with(['message' => 'Новость изменена.', 'class' => 'success']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param News $news
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(News $news) {
		$news->delete();

		return redirect()
			->route('admin.news.index')
			->with(['message' => 'Новость успешно удалена.', 'class' => 'deleted']);

	}


	/**
	 * Restore the specified resource in storage.
	 *
	 * @param News $restoreNews
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function restore(News $restoreNews) {
		$restoreNews->restore();
		return response()->json([
			'status' => 'restored',
			'message' => 'Новость успешно восстановлена.'
		]);
	}

	/**
	 * Move the specified agency to desired position.
	 *
	 * @param PictureReorderRecordFormRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function reorderPictures(PictureReorderRecordFormRequest $request) {
		if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), NewsPicture::class)) {
			return response()->json(['status' => 'reorder']);
		}

		return response()->json(['error' => 'Новость не найден'], 404);
	}

}
