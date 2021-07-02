<?php

namespace App\Services;

use App\DTO\SettingDto;
use App\Models\Setting;
use App\Services\Helpers\PromiseActionsTrait;

class SettingService {
  use PromiseActionsTrait;

  /**
   * @var Setting
   */
  private $setting;

	/**
	 * SettingService constructor.
	 *
	 * @param Setting $setting
	 */
  public function __construct(Setting $setting) {
    $this->setting = $setting;
  }

	/**
	 * @return Setting
	 */
  public function getSetting(): Setting {
    return $this->setting;
  }

	/**
	 * @param SettingDto $dto
	 * @return $this
	 */
  public function changeAttributes(SettingDto $dto): self {
    $this->setting->fill($dto->toArray());
    return $this;
  }

	/**
	 * @return $this
	 */
  public function commitChanges(): self {
    $this->setting->save();

    $this->releasePromiseActions();

    return $this;
  }
}