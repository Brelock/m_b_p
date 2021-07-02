<?php

namespace App\Widgets;

use App\Criteria\Builder\CartCriteriaBuilder;
use App\Models\Order;
use \Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Arr;

class CartWidget extends AbstractWidget {
  /**
   * Treat this method as a controller action.
   * Return view() or other content to display.
   */
  public function run() {
  	$cartCriteriaBuilder = new CartCriteriaBuilder();
  	$order = Order::findOne($cartCriteriaBuilder);

    return view('widgets.cart', [
      'count' => $order ? $order->orderProducts->count() : 0,
	    'config' => $this->config,
	    'vue' => Arr::get($this->config, 'vue', true),
    ]);
  }
}