<?php

namespace App\Http\Controllers\Api\NovaPoshta;

use App\Criteria\Builder\NovaPoshta\WarehouseCriteriaBuilder;
use App\Http\Controllers\Controller;
use App\Http\Resources\NovaPoshta\NovaPoshtaWarehouseResource;
use App\Models\NovaPoshtaWarehouse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WarehouseController extends Controller {
  /**
   * @param WarehouseCriteriaBuilder $criteriaBuilder
   * @return AnonymousResourceCollection
   */
  public function index(WarehouseCriteriaBuilder $criteriaBuilder) {
    NovaPoshtaWarehouseResource::withoutWrapping();
    return NovaPoshtaWarehouseResource::collection(NovaPoshtaWarehouse::fetchAll($criteriaBuilder));
  }
}