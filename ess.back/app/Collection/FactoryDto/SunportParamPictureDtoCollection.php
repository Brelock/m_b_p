<?php

namespace App\Collection\FactoryDto;


use App\DTO\Sunport\ParamPictureDto;

class SunportParamPictureDtoCollection extends BaseFactoryDtoCollection {
  /**
   * @return BaseFactoryDtoCollection
   */
  public function toDtoList(): BaseFactoryDtoCollection {
    if($this->hasItemsConsisting(ParamPictureDto::class))
      return $this;

    return $this->map(function($item) {
      return ParamPictureDto::createFromArray($item);
    });
  }

  /**
   * @return static
   */
  public function keyByID() {
    return $this->keyBy(function($dto) {
      /* @var ParamPictureDto $dto */
      return $dto->getId();
    });
  }

  /**
   * @return static
   */
  public function filterWhereWithID() {
    return $this->filter(function($dto) {
      /* @var ParamPictureDto $dto */
      return $dto->hasId();
    });
  }

  /**
   * @return static
   */
  public function onlyNew() {
    return $this->filter(function($dto) {
      /* @var ParamPictureDto $dto */
      return !$dto->hasId();
    });
  }
}
