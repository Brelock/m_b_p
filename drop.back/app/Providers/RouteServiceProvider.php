<?php

namespace App\Providers;

use App\Helpers\Auth\AuthenticatedUser;
use App\Models\FileUnload;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider {
  /**
   * This namespace is applied to your controller routes.
   *
   * In addition, it is set as the URL generator's root namespace.
   *
   * @var string
   */
  protected $namespace = 'App\Http\Controllers';

  /**
   * The path to the "home" route for your application.
   *
   * @var string
   */
  public const HOME = '/';

  /**
   * Define your route model bindings, pattern filters, etc.
   *
   * @return void
   */
  public function boot() {
    Route::bind('restoreUser', function ($id) {
      return User::onlyTrashed()->find($id);
    });

    Route::bind('uploadFile', function ($id) {
      return FileUnload::onlyXLS()->find($id);
    });

    Route::bind('orderProduct', function ($id) {
      $order = Order::whereCookieHash(AuthenticatedUser::getOrGenerateHashInSession())->firstOrFail();

      $orderProduct = OrderProduct::whereOrderId($order->id)->find($id);
      if($orderProduct)
        $orderProduct->setRelation('order', $order);

      return $orderProduct;
    });

    parent::boot();
  }

  /**
   * Define the routes for the application.
   *
   * @return void
   */
  public function map() {
    $this->mapAdminRoutes();

    $this->mapApiRoutes();

    $this->mapWebRoutes();

    //
  }

  /**
   * Define the "web" routes for the application.
   *
   * These routes all receive session state, CSRF protection, etc.
   *
   * @return void
   */
  protected function mapWebRoutes() {
    Route::middleware('web')
      ->namespace($this->namespace)
      ->group(base_path('routes/web.php'));
  }

  /**
   * Define the "api" routes for the application.
   *
   * These routes are typically stateless.
   *
   * @return void
   */
  protected function mapApiRoutes() {
    Route::prefix('api')
      ->middleware('api')
      ->namespace($this->namespace)
      ->group(base_path('routes/api.php'));
  }

  /**
   * Define the "api" routes for the application.
   *
   * These routes are typically stateless.
   *
   * @return void
   */
  protected function mapAdminRoutes() {
    Route::prefix('admin')
      ->middleware('web')
      ->namespace($this->namespace)
      ->group(base_path('routes/admin.php'));
  }
}
