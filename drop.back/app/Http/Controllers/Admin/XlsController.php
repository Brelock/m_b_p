<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FileFormat;
use App\Http\Controllers\Controller;
use App\Http\Requests\XlsRequest;
use App\Models\FileUnload;
use App\Services\Actions\FileUnloadServiceAction;
use Illuminate\Contracts\View\View;

class XlsController extends Controller {
  /**
   * @var FileUnloadServiceAction
   */
  protected $service;

  /**
   * XlsController constructor.
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

    return view('admin.xls.index', [
    	'xls' => FileUnload::onlyXLS()->first(),
	    'formatLabels' => FileFormat::$LABELS,
	    'formats' => FileFormat::getConstants()
    ]);
  }

	/**
	 * @param XlsRequest $xlsRequest
	 * @return \Illuminate\Http\RedirectResponse
	 */
  public function create(XlsRequest $xlsRequest) {
    $this->service->createFileUnload($xlsRequest->createDto());
    return redirect()->to(route('admin.xls.index'));
  }

  /**
   * @param FileUnload $xls
   * @param XlsRequest $xlsRequest
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(FileUnload $xls, XlsRequest $xlsRequest) {
    $this->service->updateFileUnload($xls, $xlsRequest->createDto());
    return redirect()->to(route('admin.xls.index'));
  }
}
