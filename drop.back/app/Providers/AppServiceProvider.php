<?php

namespace App\Providers;

use App\Import\Analyzer\BaseAnalyzer;
use App\Import\Analyzer\RozetkaAnalyzer;
use App\Models\Banner;
use App\Models\FileUnload;
use App\Models\ProductPicture;
use App\NovaPoshta\Connector\HttpConnector;
use App\Observers\GenerateOrderIndexObserver;
use App\Support\Guzzle\BaseHttpClient;
use App\Support\Guzzle\HttpClient;
use App\NovaPoshta\Models\BaseModel;
use App\NovaPoshta\Models\Transport;
use App\Observers\ProductPictureObserver;
use App\Services\Auth\IAuthService;
use App\Services\Auth\JwtAuthService;
use App\Services\FileService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
  /**
   * Register any application services.
   *
   * @return void
   *
   * @throws \Illuminate\Contracts\Container\BindingResolutionException
   */
  public function register() {
    $this->app->bind(IAuthService::class, JwtAuthService::class);

    $folderPath = env('IMPORT_XML_FILE_PATH');
    $fileName = env('IMPORT_XML_FILE_NAME');
    $this->app->instance(
      BaseAnalyzer::class, new RozetkaAnalyzer(storage_path("app/public/{$folderPath}/{$fileName}"))
    );

    $this->app->instance(BaseHttpClient::class, new HttpClient(config('services.guzzle_http_client')));

    $this->app->instance(HttpConnector::class, new HttpConnector(config('services.novaposhta')));

    $this->app->instance(FileService::class, new FileService(Storage::disk('public')));

    $this->app->instance(
      Transport::class,
      new Transport(
        config('services.novaposhta.api_key'), $this->app->make(HttpConnector::class)
      )
    );

    $this->app->instance(BaseModel::class, new BaseModel($this->app->make(Transport::class)));
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    $this->registerObservers();
  }

  /**
   * Register observers for concrete models.
   *
   * @return void
   */
  public function registerObservers() {
    ProductPicture::observe(ProductPictureObserver::class);
	  FileUnload::observe(GenerateOrderIndexObserver::class);
	  Banner::observe(GenerateOrderIndexObserver::class);
  }
}
