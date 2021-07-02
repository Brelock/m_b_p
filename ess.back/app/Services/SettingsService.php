<?php

namespace App\Services;

use App\DTO\SettingsDto;
use App\Models\Settings;
use App\Services\Helpers\PromiseActionsTrait;

class SettingsService {
  use PromiseActionsTrait;

  /**
   * @var Setting
   */
  private $settings;

	/**
	 * SettingService constructor.
	 *
	 * @param Settings $settings
	 */
  public function __construct(Settings $settings) {
    $this->settings = $settings;
  }

	/**
	 * @return Settings
	 */
  public function getSettings(): Settings {
    return $this->settings;
  }

	/**
	 * @param SettingsDto $dto
	 * @return $this
	 */
  public function changeAttributes(SettingsDto $dto): self {
    $this->settings->fill($dto->toArray());
    return $this;
  }

	/**
	 * @return $this
	 */
  public function commitChanges(): self {
    $this->settings->save();

    $this->releasePromiseActions();

    return $this;
  }
}