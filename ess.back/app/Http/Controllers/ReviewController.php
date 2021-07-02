<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\ReviewCriteriaBuilder;
use App\Http\Resources\ReviewsResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends SeoController {
	/**
	 * ReviewController constructor.
	 *
	 * @param Request $request
	 */
	public function __construct(Request $request) {
		parent::__construct($request);
	}

	/**
	 * GetDisplay a listing of the resource.
	 *
	 * @param ReviewCriteriaBuilder $criteriaBuilder
	 * @return View
	 */
	public function index(ReviewCriteriaBuilder $criteriaBuilder): View {

		$paginator = Review::filterToPaginate($criteriaBuilder, $criteriaBuilder->max(), $criteriaBuilder->page());
		return view('reviews.index', [
			'paginator' => $paginator->appends($criteriaBuilder->getRequest()->all()),
			'reviews' => ReviewsResource::rawPaginator($paginator, $criteriaBuilder->getRequest()),
		]);
	}
}
