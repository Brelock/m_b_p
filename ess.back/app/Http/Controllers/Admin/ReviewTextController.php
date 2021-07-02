<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\Builder\ReviewCriteriaBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReorderRecordFormRequest;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewsResource;
use App\Models\Review;
use App\Services\Actions\ReviewServiceAction;
use Illuminate\View\View;

class ReviewTextController extends Controller {
	/**
	 * @var ReviewServiceAction
	 */
	protected $service;

  /**
   * ReviewController constructor.
   *
   * @param ReviewServiceAction $service
   */
	public function __construct(ReviewServiceAction $service) {
		$this->service = $service;
	}

  /**
   * @param ReviewCriteriaBuilder $criteriaBuilder
   *
   * @return View
   */
	public function index(ReviewCriteriaBuilder $criteriaBuilder): View {;
		return view('admin.reviews_text.index', ['reviewTexts' => ReviewsResource::collection(
      Review::filterToPaginate(
        $criteriaBuilder->enableOnlyTextReviews(),
        $criteriaBuilder->max('max', 15),
        $criteriaBuilder->page()
      )

    )]);
	}

	/**
	 * @return View
	 */
	public function create(): View {
	  $reviewText = new Review();
		return view('admin.reviews_text.edit', ['reviewText' => $reviewText]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ReviewRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function store(ReviewRequest $request) {
		$this->service->createReview($request->createDto());

		return redirect()
			->route('admin.review-texts.index')
			->with(['message' => 'Отзыв сохранен.', 'class' => 'success']);
	}

	/**
	 * @param Review $reviewText
	 * @return View
	 */
	public function edit(Review $reviewText): View {
		return view('admin.reviews_text.edit', ['reviewText' => $reviewText]);
	}

	/**
	 * Update the specified resource in storage
	 *
	 * @param ReviewRequest $request
	 * @param Review $reviewText
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function update(ReviewRequest $request, Review $reviewText) {
		$this->service->updateReview($reviewText, $request->createDto());
		return redirect()
			->route('admin.review-texts.index')
			->with(['message' => 'Отзыв изменен.', 'class' => 'success']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Review $reviewText
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(Review $reviewText) {
    $reviewText->delete();
		return redirect()
			->route('admin.review-texts.index')
			->with(['message' => 'Отзыв успешно удален.', 'class' => 'deleted']);

	}

	/**
	 * Move the specified agency to desired position.
	 *
	 * @param ReorderRecordFormRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function reorder(ReorderRecordFormRequest $request) {
		if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), Review::class)) {
			return response()->json(['status' => 'reorder']);
		}

		return response()->json(['error' => 'Отзыв не найден'], 404);
	}
}