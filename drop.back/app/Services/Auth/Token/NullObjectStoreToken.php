<?php

namespace App\Services\Auth\Token;

use App\Services\Auth\Exceptions\RetrieveTokenNotFound;

class NullObjectStoreToken implements IStoreToken {
  /**
   * @param string $token
   * @return $this|IStoreToken
   */
  public function storeToken(string $token) {
    return $this;
  }

  /**
   * @return string
   * @throws RetrieveTokenNotFound
   */
  public function retrieveToken(): string {
    throw new RetrieveTokenNotFound('Token is not found.');
  }

  /**
   * @return $this|IStoreToken
   */
  public function clearToken() {
    return $this;
  }
}