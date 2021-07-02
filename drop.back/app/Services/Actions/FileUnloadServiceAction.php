<?php

namespace App\Services\Actions;

use App\DTO\FileUnloadDto;
use App\Models\FileUnload;
use App\Services\FileUnloadService;
use App\Services\Helpers\ReorderAction;

class FileUnloadServiceAction {
	use ReorderAction;
  /**
   * @param FileUnloadDto $fileUnloadDto
   *
   * @return FileUnload
   */
  public function createFileUnload(FileUnloadDto $fileUnloadDto): FileUnload {
    return $this->saveFileUnload(new FileUnload(), $fileUnloadDto);
  }

  /**
   * @param FileUnload $fileUnload
   * @param FileUnloadDto $fileUnloadDto
   *
   * @return FileUnload
   */
  public function updateFileUnload(FileUnload $fileUnload, FileUnloadDto $fileUnloadDto): FileUnload {
    return $this->saveFileUnload($fileUnload, $fileUnloadDto);
  }

  /**
   * @param  FileUnload $fileUnload
   * @param  FileUnloadDto $fileUnloadDto
   *
   * @return FileUnload
   */
  protected function saveFileUnload(FileUnload $fileUnload, FileUnloadDto $fileUnloadDto): FileUnload {
    $service = new FileUnloadService($fileUnload);

    if ($fileUnloadDto->hasFile())
      $service->uploadNewFile($fileUnloadDto->getUploadedFile());

    if ($fileUnloadDto->hasIcon())
      $service->uploadNewFile($fileUnloadDto->getUploadedIcon(), true);

	  if ($fileUnloadDto->hasDeleteIcon())
		  $service->deleteXlsFile(($service->getFileUnload()->icon_name), true);

    $service
      ->changeAttributes($fileUnloadDto)
      ->commitChanges();

    return $service->getFileUnload();
  }
}