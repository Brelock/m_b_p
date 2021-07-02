<?php

namespace App\Services;

use App\Helpers\FileHelper;
use Illuminate\Http\UploadedFile;

class PictureService {
    /**
     * @var UploadedFile
     */
    private $uploadedFile;

    /**
     * PictureService constructor.
     * @param UploadedFile $uploadedFile
     */
    public function __construct(UploadedFile $uploadedFile)
    {
        $this->uploadedFile = $uploadedFile;
    }

	/**
	 * @param string $folderPath
	 * @return string
	 * @throws \Exception
	 */
    public function storeToFolder(string $folderPath) : string {
	    $newFileName = FileHelper::generateNewName($this->uploadedFile->clientExtension());
        if($this->uploadedFile->storeAs("public/".$folderPath, $newFileName))
            return $newFileName;

        throw new \Exception('Fail uploaded file.');
    }

}

