<?php

namespace App\Services\Actions;

use App\DTO\SeoDto;
use App\Models\Seo;
use App\Services\SeoService;

class SeoServiceAction {
	/**
	 * @param SeoDto $dto
	 * @return Seo
	 */
	public function createSeo(SeoDto $dto): Seo {
		return $this->saveSeo(new Seo(), $dto);
	}

	/**
	 * @param Seo $seo
	 * @param SeoDto $dto
	 * @return Seo
	 */
	public function updateSeo(Seo $seo, SeoDto $dto): Seo {
		return $this->saveSeo($seo, $dto);
	}

	/**
	 * @param Seo $seo
	 * @param SeoDto $seoDto
	 * @return Seo
	 */
	protected function saveSeo(Seo $seo, SeoDto $seoDto): Seo {
		$serviceItemService = new SeoService($seo);

		$serviceItemService
			->changeAttributes($seoDto)
			->commitChanges();

		return $serviceItemService->getSeo();
	}



}