<?php

namespace App\Services;

use App\DTO\FileUnloadDto;
use App\Helpers\FileHelper;
use App\Models\FileUnload;
use Illuminate\Http\UploadedFile;

class FileUnloadService {

	/**
	 * @var FileUnload
	 */
	private $fileUnload;

	/**
	 * FileUnloadService constructor.
	 *
	 * @param FileUnload $fileUnload
	 */
	public function __construct(FileUnload $fileUnload) {
		$this->fileUnload = $fileUnload;
	}

	/**
	 * @return FileUnload
	 */
	public function getFileUnload(): FileUnload {
		return $this->fileUnload;
	}

	/**
	 * @param FileUnloadDto $xmlDto
	 * @return FileUnloadService
	 */
	public function changeAttributes(FileUnloadDto $xmlDto): self {
		$this->fileUnload->fill($xmlDto->toArray());
		return $this;
	}

	/**
	 * @param UploadedFile $file
	 * @param bool $isIcon
	 * @return FileUnloadService
	 */
	public function uploadNewFile(UploadedFile $file, bool $isIcon = false) : self {
	  $newFileName = FileHelper::generateNewName($file->clientExtension());
    if($file->storeAs("public/".$this->fileUnload->directoryStorage(), $newFileName))
	    $this->resetXlsFile($newFileName, $isIcon);

	  return $this;
  }

  /**
   * @param string $fileName
   * @param bool $isIcon
   * @return FileUnloadService
   */
	public function resetXlsFile(string $fileName, bool $isIcon) : self {
		$oldFileName = $isIcon ? $this->fileUnload->icon_name : $this->fileUnload->file_name;
		if($oldFileName)
	    $this->deleteXlsFile($oldFileName, $isIcon);

	  if($isIcon)
		  $this->fileUnload->icon_name = $fileName;
	  else
	    $this->fileUnload->file_name = $fileName;

	  return $this;
  }

  /**
   * @param string $fileName
   * @param bool $isIcon
   * @return FileUnloadService
   */
  public function deleteXlsFile(string $fileName, bool $isIcon) : self {
    if($this->fileUnload->deleteFile($fileName)) {
    	if($isIcon)
		    $this->fileUnload->icon_name = null;
    	else
    		$this->fileUnload->file_name = null;
    }

    return $this;
  }

	/**
	 * @return FileUnloadService
	 */
	public function commitChanges(): self {
		$this->fileUnload->save();
		return $this;
	}
}
