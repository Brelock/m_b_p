<?php

namespace App\Services;


use App\Collection\FactoryDto\SunportParamDtoCollection;
use App\Collection\FactoryDto\SunportParamPictureDtoCollection;
use App\DTO\Sunport\ParamDto;
use App\DTO\Sunport\ParamPictureDto;
use App\DTO\SunportDto;
use App\Helpers\FileHelper;
use App\Models\Sunport;
use App\Models\SunportParam;
use App\Models\SunportParamPicture;
use App\Services\Helpers\PromiseActionsTrait;
use App\Services\Sunport\ParamPictureService;
use Illuminate\Http\UploadedFile;

class SunportService {
  use PromiseActionsTrait;

  /**
   * @var Sunport
   */
  private $sunport;

  /**
   * SunportService constructor.
   *
   * @param Sunport $sunport
   */
  public function __construct(Sunport $sunport) {
    $this->sunport = $sunport;
  }

  /**
   * @return Sunport
   */
  public function getSunport(): Sunport {
    return $this->sunport;
  }

  /**
   * @param SunportDto $sunportDto
   * @return $this
   */
  public function changeAttributes(SunportDto $sunportDto): self {
    $this->sunport->fill($sunportDto->toArray());
    return $this;
  }

  /**
   * @param UploadedFile $file
   * @param bool $isPicture
   * @return $this
   */
  public function uploadNewFile(UploadedFile $file, bool $isPicture = false): self {
    $newFileName = FileHelper::generateNewName($file->clientExtension());
    if ($file->storeAs("public/" . $this->sunport->directoryStorage(), $newFileName)) {
      $this->resetFile($newFileName, $isPicture);
    }

    return $this;
  }

  /**
   * @param string $fileName
   * @param bool $isPicture
   * @return $this
   */
  public function resetFile(string $fileName, bool $isPicture): self {
    $oldFileName = $isPicture ? $this->sunport->picture_file_name : $this->sunport->xls_file_name;
    if ($oldFileName)
      $this->deleteXlsFile($oldFileName, $isPicture);

    if ($isPicture)
      $this->sunport->picture_file_name = $fileName;
    else
      $this->sunport->xls_file_name = $fileName;

    return $this;
  }

  /**
   * @param string $fileName
   * @param bool $isPicture
   * @return $this
   */
  public function deleteXlsFile(string $fileName, bool $isPicture): self {
    if ($this->sunport->deleteFile($fileName)) {
      if ($isPicture)
        $this->sunport->picture_file_name = null;
      else {
        $this->sunport->xls_file_name = null;
      }

    }

    return $this;
  }

  /**
   * @param SunportParamDtoCollection $params
   * @return $this
   * @throws \Exception
   */
  public function attachParams(SunportParamDtoCollection $params): self {
    $this->recordPromiseAction(function () use ($params) {

      /** update exists params */

      $existParams = $this->sunport->params->keyBy('id');
      $editedParams = $params->filterWhereWithID()->keyByID();
      $existParams->each(function ($param) use ($editedParams) {
        /* @var SunportParam $param */

        /* @var ParamDto $editedParam */
        $editedParam = $editedParams->get($param->id);
        if ($editedParam)
          $param->fill($editedParam->toArray())->save();
      });

      /** delete old params */

      $deletesParams = $existParams->diffKeys($editedParams->all());
      if ($deletesParams->isNotEmpty())
        SunportParam::query()->whereIn('id', $deletesParams->keys()->all())->delete();

      /** add new params */

      $newParams = $params->onlyNew();
      $newParams->each(function ($newParam) {
        /* @var ParamDto $newParam */
        $this->sunport->params()->save(new SunportParam($newParam->toArray()));
      });

    });
    return $this;
  }

  /**
   * @param  SunportParamPictureDtoCollection $pictureParams
   *
   * @return $this
   */
  public function attachPictureParams(SunportParamPictureDtoCollection $pictureParams) {
    $this->recordPromiseAction(function () use ($pictureParams) {
      $existPictureParams = $this->sunport->paramsPicture->keyBy('id');

      $editPictureParams = $pictureParams->filterWhereWithID()->keyByID();

      /** delete old params picture */

      $deletesPictureParams = $existPictureParams->diffKeys($editPictureParams->all());
      if ($deletesPictureParams->isNotEmpty()) {
        SunportParamPicture::query()
          ->whereIn('id', $deletesPictureParams->keys()->all())
          ->get()
          ->each(function($pp) {
            /* @var SunportParamPicture $pp */
            $pp->delete();
          });
      }

      $savePictureParam = function(SunportParamPicture $pictureParam, ParamPictureDto $dto) {
        $paramPictureService = new ParamPictureService($pictureParam);

        $paramPictureService->changeAttributes($dto)->attachSunport($this->sunport);

        if(!$paramPictureService->isNewParamPicture() && $paramPictureService->hasUploadedPicture() && $dto->hasUploadedFilePicture())
          $paramPictureService->deleteExistPicture();

        if ($dto->hasUploadedFilePicture())
          $paramPictureService->uploadFile($dto->getUploadedFilePicture());

        $paramPictureService->commitChanges();
      };

      $existPictureParams->each(function ($pictureParam) use ($editPictureParams, $savePictureParam) {
        /* @var SunportParamPicture $pictureParam */

        /* @var ParamPictureDto $dto */
        $dto = $editPictureParams->get($pictureParam->id);
        if ($dto)
          $savePictureParam($pictureParam, $dto);
      });

      /** add new params picture */

      $pictureParams->onlyNew()->each(function ($dto) use($savePictureParam) {
        /* @var ParamPictureDto $dto */
        $savePictureParam(new SunportParamPicture(), $dto);
      });

    });
    return $this;
  }

  /**
   * @return SunportService
   */
  public function commitChanges(): self {
    $this->sunport->save();

    $this->releasePromiseActions();

    return $this;
  }
}