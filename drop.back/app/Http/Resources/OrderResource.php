<?php

namespace App\Http\Resources;

use App\Enums\DeliveryTypes;
use App\Enums\OrderStatuses;
use App\Http\Resources\NovaPoshta\NovaPoshtaCityResource;
use App\Http\Resources\NovaPoshta\NovaPoshtaWarehouseResource;
use App\Models\Order;
use Illuminate\Support\Arr;

class OrderResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var Order|self $this */
    return [
      'id' => $this->id,
      'status' => $this->status,

      'isActive' => $this->status === OrderStatuses::ACTIVE,
      'isArchived' => $this->status === OrderStatuses::ARCHIVE,

      'dropshipper_full_name' => $this->dropshipper_full_name,
      'dropshipper_phone_number' => $this->dropshipper_phone_number,

      'payment_type' => $this->payment_type,

      'delivery_type' => $this->delivery_type,
      'delivery_name' => Arr::get(
        DeliveryTypes::$LABELS,
        $this->delivery_type,
        DeliveryTypes::$LABELS[DeliveryTypes::NOVA_POSHTA]
      ),

      'delivery_general_info' => $this->delivery_general_info,

      'novaposhta_full_name' => $this->novaposhta_full_name,
      'novaposhta_location' => $this->novaposhta_location,

      'novaposhta_first_name' => $this->novaposhta_first_name,
      'novaposhta_middle_name' => $this->novaposhta_middle_name,
      'novaposhta_last_name' => $this->novaposhta_last_name,
      'novaposhta_phone_number' => $this->novaposhta_phone_number,
      'novaposhta_city_id' => $this->novaposhta_city_id,
      'novaposhta_warehouse_id' => $this->novaposhta_warehouse_id,

      'novaposhtaCity' => new NovaPoshtaCityResource($this->whenLoaded('novaPoshtaCity')),
      'novaposhtaWarehouse' => new NovaPoshtaWarehouseResource($this->whenLoaded('novaPoshtaWarehouse')),

      'total_amount' => $this->total_amount,
      'amount_cash_delivery' => $this->amount_cash_delivery,
      'amount_dropshipper_earnings' => $this->amount_dropshipper_earnings,

      'orderProducts' => OrderProductResource::collection($this->whenLoaded('orderProducts')),

      'invoice' => $this->invoice()->toArray(),
      'invoice_ttn' => $this->invoice()->getTTN(),
    ];
  }
}
