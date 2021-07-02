<?php

namespace App\Http\Middleware;

use App\Models\Admin\User;
use Closure;

class CheckAdminSpecialManagerRole {
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (auth()->user()->role != User::SPECIAL_MANAGER && auth()->user()->role != User::ADMIN) {
			return redirect('/');
		}

		return $next($request);
	}
}
