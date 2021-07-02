<?php

namespace App\Collection\FactoryDto;


use App\DTO\Sunport\ParamDto;

class SunportParamDtoCollection extends BaseFactoryDtoCollection {
  /**
   * @return BaseFactoryDtoCollection
   */
  public function toDtoList(): BaseFactoryDtoCollection {
    if($this->hasItemsConsisting(ParamDto::class))
      return $this;

    return $this->map(function($item) {
      return ParamDto::createFromArray($item);
    });
  }

  /**
   * @return static
   */
  public function keyByID() {
    return $this->keyBy(function($dto) {
      /* @var ParamDto $dto */
      return $dto->getId();
    });
  }

  /**
   * @return static
   */
  public function filterWhereWithID() {
    return $this->filter(function($dto) {
      /* @var ParamDto $dto */
      return $dto->hasId();
    });
  }

  /**
   * @return static
   */
  public function onlyNew() {
    return $this->filter(function($dto) {
      /* @var ParamDto $dto */
      return !$dto->hasId();
    });
  }
}
