<?php

namespace App\Services\Helpers;

use Illuminate\Support\Arr;

trait PromiseActionsTrait {
  /**
   * @var \Closure[] $transactionActions
   */
  private $promiseActions = [];

  /**
   * Push to promise callable custom method in OrderItemService.
   *
   * @param string $methodName
   * @param array $params
   * @param string $promiseStack
   */
  protected function recordPromiseMethod(string $methodName, array $params = [], string $promiseStack = 'after') {
    $this->recordOnePromiseAction(function () use ($methodName, $params) {
      call_user_func_array([$this, $methodName], $params);
    }, $methodName, $promiseStack);
  }

  /**
   * Record promise action with check duplicate.
   *
   * @param \Closure $actionCallback
   * @param string $uniqueKey
   * @param string $key
   * @return $this
   */
  protected function recordOnePromiseAction(\Closure $actionCallback, string $uniqueKey, string $key = 'after'): self {
    $this->promiseActions[$key][$uniqueKey] = $actionCallback;
    return $this;
  }

  /**
   * Queue for actions after commit changes.
   *
   * @param \Closure $actionCallback
   * @param string $key
   * @return $this
   */
  protected function recordPromiseAction(\Closure $actionCallback, string $key = 'after'): self {
    $this->promiseActions[$key][] = $actionCallback;
    return $this;
  }

  /**
   * Dispatch promises actions.
   *
   * @param string $key
   * @return $this
   */
  protected function releasePromiseActions(string $key = 'after'): self {
    $actions = collect(Arr::wrap(Arr::get($this->promiseActions, $key, [])))
      ->sortBy(function($callback, $key) {
        return strlen((string)$key);
      });

    foreach($actions as $action) {
      if(is_callable($action))
        $action();
    }

    $this->promiseActions[$key] = [];
    return $this;
  }
}