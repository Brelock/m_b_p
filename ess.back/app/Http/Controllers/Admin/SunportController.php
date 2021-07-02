<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReorderRecordFormRequest;
use App\Http\Requests\SunportRequest;
use App\Models\Sunport;
use App\Services\Actions\SunportServiceAction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SunportController extends Controller {
  /**
   * @var SunportServiceAction
   */
  protected $service;

  /**
   * SunportController constructor.
   *
   * @param SunportServiceAction $service
   */
  public function __construct(SunportServiceAction $service) {
    $this->service = $service;
  }

  /**
   * GetDisplay a listing of the resource.
   *
   * @return View
   */
  public function index(): View {
    $sunports = Sunport::query()->orderBy('display_order')->get();
    return view('admin.sunports.index', ['sunports' => $sunports]);
  }

  /**
   * @return View
   */
  public function create(): View {
    return view('admin.sunports.edit', ['sunport' => new Sunport()]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param SunportRequest $request
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function store(SunportRequest $request) {
//    dd($request->createDto());

    $this->service->createSunport($request->createDto());

    return redirect()
      ->route('admin.sunports.index')
      ->with(['message' => 'Продукт sunport сохранен.', 'class' => 'success']);
  }

  /**
   * @param Sunport $sunport
   * @return View
   */
  public function edit(Sunport $sunport): View {
    return view('admin.sunports.edit', ['sunport' => $sunport]);
  }

  /**
   * Update the specified resource in storage
   *
   * @param SunportRequest $request
   * @param Sunport $sunport
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function update(SunportRequest $request, Sunport $sunport) {
//    dd($request);
    $this->service->updateSunport($sunport, $request->createDto());
    return redirect()
      ->route('admin.sunports.index')
      ->with(['message' => 'Продукт sunport изменен.', 'class' => 'success']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Sunport $sunport
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy(Sunport $sunport) {
    $sunport->forceDelete();

    return redirect()
      ->route('admin.sunports.index')
      ->with(['message' => 'Продукт sunport успешно удален.', 'class' => 'deleted']);

  }

  /**
   * Move the specified agency to desired position.
   *
   * @param ReorderRecordFormRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function reorder(ReorderRecordFormRequest $request) {
    if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), Sunport::class)) {
      return response()->json(['status' => 'reorder']);
    }

    return response()->json(['error' => 'Продукт sunport не найден'], 404);
  }
}
