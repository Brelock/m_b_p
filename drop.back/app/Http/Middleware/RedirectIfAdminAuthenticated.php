<?php

namespace App\Http\Middleware;

class RedirectIfAdminAuthenticated extends RedirectIfAuthenticated {
  /**
   * @return string
   */
  protected function redirectTo(): string {
    return route('admin.orders.index');
  }
}
