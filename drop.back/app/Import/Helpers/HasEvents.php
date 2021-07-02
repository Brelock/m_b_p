<?php

namespace App\Import\Helpers;

trait HasEvents {
  /**
   * List with events.
   *
   * @var array
   */
  protected $_eventStack = [];

  /**
   * Event subscription.
   *
   * @param  string $event
   * @param  \Closure $callback
   *
   * @return self
   */
  public function onEvent(string $event, \Closure $callback): self {
    if (!isset($this->_eventStack[$event]))
      $this->_eventStack[$event] = [];

    $this->_eventStack[$event][] = $callback;
    return $this;
  }

  /**
   * Call event.
   *
   * @param string $event
   * @param array $params
   * @param bool $once
   *
   * @return boolean
   */
  public function triggerEvent(string $event, array $params = [], bool $once = false): bool {
    $params['context'] = $this;
    if (!isset($this->_eventStack[$event]))
      return false;

    $count = count($this->_eventStack[$event]);
    if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
        call_user_func_array($this->_eventStack[$event][$i], $params);

        if ($once == true)
          array_splice($this->_eventStack[$event], $i, 1);
      }
    }

    return true;
  }

  /**
   * Clear list with events.
   */
  public function clearEvents() {
    $this->_eventStack = [];
  }
}