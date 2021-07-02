<?php

namespace App\Services;

use App\DTO\SubscriptionDto;
use App\Models\Subscription;
use App\Services\Helpers\PromiseActionsTrait;

class SubscriptionService {
  use PromiseActionsTrait;

  /**
   * @var Subscription
   */
  private $subscription;

	/**
	 * SubscriptionService constructor.
	 *
	 * @param Subscription $subscription
	 */
  public function __construct(Subscription $subscription) {
    $this->subscription = $subscription;
  }

	/**
	 * @return Subscription
	 */
  public function getSubscription(): Subscription {
    return $this->subscription;
  }

	/**
	 * @param SubscriptionDto $dto
	 * @return $this
	 */
  public function changeAttributes(SubscriptionDto $dto): self {
    $this->subscription->fill($dto->toArray());
    return $this;
  }

	/**
	 * @return $this
	 */
  public function commitChanges(): self {
    $this->subscription->save();

    $this->releasePromiseActions();

    return $this;
  }
}