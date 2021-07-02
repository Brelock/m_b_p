<?php

namespace App\Services\Auth\Token;

use App\Services\Auth\Exceptions\RetrieveTokenNotFound;

interface IStoreToken {
  /**
   * @param string $token
   * @return IStoreToken
   */
  public function storeToken(string $token);

  /**
   * @return string
   * @throws RetrieveTokenNotFound
   */
  public function retrieveToken() : string;

  /**
   * @return IStoreToken
   */
  public function clearToken();
}