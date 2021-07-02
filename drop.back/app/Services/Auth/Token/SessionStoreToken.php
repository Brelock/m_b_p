<?php

namespace App\Services\Auth\Token;

use App\Services\Auth\Exceptions\RetrieveTokenNotFound;
use Illuminate\Http\Request;

class SessionStoreToken implements IStoreToken {
  /**
   * @var Request
   */
  protected $request;

  /**
   * @var string
   */
  private $_sessionKey = 'session.jwt.auth.token';

  /**
   * SessionStoreToken constructor.
   *
   * @param Request $request
   */
  public function __construct(Request $request) {
    $this->request = $request;
  }

  /**
   * @param string $token
   * @return SessionStoreToken
   */
  public function storeToken(string $token) : self {
    $this->request->session()->put($this->_sessionKey, $token);
    return $this;
  }

  /**
   * @return string
   * @throws RetrieveTokenNotFound
   */
  public function retrieveToken() : string {
    $token = $this->request->getSession()->get($this->_sessionKey);
    if(empty($token))
      throw new RetrieveTokenNotFound('Token is required.');

    return $token;
  }

  /**
   * @return SessionStoreToken
   */
  public function clearToken() : self {
    $this->request->session()->remove($this->_sessionKey);
    return $this;
  }
}