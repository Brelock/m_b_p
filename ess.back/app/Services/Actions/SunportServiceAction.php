<?php

namespace App\Services\Actions;


use App\DTO\SunportDto;
use App\Models\Sunport;
use App\Services\Helpers\ReorderAction;
use App\Services\SunportService;

class SunportServiceAction {
  use ReorderAction;

  /**
   * @param SunportDto $sunportDto
   * @return Sunport
   */
  public function createSunport(SunportDto $sunportDto): Sunport {
    return $this->saveSunport(new Sunport(), $sunportDto);
  }

  /**
   * @param Sunport $sunport
   * @param SunportDto $dto
   * @return Sunport
   */
  public function updateSunport(Sunport $sunport, SunportDto $dto): Sunport {
    return $this->saveSunport($sunport, $dto);
  }

  /**
   * @param Sunport $sunport
   * @param SunportDto $sunportDto
   * @return Sunport
   */
  public function saveSunport(Sunport $sunport, SunportDto $sunportDto): Sunport {
    $serviceItemService = new SunportService($sunport);
    if ($sunportDto->hasFileXls())
      $serviceItemService->uploadNewFile($sunportDto->getUploadedFileXls());

    if ($sunportDto->hasFilePicture())
      $serviceItemService->uploadNewFile($sunportDto->getUploadedFilePicture(), true);

    if ($sunportDto->hasDeleteXlsFile())
      $serviceItemService->deleteXlsFile(($serviceItemService->getSunport())->xls_file_name, false);

    if ($sunportDto->hasDeletePictureFile())
      $serviceItemService->deleteXlsFile(($serviceItemService->getSunport())->picture_file_name, true);

    $serviceItemService
      ->attachParams($sunportDto->getParams())
      ->attachPictureParams($sunportDto->getPictureParams());

    $serviceItemService
      ->changeAttributes($sunportDto)
      ->commitChanges();

    return $serviceItemService->getSunport();
  }

  /**
   * @param Sunport $sunport
   * @return $this
   * @throws \Exception
   */
  public function deleteSunport(Sunport $sunport){
    $serviceItemService = new SunportService($sunport);
    $serviceItemService
      ->deleteXlsFile();
    $sunport->delete();

    return $this;
  }
}