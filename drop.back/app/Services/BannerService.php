<?php

namespace App\Services;

use App\DTO\BannerDto;
use App\Helpers\FileHelper;
use App\Models\Banner;
use Illuminate\Http\UploadedFile;

class BannerService {

	/**
	 * @var Banner
	 */
	private $banner;

	/**
	 * BannerService constructor.
	 *
	 * @param Banner $banner
	 */
	public function __construct(Banner $banner) {
		$this->banner = $banner;
	}

	/**
	 * @return Banner
	 */
	public function getBanner(): Banner {
		return $this->banner;
	}

	/**
	 * @param BannerDto $bannerDto
	 * @return BannerService
	 */
	public function changeAttributes(BannerDto $bannerDto): self {
		$this->banner->fill($bannerDto->toArray());
		return $this;
	}

	/**
	 * @param UploadedFile $file
	 * @return BannerService
	 */
	public function uploadNewFile(UploadedFile $file) : self {
	  $newFileName = FileHelper::generateNewName($file->clientExtension());
    if($file->storeAs("public/".$this->banner->directoryStorage(), $newFileName))
	    $this->resetBannerFile($newFileName);

	  return $this;
  }

	/**
	 * @param string $fileName
	 * @return BannerService
	 */
	public function resetBannerFile(string $fileName) : self {
		$oldFileName = $this->banner->picture_file_name;
		if($oldFileName)
	    $this->deleteBannerFile($oldFileName);

	    $this->banner->picture_file_name = $fileName;

	  return $this;
  }

	/**
	 * @param string $fileName
	 * @return BannerService
	 */
  public function deleteBannerFile(string $fileName) : self {
    if($this->banner->deleteFile($fileName)) {
		    $this->banner->picture_file_name = null;
    }

    return $this;
  }

	/**
	 * @return BannerService
	 */
	public function commitChanges(): self {
		$this->banner->save();
		return $this;
	}
}
