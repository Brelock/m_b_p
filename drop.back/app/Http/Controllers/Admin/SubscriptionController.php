<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Contracts\View\View;

class SubscriptionController extends Controller {
  /**
   * @return View
   */
  public function index(): View {
    return view('admin.subscription.index', ['subscriptions' => Subscription::query()->get()]);
  }
}
