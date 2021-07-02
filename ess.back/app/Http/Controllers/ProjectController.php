<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\ProjectCriteriaBuilder;
use App\Criteria\Project\WithDefaultRelationship;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends SeoController {
	/**
	 * ProjectController constructor.
	 *
	 * @param Request $request
	 */
	public function __construct(Request $request) {
		parent::__construct($request);
	}

	/**
	 * GetDisplay a listing of the resource.
	 *
	 * @param ProjectCriteriaBuilder $criteriaBuilder
	 * @return View
	 */
	public function index(ProjectCriteriaBuilder $criteriaBuilder): View {

		$paginator = Project::filterToPaginate($criteriaBuilder, $criteriaBuilder->max(), $criteriaBuilder->page());
		return view('projects.index', [
			'paginator' => $paginator->appends($criteriaBuilder->getRequest()->all()),
			'projects' => ProjectResource::rawPaginator($paginator, $criteriaBuilder->getRequest()),
		]);
	}

	/**
	 * @param Project $project
	 * @return View
	 */
	public function show(Project $project): View {

		$project->load(WithDefaultRelationship::relations());
		$this->setByEntity($project);
		return view('projects.show', [
			'project' => ProjectResource::rawData($project, null, false),
		]);
	}
}
