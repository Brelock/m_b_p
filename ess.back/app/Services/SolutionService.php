<?php

namespace App\Services;

use App\DTO\SolutionDto;
use App\Helpers\FileHelper;
use App\Models\Solution;
use App\Services\Helpers\PromiseActionsTrait;
use Illuminate\Http\UploadedFile;

class SolutionService {
	use PromiseActionsTrait;

	/**
	 * @var Solution
	 */
	private $solution;

	/**
	 * SolutionService constructor.
	 *
	 * @param Solution $solution
	 */
	public function __construct(Solution $solution) {
		$this->solution = $solution;
	}

	/**
	 * @return Solution
	 */
	public function getSolution() {
		return $this->solution;
	}

	/**
	 * @param SolutionDto $solutionDto
	 * @return $this
	 */
	public function changeAttributes(SolutionDto $solutionDto): self {
		$this->solution->fill($solutionDto->toArray());
		return $this;
	}

  /**
   * @param UploadedFile $file
   * @return SolutionService
   */
  public function uploadNewFile(UploadedFile $file): self {
    $newFileName = FileHelper::generateNewName($file->clientExtension());
    if ($file->storeAs("public/" . $this->solution->directoryStorage(), $newFileName))
      $this->resetFile($newFileName);

    return $this;
  }

  /**
   * @param string $fileName
   * @return SolutionService
   */
  public function resetFile(string $fileName): self {
    if ($this->solution->picture_file_name)
      $this->deletePicture();
    $this->solution->picture_file_name = $fileName;

    return $this;
  }

  /**
   * @return SolutionService
   */
  public function deletePicture(): self {
    if ($this->solution->deleteFile($this->solution->picture_file_name))
      $this->solution->picture_file_name = null;

    return $this;
  }

	/**
	 * @return SolutionService
	 */
	public function commitChanges(): self {
		$this->solution->save();

		$this->releasePromiseActions();

		return $this;
	}
}