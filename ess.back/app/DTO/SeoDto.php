<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;

class SeoDto implements Arrayable {
	/**
	 * @var string
	 */
	protected $redirectUri;

	/**
	 * @var string
	 */
	protected $titleUk;

	/**
	 * @var string
	 */
	protected $titleRu;

	/**
	 * @var string
	 */
	protected $descriptionUk;

	/**
	 * @var string
	 */
	protected $descriptionRu;

	/**
	 * SeoDto constructor.
	 *
	 * @param string $redirectUri
	 * @param string $titleUk
	 * @param string $descriptionUk
	 * @param string $titleRu
	 * @param string $descriptionRu
	 */
	public function __construct(string $redirectUri,
	                            string $titleUk,
	                            string $descriptionUk,
	                            string $titleRu = '',
	                            string $descriptionRu = '') {
		$this->redirectUri = $redirectUri;
		$this->titleUk = $titleUk;
		$this->descriptionUk = $descriptionUk;
		$this->titleRu = $titleRu;
		$this->descriptionRu = $descriptionRu;
	}

	/**
	 * @return string
	 */
	public function getRedirectUri() {
		return $this->redirectUri;
	}

	/**
	 * @return string
	 */
	public function getTitleUk() {
		return $this->titleUk;
	}

	/**
	 * @return string
	 */
	public function getDescriptionUk() {
		return $this->descriptionUk;
	}

	/**
	 * @return string
	 */
	public function getTitleRu() {
		return $this->titleRu;
	}

	/**
	 * @return string
	 */
	public function getDescriptionRu() {
		return $this->descriptionRu;
	}

	/**
	 * @return array
	 */
	public function toArray() : array {
		return [
			'redirect_uri' => $this->redirectUri,
			'title_uk' => $this->titleUk,
			'description_uk' => $this->descriptionUk,
			'title_ru' => $this->titleRu,
			'description_ru' => $this->descriptionRu,
		];
	}

	/**
	 * @param array $attributes
	 * @return SeoDto
	 */
	public static function createFromArray(array $attributes) : self {
		return new self(
			ArrayHelper::getNotEmptyValue($attributes, 'redirect_uri'),
			ArrayHelper::getNotEmptyValue($attributes, 'title_uk'),
			ArrayHelper::getNotEmptyValue($attributes, 'description_uk'),
			ArrayHelper::getNotEmptyValue($attributes, 'title_ru', ''),
			ArrayHelper::getNotEmptyValue($attributes, 'description_ru', '')
		);
	}
}