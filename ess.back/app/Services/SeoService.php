<?php

namespace App\Services;

use App\DTO\SeoDto;
use App\Models\Seo;
use App\Services\Helpers\PromiseActionsTrait;

class SeoService {
	use PromiseActionsTrait;

	/**
	 * @var Seo
	 */
	private $seo;

	/**
	 * SeoService constructor.
	 *
	 * @param Seo $seo
	 */
	public function __construct(Seo $seo) {
		$this->seo = $seo;
	}

	/**
	 * @return Seo
	 */
	public function getSeo() {
		return $this->seo;
	}

	/**
	 * @param SeoDto $seoDto
	 * @return SeoService
	 */
	public function changeAttributes(SeoDto $seoDto): self {
		$this->seo->fill($seoDto->toArray());
		return $this;
	}

	/**
	 * @return SeoService
	 */
	public function commitChanges(): self {
		$this->seo->save();

		$this->releasePromiseActions();

		return $this;
	}

}