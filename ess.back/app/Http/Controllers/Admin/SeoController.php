<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\Builder\SeoCriteriaBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeoRequest;
use App\Http\Resources\SeoResource;
use App\Models\Seo;
use App\Services\Actions\SeoServiceAction;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class SeoController extends Controller {
	/**
	 * @var SeoServiceAction
	 */
	protected $service;

	/**
	 * SeoController constructor.
	 *
	 * @param SeoServiceAction $service
	 */
	public function __construct(SeoServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * GetDisplay a listing of the resource.
	 *
	 * @param SeoCriteriaBuilder $criteriaBuilder
	 * @return View
	 */
	public function index(SeoCriteriaBuilder $criteriaBuilder): View {
		$paginator = Seo::filterToPaginate($criteriaBuilder, $criteriaBuilder->max(), $criteriaBuilder->page());

		return view('admin.seo.index', [
			'paginator' => $paginator->appends($criteriaBuilder->getRequest()->all()),
			'seo' => SeoResource::rawPaginator($paginator, $criteriaBuilder->getRequest()),
		]);
	}

	/**
	* @return View
	*/
	public function create(): View {
	  Artisan::call('cache:clear');
		return view('admin.seo.edit', ['seo' => new Seo()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param SeoRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(SeoRequest $request) {
		$this->service->createSeo($request->createDto());

		return redirect()
			->route('admin.seo.index')
			->with(['message' => 'Seo данные сохранены.', 'class' => 'success']);
	}

	/**
	 * @param Seo $seo
	 * @return View
	 */
	public function edit(Seo $seo): View {
    Artisan::call('cache:clear');
		return view('admin.seo.edit', [
			'seo' => $seo,
		]);
	}

	/**
	 * Update the specified resource in storage
	 *
	 * @param SeoRequest $request
	 * @param Seo $seo
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(SeoRequest $request, Seo $seo) {
		$this->service->updateSeo($seo, $request->createDto());

		return redirect()
			->route('admin.seo.index')
			->with(['message' => 'Seo данные изменены.', 'class' => 'success']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Seo $seo
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(Seo $seo) {
		$seo->delete();
		return redirect()
			->route('admin.seo.index')
			->with(['message' => 'Данные успешно удалены.', 'class' => 'deleted']);

	}

}
