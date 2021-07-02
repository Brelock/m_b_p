<?php

namespace App\Models\Mixins;

trait PictureMixin {
	/**
	 * @return bool
	 */
	public function hasThumbImage(): bool {
		return !empty($this->picture_name);
	}

	/**
	 * @return string
	 */
	public function getOriginalImagePath(): string {
		return $this->assetAbsolute($this->picture_name);
	}

	/**
	 * @return string|null
	 */
	public function getThumbImagePath(): ?string {
		return $this->hasThumbImage()
			? $this->assetAbsolute($this->thumb_name)
			: null;
	}
}