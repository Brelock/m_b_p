<?php

namespace App\Services;

use App\Delivery\Invoice;
use App\DTO\OrderDto;
use App\Enums\OrderStatuses;
use App\Helpers\NumberHelper;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use App\Services\Delivery\StoreDeliveryInvoiceFactory;
use App\Services\Helpers\PromiseActionsTrait;

class OrderService {
	use PromiseActionsTrait;

	/**
	 * @var Order
	 */
	private $order;

  /**
   * OrderService constructor.
   *
   * @param Order $order
   */
	public function __construct(Order $order) {
		$this->order = $order;
	}

	/**
	 * @return Order
	 */
	public function getOrder(): Order {
		return $this->order;
	}

	/**
	 * @param OrderDto $orderDto
	 * @return $this
	 */
	public function changeAttributes(OrderDto $orderDto): self {
		$this->order->fill($orderDto->toArray());
		return $this;
	}

  /**
   * @param User|null $owner
   * @return OrderService
   */
	public function attachOwner(?User $owner) : self {
	  $this->order->attachOwner($owner);
	  return $this;
  }

  /**
   * @param Product $product
   * @return OrderService
   */
	public function addProduct(Product $product) : self {
	  $this->recordPromiseAction(function() use($product) {
	    $newOrderProduct = new OrderProduct();

      $newOrderProduct->copyPriceFromProduct($product);

      $newOrderProduct->product()->associate($product);

	    $this->order
        ->orderProducts()
        ->save($newOrderProduct);

      $this->order->unsetRelation('orderProducts');
    });

	  $this->recordPromiseMethod('reloadRelations');
	  $this->recordPromiseMethod('recalculateAmounts');

	  return $this;
  }

  /**
   * @param Invoice $invoice
   * @return OrderService
   */
  public function attachNewDeliveryInvoice(Invoice $invoice) : self {
	  $this->recordPromiseAction(function() use($invoice) {
      StoreDeliveryInvoiceFactory::createStore($this->order)->store($this->order, $invoice);
    });

	  return $this;
  }

  /**
   * @return OrderService
   */
  public function confirm() : self {
    $this->order->cookie_hash = null;
    return $this;
  }

  /**
   * @return OrderService
   */
  public function active() : self {
    $this->order->status = OrderStatuses::ACTIVE;
    return $this;
  }

  /**
   * @return OrderService
   */
  public function archive() : self {
    $this->order->status = OrderStatuses::ARCHIVE;
    return $this;
  }

	/**
	 * @return $this
	 */
	public function commitChanges(): self {
		$this->order->save();

		$this->releasePromiseActions();

		return $this;
	}

  /**
   * @param  bool $save
   * @return OrderService
   */
	public function recalculateAmounts(bool $save = true) : self {
	  $this->order->total_amount = $this->order->orderProducts->finalTotalAmount();

    $earningsAmount = NumberHelper::round(($this->order->amount_cash_delivery - $this->order->total_amount));
    $this->order->amount_dropshipper_earnings = $earningsAmount > 0 ? $earningsAmount : 0;

    if($save)
      $this->order->save();

	  return $this;
  }

  /**
   * @return OrderService
   */
	protected function reloadRelations() : self {
	  $this->order->unsetRelation('orderProducts');
	  $this->order->load(['orderProducts']);

	  return $this;
  }
}
