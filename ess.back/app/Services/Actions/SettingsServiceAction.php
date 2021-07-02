<?php

namespace App\Services\Actions;

use App\DTO\SettingsDto;
use App\Models\Settings;
use App\Services\SettingsService;

class SettingsServiceAction {
	/**
	 * @param SettingsDto $dto
	 * @return Settings
	 */
	public function createSettings(SettingsDto $dto): Settings {
		return $this->saveSettings(new Settings(), $dto);
	}

	/**
	 * @param Settings $settings
	 * @param SettingsDto $dto
	 * @return Settings
	 */
	public function updateSetting(Settings $settings, SettingsDto $dto): Settings {
		return $this->saveSettings($settings, $dto);
	}

	/**
	 * @param Settings $setting
	 * @param SettingsDto $dto
	 * @return Settings
	 */
	protected function saveSettings(Settings $settings, SettingsDto $dto): Settings {
		$service = new SettingsService($settings);

		$service
			->changeAttributes($dto)
			->commitChanges();

		return $service->getSettings();
	}
}