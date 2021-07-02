<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SolutionsType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReorderRecordFormRequest;
use App\Http\Requests\SolutionRequest;
use App\Models\Solution;
use App\Services\Actions\SolutionServiceAction;
use Illuminate\View\View;

class SolutionController extends Controller {
  /**
   * @var SolutionServiceAction
   */
  protected $service;

  /**
   * SolutionController constructor.
   *
   * @param SolutionServiceAction $service
   */
  public function __construct(SolutionServiceAction $service) {
    $this->service = $service;
  }

  /**
   * GetDisplay a listing of the resource.
   *
   * @return View
   */
  public function index(): View {
    $solutions = Solution::query()->orderBy('display_order')->get();
    return view('admin.solutions.index', ['solutions' => $solutions]);
  }

  /**
   * @return View
   */
  public function create(): View {
    $solutionType = SolutionsType::getConstants();
    return view('admin.solutions.edit', [
      'solution' => new Solution(),
      'solutionType' => $solutionType,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param SolutionRequest $request
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function store(SolutionRequest $request) {
    $this->service->createSolution($request->createDto());

    return redirect()
      ->route('admin.solutions.index')
      ->with(['message' => 'Решение сохранено.', 'class' => 'success']);
  }

  /**
   * @param Solution $solution
   * @return View
   */
  public function edit(Solution $solution): View {
    $solutionType = SolutionsType::getConstants();
    return view('admin.solutions.edit', [
      'solution' => $solution,
      'solutionType' => $solutionType,
    ]);
  }

  /**
   * Update the specified resource in storage
   *
   * @param SolutionRequest $request
   * @param Solution $solution
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function update(SolutionRequest $request, Solution $solution) {
    $this->service->updateSolution($solution, $request->createDto());

    return redirect()
      ->route('admin.solutions.index')
      ->with(['message' => 'Решение изменено.', 'class' => 'success']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Solution $solution
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy(Solution $solution) {
    if ($solution->picture_file_name)
      $this->service->deleteSolution($solution);
    $solution->delete();

    return redirect()
      ->route('admin.solutions.index')
      ->with(['message' => 'Решение успешно удалено.', 'class' => 'deleted']);

  }

  /**
   * Move the specified agency to desired position.
   *
   * @param ReorderRecordFormRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function reorder(ReorderRecordFormRequest $request) {
    if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), Solution::class)) {
      return response()->json(['status' => 'reorder']);
    }

    return response()->json(['error' => 'Решение не найдено'], 404);
  }

}
