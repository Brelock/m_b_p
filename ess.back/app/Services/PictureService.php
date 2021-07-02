<?php

namespace App\Services;

use App\Helpers\FileHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PictureService {

  /**
   * @var UploadedFile
   */
  private $uploadedFile;

  /**
   * PictureService constructor.
   * @param UploadedFile $uploadedFile
   */
  public function __construct(UploadedFile $uploadedFile) {
    $this->uploadedFile = $uploadedFile;
  }

  /**
   * @param string $folderPath
   * @return string
   * @throws \Exception
   */
  public function storeToFolder(string $folderPath): string {
    $newFileName = FileHelper::generateNewName($this->uploadedFile->clientExtension());
    if ($this->uploadedFile->storeAs("public/" . $folderPath, $newFileName))
      return $newFileName;

    throw new \Exception('Fail uploaded file.');
  }

  /**
   * @param string $originalFilePath
   * @param string $thumbnailFilePath
   *
   * @return bool
   */
  public function createThumbnail(string $originalFilePath, string $thumbnailFilePath): bool {
    $image = Image::make(storage_path("app/public/") . $originalFilePath);
    $image
      ->resize(env('THUMB_WIDTH'), env('THUMB_HEIGHT'))
      ->save(storage_path("app/public/") . $thumbnailFilePath);

    $image->destroy();
    return Storage::disk('public')->exists($thumbnailFilePath);
  }


}

