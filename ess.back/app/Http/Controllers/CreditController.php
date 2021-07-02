<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\SolutionCriteriaBuilder;
use App\Enums\SolutionsType;
use App\Http\Resources\SolutionResource;
use App\Models\Solution;
use Illuminate\Http\Request;

class CreditController extends SeoController {
  /**
   * PrivatePersonController constructor.
   * @param Request $request
   */
  public function __construct(Request $request) {
    parent::__construct($request);
  }

  /**
   * @param SolutionCriteriaBuilder $criteriaBuilder
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index(SolutionCriteriaBuilder $criteriaBuilder) {
    $solutions = Solution::query()->where('type', SolutionsType::CREDIT)->get();
    return view('credit.index', [
      'solutions' => SolutionResource::rawList($solutions, $criteriaBuilder->getRequest(), false),
    ]);
  }
}
