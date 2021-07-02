<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\WebAuthService;

class LoginController extends ApiAuthController {
  /**
   * AuthController constructor.
   *
   * @param WebAuthService $authService
   */
  public function __construct(WebAuthService $authService) {
    parent::__construct($authService);
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index() {
    return view('admin.login.index');
  }

  /**
   * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function logout() {
    $this->authService->invalidate();

    return redirect(RouteServiceProvider::HOME);
  }
}