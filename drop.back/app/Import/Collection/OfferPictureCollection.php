<?php

namespace App\Import\Collection;

use App\Import\Entity\Offer\Picture;
use App\Import\Entity\Offer\UploadedPicture;
use App\Services\FileService;
use App\Support\Guzzle\BaseHttpClient;
use Illuminate\Support\Collection;
use Symfony\Component\Process\Process;

class OfferPictureCollection extends Collection {
  /**
   * @param \Closure $getAttribute
   * @return OfferPictureCollection
   */
  protected function keyByPictureAttributes(\Closure $getAttribute): self {
    return $this->keyBy($getAttribute);
  }

  /**
   * @param \Closure $getAttribute
   * @return array
   */
  protected function pictureAttributes(\Closure $getAttribute): array {
    return $this
      ->keyByPictureAttributes($getAttribute)
      ->keys()
      ->all();
  }

  /**
   * @return OfferPictureCollection
   */
  public function keyByPictureIds(): self {
    return $this->keyByPictureAttributes(function ($picture) {
      /* @var Picture $picture */
      return $picture->getId();
    });
  }


  /**
   * @param string $extension
   * @return OfferPictureCollection
   */
  public function keyByPictureIdsWithExtension(string $extension = ".jpg"): self {
    return $this->keyByPictureAttributes(function ($picture) use ($extension) {
      /* @var Picture $picture */
      return $picture->getId(null, $extension);
    });
  }

  /**
   * @return OfferPictureCollection
   */
  public function keyByPictureUrls(): self {
    return $this->keyByPictureAttributes(function ($picture) {
      /* @var Picture $picture */
      return $picture->getUrl();
    });
  }

  /**
   * @return array
   */
  public function pictureIds(): array {
    return $this->keyByPictureIds()->keys()->all();
  }

  /**
   * @param string $extension
   * @return array
   */
  public function pictureIdsWithExtension(string $extension = ".jpg"): array {
    return $this->keyByPictureIdsWithExtension($extension)->keys()->all();
  }

  /**
   * @return array
   */
  public function pictureUrls(): array {
    return $this->keyByPictureUrls()->keys()->all();
  }

  /**
   * @return array
   */
  public function toArray(): array {
    return $this->pictureUrls();
  }

  /**
   * @param string $path
   * @return UploadedOfferPictureCollection
   */
  public function uploadToFolder(string $path): UploadedOfferPictureCollection {
    /* @var FileService $pictureService */
    $pictureService = app(FileService::class);

//    /* @var BaseHttpClient $httpClient */
//    $httpClient = app(BaseHttpClient::class);

    $uploadedPictures = $this
      ->map(function ($picture) use ($path, $pictureService) {
        /* @var Picture $picture */
        $newFileName = $picture->getId(null, ".jpg");
        $fileNameHash = $picture->getId();
        $newThumbnailFileName = $picture->getId($newFileName, ".jpg", "thumb_");

        $originalFilePath = "{$path}/{$newFileName}";
        $thumbnailFilePath = "{$path}/{$newThumbnailFileName}";
        $fullPath = $pictureService->getDisk()->getDriver()->getAdapter()->getPathPrefix().$path;
        try {

       ### Download picture through node script ###

          $command = ["/usr/bin/node", "index.js", $fullPath, $fileNameHash];
          $process = new Process($command);
          $process->setWorkingDirectory('/home/cityacom/gdrive');
          $process->run();
          if ($process->isSuccessful()) {
            if (strpos($process->getOutput(), 'done') !== false) {

              $uploadedPicture = new UploadedPicture($newFileName, null, $path);

              if ($pictureService->createThumbnail($originalFilePath, $thumbnailFilePath))
                $uploadedPicture->setThumbPictureName($newThumbnailFileName);

              return $uploadedPicture;
            }
          }

      ### Download picture through node script ###

      ###  Download picture ###

//          if($pictureService->downloadFile($picture->getUrlForDownload(), $originalFilePath, $httpClient)) {
//             $uploadedPicture = new UploadedPicture($newFileName, null, $path);
//
//             if($pictureService->createThumbnail($originalFilePath, $thumbnailFilePath))
//               $uploadedPicture->setThumbPictureName($newThumbnailFileName);
//
//             return $uploadedPicture;
//           }

      ###  Download picture ###

        } catch (\Exception $exception) {
          // var_dump($exception->getMessage()); die;
        }

        return null;
      })
      ->filter(function ($uploadedPicture) {
        return !empty($uploadedPicture);
      });

    return new UploadedOfferPictureCollection($uploadedPictures->all());
  }
}