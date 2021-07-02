<?php

namespace App\Services\Actions;

use App\DTO\SettingDto;
use App\Models\Setting;
use App\Services\SettingService;

class SettingServiceAction {
	/**
	 * @param SettingDto $dto
	 * @return Setting
	 */
	public function createSetting(SettingDto $dto): Setting {
		return $this->saveSetting(new Setting(), $dto);
	}

	/**
	 * @param Setting $setting
	 * @param SettingDto $dto
	 * @return Setting
	 */
	public function updateSetting(Setting $setting, SettingDto $dto): Setting {
		return $this->saveSetting($setting, $dto);
	}

	/**
	 * @param Setting $setting
	 * @param SettingDto $dto
	 * @return Setting
	 */
	protected function saveSetting(Setting $setting, SettingDto $dto): Setting {
		$service = new SettingService($setting);

		$service
			->changeAttributes($dto)
			->commitChanges();

		return $service->getSetting();
	}
}