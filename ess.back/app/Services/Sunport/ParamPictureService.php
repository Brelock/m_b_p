<?php

namespace App\Services\Sunport;

use App\DTO\Sunport\ParamPictureDto;
use App\Helpers\FileHelper;
use App\Models\Sunport;
use App\Models\SunportParamPicture;
use App\Services\Helpers\PromiseActionsTrait;
use Illuminate\Http\UploadedFile;

class ParamPictureService {
  use PromiseActionsTrait;

  /**
   * @var SunportParamPicture
   */
  private $paramPicture;

  /**
   * ParamPictureService constructor.
   *
   * @param SunportParamPicture $paramPicture
   */
  public function __construct(SunportParamPicture $paramPicture) {
    $this->paramPicture = $paramPicture;
  }

  /**
   * @return SunportParamPicture
   */
  public function getParamPicture(): SunportParamPicture {
    return $this->paramPicture;
  }

  /**
   * @return bool
   */
  public function isNewParamPicture(): bool {
    return !$this->paramPicture->exists;
  }

  /**
   * @return bool
   */
  public function hasUploadedPicture(): bool {
    return !empty($this->paramPicture->picture_file_name);
  }

  /**
   * @param ParamPictureDto $dto
   *
   * @return $this
   */
  public function changeAttributes(ParamPictureDto $dto): self {
    $this->paramPicture->fill($dto->toArray());
    return $this;
  }

  /**
   * @param  Sunport $sunport
   *
   * @return $this
   */
  public function attachSunport(Sunport $sunport): self {
    $this->paramPicture->sunport()->associate($sunport);

    return $this;
  }

  /**
   * @return $this
   */
  public function deleteExistPicture(): self {
    $this->recordPromiseAction(function() {
      $this->paramPicture->deleteFile($this->paramPicture->picture_file_name);
    }, 'before');

    return $this;
  }

  /**
   * @param UploadedFile $file
   *
   * @return $this
   */
  public function uploadFile(UploadedFile $file): self {
    $this->recordPromiseAction(function() use($file) {
      $newFileName = FileHelper::generateNewName($file->clientExtension());

      $file->storeAs("public/" . $this->paramPicture->directoryStorage(), $newFileName);

      $this->paramPicture->picture_file_name = $newFileName;
    }, 'before');

    return $this;
  }

  /**
   * @return $this
   */
  public function commitChanges(): self {
    $this->releasePromiseActions('before');

    $this->paramPicture->save();

    return $this;
  }
}