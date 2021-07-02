<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\ProjectCriteriaBuilder;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class MainController extends SeoController {
  /**
   * MainController constructor.
   * @param Request $request
   */
  public function __construct(Request $request) {
    parent::__construct($request);
  }

  /**
   * @param ProjectCriteriaBuilder $criteriaBuilder
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
	public function index(ProjectCriteriaBuilder $criteriaBuilder) {
		$projects = ProjectResource::rawList(
			Project::fetchAll($criteriaBuilder->enableLatestThree()->mainPage(), 3),
			$criteriaBuilder->getRequest(),
			false
		);

		return view('main.index', compact('projects'));
	}
}
