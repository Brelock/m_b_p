<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CartController;
use Closure;

class FlashSuccessOrderMiddleware {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next) {
    $order = $request->session()->remove(CartController::_FLASH_SUCCESS_ORDER_KEY);
    if($order) {
      $request->offsetSet(CartController::_FLASH_SUCCESS_ORDER_KEY, $order);
      return $next($request);
    }

    return redirect(route('cart.index'));
  }
}
