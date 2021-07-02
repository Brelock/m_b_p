<?php

namespace App\Http\Controllers\Api;

use App\Console\Commands\DownloadRozetkaXml;
use App\Console\Commands\ImportRozetkaXml;
use App\Http\Controllers\Controller;
use App\Import\Analyzer\BaseAnalyzer;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class TestController extends Controller {
  /**
   * @var BaseAnalyzer
   */
  protected $importAnalyzer;

  /**
   * TestController constructor.
   *
   * @param BaseAnalyzer $importAnalyzer
   */
  public function __construct(BaseAnalyzer $importAnalyzer) {
    $this->importAnalyzer = $importAnalyzer;
  }

  public function queue() {
    $jobs = DB::table('failed_jobs')->where('failed_at', '<=', now()->subMinutes(7))->get();

    foreach ($jobs as $job) {
      Artisan::call('queue:retry', [
        'id' => $job->id
      ]);
    }
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   */
  public function downloadXml() {
    Artisan::call(DownloadRozetkaXml::class);

    return response()->json(['status' => 'success']);
  }

  /**
   * @throws \Exception
   */
  public function parseXml() {
  	$categories = $this->importAnalyzer->getCategories();
  	$offers = $this->importAnalyzer->getOffers();
    return response()->json([
      'status' => 'success',
	    'offersCount' => $offers->count(),
      'categories' => $categories->buildTreeWithSubCategories()->toArray(),
      'offers' => $offers->toArray(),
    ]);
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   */
  public function import() {
    Artisan::call(ImportRozetkaXml::class);

    return response()->json(['status' => 'success']);
  }

}