<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\Builder\CallbackCriteriaBuilder;
use App\Http\Controllers\Controller;
use App\Http\Resources\CallbackResource;
use App\Models\Callback;
use Illuminate\View\View;

class CallbackController extends Controller {
  /**
   * GetDisplay a listing of the resource.
   *
   * @param CallbackCriteriaBuilder $criteriaBuilder
   * @return View
   */
	public function index(CallbackCriteriaBuilder $criteriaBuilder ): View {
    $paginator = Callback::filterToPaginate($criteriaBuilder, $criteriaBuilder->max(), $criteriaBuilder->page());
		return view('admin.callbacks.index', [
      'paginator' => $paginator->appends($criteriaBuilder->getRequest()->all()),
      'callbacks' => CallbackResource::rawPaginator($paginator, $criteriaBuilder->getRequest())
    ]);
	}

  /**
   * Remove the specified resource from storage.
   *
   * @param Callback $callback
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy(Callback $callback) {
    $callback->delete();
    return redirect()
      ->route('admin.callbacks')
      ->with(['message' => 'Заявка успешно удалена.', 'class' => 'deleted']);
  }
}
