<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FileFormat;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReorderRecordFormRequest;
use App\Http\Requests\XmlRequest;
use App\Models\FileUnload;
use App\Services\Actions\FileUnloadServiceAction;
use Illuminate\View\View;

class LinkController extends Controller {
	/**
	 * @var FileUnloadServiceAction
	 */
	protected $service;

	/**
	 * LinkController constructor.
	 *
	 * @param FileUnloadServiceAction $service
	 */
	public function __construct(FileUnloadServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * @return View
	 */
	public function index(): View {
		$fileUnloads = FileUnload::onlyXML()->orderBy('display_order', 'ASC')->get();
		$formatLabels = FileFormat::$LABELS;
		$formats = FileFormat::getConstants();
		return view('admin.xml.index', compact('fileUnloads', 'formatLabels', 'formats'));
	}

	/**
	 * @param XmlRequest $xmlRequest
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function create(XmlRequest $xmlRequest) {
		$this->service->createFileUnload($xmlRequest->createDto());

    return redirect()->to(route('admin.links.index'));
	}

	/**
	 * @param int $link
	 * @param XmlRequest $xmlRequest
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(int $link, XmlRequest $xmlRequest) {
		$link = FileUnload::query()->findOrFail($link);
		$this->service->updateFileUnload($link, $xmlRequest->createDto());

		return redirect()->to(route('admin.links.index'));
	}

	/**
	 * @param FileUnload $link
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(FileUnload $link) {
		$link->delete();

		return redirect()->to(route('admin.links.index'));
	}

	/**
	 * @param ReorderRecordFormRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function reorder(ReorderRecordFormRequest $request) {
		if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), FileUnload::class)) {
			return response()->json(['status' => 'reorder']);
		}

		return response()->json(['error' => 'Элемент не найден'], 404);
	}
}
