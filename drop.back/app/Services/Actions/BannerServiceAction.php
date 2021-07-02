<?php

namespace App\Services\Actions;

use App\DTO\BannerDto;
use App\Models\Banner;
use App\Services\BannerService;
use App\Services\Helpers\ReorderAction;

class BannerServiceAction {
	use ReorderAction;
  /**
   * @param BannerDto $bannerDto
   *
   * @return Banner
   */
  public function createBanner(BannerDto $bannerDto): Banner {
    return $this->saveBanner(new Banner(), $bannerDto);
  }

	/**
	 * @param Banner $banner
	 * @param BannerDto $bannerDto
	 *
	 * @return Banner
	 */
  public function updateBanner(Banner $banner, BannerDto $bannerDto): Banner {
    return $this->saveBanner($banner, $bannerDto);
  }

	/**
	 * @param Banner $banner
	 * @param BannerDto $bannerDto
	 *
	 * @return Banner
	 */
  protected function saveBanner(Banner $banner, BannerDto $bannerDto): Banner {
    $service = new BannerService($banner);

    if ($bannerDto->hasFile())
      $service->uploadNewFile($bannerDto->getFile());

    $service
      ->changeAttributes($bannerDto)
      ->commitChanges();

    return $service->getBanner();
  }

	/**
	 * @param Banner $banner
	 * @return bool|null
	 * @throws \Exception
	 */
  public function deleteBanner(Banner $banner) {
	  $service = new BannerService($banner);

	  $service->deleteBannerFile($banner->picture_file_name);
	  return $banner->delete();
  }
}