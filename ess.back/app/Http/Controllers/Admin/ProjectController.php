<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PictureReorderRecordFormRequest;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ReorderRecordFormRequest;
use App\Models\Project;
use App\Models\ProjectPicture;
use App\Services\Actions\ProjectServiceAction;
use Illuminate\View\View;

class ProjectController extends Controller {
	/**
	 * @var ProjectServiceAction
	 */
	protected $service;

	/**
	 * ProjectController constructor.
	 *
	 * @param ProjectServiceAction $service
	 */
	public function __construct(ProjectServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * GetDisplay a listing of the resource.
	 *
	 * @return View
	 */
	public function index(): View {
		$projects = Project::query()->with('pictures')->orderBy('display_order')->get();
		return view('admin.projects.index', ['projects' => $projects]);
	}

	/**
	 * @return View
	 */
	public function create(): View {
		return view('admin.projects.edit', ['project' => new Project()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ProjectRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function store(ProjectRequest $request) {
		$this->service->createProject($request->createDto());

		return redirect()
			->route('admin.projects.index')
			->with(['message' => 'Проект сохранен.', 'class' => 'success']);
	}

	/**
	 * @param Project $project
	 * @return View
	 */
	public function edit(Project $project): View {
		return view('admin.projects.edit', ['project' => $project]);
	}

	/**
	 * Update the specified resource in storage
	 *
	 * @param ProjectRequest $request
	 * @param Project $project
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function update(ProjectRequest $request, Project $project) {
		$this->service->updateProject($project, $request->createDto());

		return redirect()
			->route('admin.projects.index')
			->with(['message' => 'Проект изменен.', 'class' => 'success']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Project $project
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(Project $project) {
		$project->delete();
		return redirect()
			->route('admin.projects.index')
			->with(['message' => 'Проект успешно удален.', 'class' => 'deleted']);

	}

	/**
	 * Restore the specified resource in storage.
	 *
	 * @param Project $restoreProject
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function restore(Project $restoreProject) {
		$restoreProject->restore();
		return response()->json([
			'status' => 'restored',
			'message' => 'Проект успешно восстановлен.'
			]);
	}

	/**
	 * Move the specified agency to desired position.
	 *
	 * @param ReorderRecordFormRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function reorder(ReorderRecordFormRequest $request) {
		if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), Project::class)) {
			return response()->json(['status' => 'reorder']);
		}

		return response()->json(['error' => 'Проект не найден'], 404);
	}

	/**
	 * Move the specified agency to desired position.
	 *
	 * @param PictureReorderRecordFormRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function reorderPictures(PictureReorderRecordFormRequest $request) {
		if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), ProjectPicture::class)) {
			return response()->json(['status' => 'reorder']);
		}

		return response()->json(['error' => 'Проект не найден'], 404);
	}

}
