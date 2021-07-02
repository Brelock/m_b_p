<?php

namespace App\Services;

use App\Import\Helpers\ParseUrl;
use App\Support\Guzzle\BaseHttpClient;
use Illuminate\Contracts\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;

class FileService {
  /**
   * @var Filesystem
   */
  private $disk;

  /**
   * FileService constructor.
   *
   * @param Filesystem $filesystem
   */
  public function __construct(Filesystem $filesystem) {
    $this->setDisk($filesystem);
  }

  /**
   * @param Filesystem $filesystem
   * @return FileService
   */
  public function setDisk(Filesystem $filesystem): self {
    $this->disk = $filesystem;
    return $this;
  }

  /**
   * @return Filesystem
   */
  public function getDisk(): Filesystem {
    return $this->disk;
  }

  /**
   * @param string $path
   * @return string
   */
  public function storagePath(string $path = '') : string {
    $startingPath = $this->disk->getDriver()->getAdapter()->getPathPrefix();
    return "{$startingPath}/{$path}";
  }

  /**
   * @param string $url
   * @param string $path
   * @param BaseHttpClient $httpClient
   *
   * @return bool
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function downloadFile(string $url, string $path, BaseHttpClient $httpClient): bool {
    $parserUrl = new ParseUrl($url);

    $response = $httpClient
      ->clearDomain()
      ->get($parserUrl->buildBaseUriWithoutQuery(), $parserUrl->getQuery());

    $content = $response->getRawBody();
    if(empty($content))
      return false;

    return $this->disk->put($path, $content);
  }

	/**
	 * @param  string $originalFilePath
	 * @param  string $thumbnailFilePath
	 * @param  int $width
	 * @param  int $height
   *
	 * @return bool
	 */
  public function createThumbnail(string $originalFilePath,  string $thumbnailFilePath, int $width = 300, int $height = 300) : bool {
	  $image = Image::make($this->storagePath($originalFilePath));

    $image
      ->resize($width, $height, function ($constraint) {
	      $constraint->aspectRatio();
	      $constraint->upsize();
      })
      ->save($this->storagePath($thumbnailFilePath));

    $image->destroy();

    return $this->disk->exists($thumbnailFilePath);
  }

  /**
   * @param string $path
   * @param array $pathContents
   *
   * @return bool
   */
  public function createZipArchiveWithFiles(string $path, array $pathContents): bool {
    $zip = new \ZipArchive();

    if ($zip->open($this->storagePath($path), \ZipArchive::CREATE) === true) {
      foreach ($pathContents as $filePath => $fileName) {
        $zip->addFile($this->storagePath($filePath), $fileName);
      }

      $zip->close();

      return true;
    }

    return false;
  }

  /**
   * @param string $archiveFolderName
   * @param int $freshTime
   * @return array
   */
  public function oldModifiedFiles(string $archiveFolderName, int $freshTime): array {
	  $files = collect($this->disk->files($archiveFolderName));

	  return $files
      ->filter(function($filePath) {
        return strpos(basename($filePath), ".") !== 0;
      })
      ->filter(function ($filePath) use ($freshTime) {
        return time() - filemtime($this->storagePath($filePath)) >= $freshTime;
      })
      ->values()
      ->all();
  }
}