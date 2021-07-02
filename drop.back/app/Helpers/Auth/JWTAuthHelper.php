<?php

namespace App\Helpers\Auth;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class JWTAuthHelper
 *
 * @package App\Helpers\Auth
 *
 * @method static \Tymon\JWTAuth\JWTAuth attempt(array $credentials)
 * @method static \Tymon\JWTAuth\JWTAuth authenticate()
 * @method static \Tymon\JWTAuth\JWTAuth toUser()
 * @method static \Tymon\JWTAuth\JWTAuth user()
 * @method static \Tymon\JWTAuth\JWTAuth parseToken()
 * @method static \Tymon\JWTAuth\JWTAuth setToken(string $token)
 * @method static \Tymon\JWTAuth\JWT fromUser(JWTSubject $user)
 * @method static \Tymon\JWTAuth\JWT invalidate(bool $forceForever)
 * @method static string getToken()
 */
class JWTAuthHelper extends JWTAuth {

}