<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Http\UploadedFile;

class BannerDto {
	/**
	 * @var UploadedFile
	 */
	protected $file;

	/**
	 * @var string|null
	 */
	protected $url;

	/**
	 * BannerDto constructor.
	 *
	 * @param UploadedFile $file
	 * @param string|null $url
	 */
	public function __construct(UploadedFile $file,
	                            ?string $url = null) {
		$this->file = $file;
		$this->url = $url;
	}

	/**
	 * @return UploadedFile
	 */
	public function getFile(): UploadedFile {
		return $this->file;
	}

	/**
	 * @return bool
	 */
	public function hasFile(): bool {
		return !empty($this->file);
	}

	/**
	 * @return string|null
	 */
	public function getUrl(): ?string {
		return $this->url;
	}
	/**
	 * @return array
	 */
	public function toArray(): array {
		return [
			'url' => $this->url,
		];
	}

	/**
	 * @param array $attributes
	 * @return static
	 */
	public static function createFromArray(array $attributes): self {
		return new self(
			ArrayHelper::getNotEmptyValue($attributes, 'file'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'url', '')
		);
	}

}