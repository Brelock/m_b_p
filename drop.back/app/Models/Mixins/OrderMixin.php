<?php

namespace App\Models\Mixins;

use App\Delivery\DeliveryFactory;
use App\Delivery\Invoice;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

trait OrderMixin {
	/**
	 * @param Builder $query
	 * @param mixed $value
	 * @return \Closure
	 */
  protected function getFullTextSearchColumn($query, $value) {
	  return function ($query, $value) {
		  /**
		   * @var Builder $query
		   * @var mixed $value
		   */
		  return $query->where(function ($query) use ($value) {
			  /**
			   * @var Builder $query
			   * @var mixed $value
			   */
			  $query
				  ->where('dropshipper_full_name', 'like', "%{$value}%")
				  ->orWhere('delivery_general_info', 'like', "%{$value}%");
		  });
	  };
  }

  /**
   * @param string $hash
   * @return OrderMixin|Order
   */
  public static function findOrReturnNewByCookieHash(string $hash) : self {
    /* @var Order $order */
    $order = static::whereCookieHash($hash)->first();
    return $order ?: new Order(['cookie_hash' => $hash]);
  }

  /**
   * @return string
   */
  public function getNovaposhtaFullNameAttribute() {
    return join(" ", [
      $this->novaposhta_last_name,
      $this->novaposhta_first_name,
      $this->novaposhta_middle_name,
    ]);
  }

  /**
   * @return string
   */
  public function getNovaposhtaLocationAttribute() {
    $cityName = $this->relationLoaded('novaPoshtaCity')
      ? Arr::get($this->novaPoshtaCity, 'description_ru')
      : '';

    $warehouseName = $this->relationLoaded('novaPoshtaWarehouse')
      ? Arr::get($this->novaPoshtaWarehouse, 'description_ru')
      : '';

    return join(", ", [$cityName, $warehouseName]);
  }

  /**
   * @param User|null $owner
   * @return OrderMixin|Order
   */
  public function attachOwner(?User $owner) : self {
    /* @var Order|self $this */
    $this->user()->associate($owner);
    return $this;
  }

  /**
   * Checks for exists items in order.
   */
  public function checkHasProducts(): void {
    /* @var Order|self $this */
    if($this->orderProducts->isEmpty())
      throw new \LogicException('Cart is empty!');
  }

  /**
   * @return Invoice
   */
  public function invoice() : Invoice {
    /* @var Order|self $this */
    return DeliveryFactory::createInvoice($this);
  }
}