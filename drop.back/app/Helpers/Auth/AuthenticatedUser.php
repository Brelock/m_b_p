<?php


namespace App\Helpers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthenticatedUser
 * @package App\Helpers\Auth
 */
class AuthenticatedUser {
  /**
   * @var User
   */
  private static $authenticatedUser;

  /**
   * Check is authenticated User
   * @return bool
   */
  public static function isAuth() : bool {
    return Auth::check();
  }

  /**
   * @return bool
   */
  public static function isGuest() : bool {
    return !static::isAuth();
  }

  /**
   * Get authenticated User.
   *
   * @return User
   */
  public static function getUser() {
    if (!static::$authenticatedUser) {
      /* @var User $user */
      $user = Auth::user();

      if($user)
        $user->load(['role']);

      static::$authenticatedUser = $user;
    }

    return static::$authenticatedUser;
  }

  /**
   * @return bool
   */
  public static function hasAccess(): bool {
    return static::getUser() && !empty(static::getUser()->role);
  }

  /**
   * Get hash from session or generate it's in session and return.
   *
   * @param Request|null $request
   * @return string
   */
  public static function getOrGenerateHashInSession($request = null) {
    $request = $request ?: request();
    $session = $request->getSession();

    $sessionKey = 'sessionUserHash';
    if(!$session->has($sessionKey)) {
      $hash = uniqid(time(), true);
      $session->put([$sessionKey => $hash]);
    }

    return $session->get($sessionKey);
  }
}