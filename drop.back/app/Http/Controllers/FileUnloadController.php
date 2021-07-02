<?php

namespace App\Http\Controllers;

use App\Enums\FileExtension;
use App\Enums\FileFormat;
use App\Helpers\FileHelper;
use App\Models\FileUnload;
use App\Models\Product;
use App\Services\FileService;
use \Illuminate\View\View;

class FileUnloadController extends Controller {
	/**
	 * @var FileService
	 */
	protected $fileService;

	/**
	 * DownloadController constructor.
	 *
	 * @param FileService $fileService
	 */
	public function __construct(FileService $fileService) {
		$this->fileService = $fileService;
	}

	/**
	 * @return View
	 */
  public function index() {
    $fileUploadsXml = FileUnload::onlyXML()->get();
	  $fileUploadsXls = FileUnload::onlyXLS()->get();

	  $formatLabels = FileFormat::$LABELS;
    return view('unloading.index', compact(
	    'fileUploadsXml',
	    'fileUploadsXls',
	    'formatLabels'
    ));
  }

	/**
	 * @param FileUnload $unloadFile
	 * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
	 */
	public function unload(FileUnload $unloadFile) {
		return response()->download($unloadFile->storagePath($unloadFile->file_name), $unloadFile->file_name);
	}

	/**
	 * @param Product $product
	 * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
	 */
	public function downloadPicturesZip(Product $product) {
		if ($product->pictures->isEmpty())
			return redirect()->back();

		$zipFileName = FileHelper::generateNewName(FileExtension::ARCHIVE_FILE_EXTENSION);
		$path = "temporary/{$zipFileName}";

		if ($this->fileService->createZipArchiveWithFiles($path, $product->pictures->mapToMoveZipArchive()->all())) {
			return response()->download($this->fileService->storagePath($path), $zipFileName);
		}

		return redirect()->back();
	}
}
