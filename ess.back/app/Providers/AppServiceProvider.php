<?php

namespace App\Providers;

use App\Models\NewsPicture;
use App\Models\Product;
use App\Models\ProductPicture;
use App\Models\Project;
use App\Models\ProjectPicture;
use App\Models\Review;
use App\Models\Solution;
use App\Models\Sunport;
use App\Models\SunportParamPicture;
use App\Observers\GenerateOrderIndexObserver;
use App\Observers\SunportObserver;
use App\Observers\SunportParamPictureObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    $this->registerObservers();
    view()->composer('*', function ($view) {

      $locale = app()->getLocale();

      $view->with(compact('locale'));
    });
  }

  public function registerObservers() {
    // generate order indexes
    ProjectPicture::observe(GenerateOrderIndexObserver::class);
    Project::observe(GenerateOrderIndexObserver::class);
    Product::observe(GenerateOrderIndexObserver::class);
    ProductPicture::observe(GenerateOrderIndexObserver::class);
    NewsPicture::observe(GenerateOrderIndexObserver::class);
    Solution::observe(GenerateOrderIndexObserver::class);
    Review::observe(GenerateOrderIndexObserver::class);

    Sunport::observe([GenerateOrderIndexObserver::class, SunportObserver::class]);

    SunportParamPicture::observe(SunportParamPictureObserver::class);
  }
}
