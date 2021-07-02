<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Http\UploadedFile;

class FileUnloadDto {
	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string|null
	 */
	protected $fileUrl;

	/**
	 * @var string|null
	 */
	protected $description;

	/**
	 * @var string|null
	 */
	protected $dateUnloaded;

	/**
	 * @var integer
	 */
	protected $format;

	/**
	 * @var UploadedFile|null
	 */
	protected $uploadedFile;

	/**
	 * @var UploadedFile|null
	 */
	protected $uploadedIcon;

	/**
	 * @var string|null
	 */
	protected $iconTitle;

	/**
	 * @var int|null
	 */
	protected $quantity;

	/**
	 * @var integer|null
	 */
	protected $deleteIcon;

	/**
	 * FileUnloadDto constructor.
	 * @param string $title
	 * @param integer $format
	 * @param string|null $fileUrl
	 * @param string|null $description
	 * @param string|null $dateUnloaded
	 * @param UploadedFile|null $uploadedFile
	 * @param UploadedFile|null $uploadedIcon
	 * @param string|null $iconTitle
	 * @param int|null $quantity
	 * @param int|null $deleteIcon
	 */
	public function __construct(string $title,
	                            int $format,
	                            ?string $fileUrl = null,
	                            ?string $description = null,
	                            ?string $dateUnloaded = null,
	                            UploadedFile $uploadedFile = null,
	                            UploadedFile $uploadedIcon = null,
	                            ?string $iconTitle = null,
	                            ?int $quantity = null,
	                            int $deleteIcon = null) {
		$this->title = $title;
		$this->format = $format;
		$this->fileUrl = $fileUrl;
		$this->description = $description;
		$this->dateUnloaded = $dateUnloaded;
		$this->uploadedFile = $uploadedFile;
		$this->uploadedIcon = $uploadedIcon;
		$this->iconTitle = $iconTitle;
		$this->quantity = $quantity;
		$this->deleteIcon = $deleteIcon;
	}

	/**
	 * @return string|null
	 */
	public function getTitle(): ?string {
		return $this->title;
	}

	/**
	 * @return integer
	 */
	public function getFormat(): int {
		return $this->format;
	}

	/**
	 * @return string|null
	 */
	public function getFileUrl(): ?string {
		return $this->fileUrl;
	}

	/**
	 * @return string|null
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * @return string|null
	 */
	public function getDateUnloaded(): ?string {
		return $this->dateUnloaded;
	}

  /**
   * @return UploadedFile|null
   */
  public function getUploadedFile(): ?UploadedFile {
    return $this->uploadedFile;
  }

	/**
	 * @return bool
	 */
	public function hasFile(): bool {
		return !empty($this->uploadedFile);
	}

  /**
   * @return UploadedFile|null
   */
  public function getUploadedIcon(): ?UploadedFile {
    return $this->uploadedIcon;
  }

	/**
	 * @return bool
	 */
	public function hasIcon(): bool {
		return !empty($this->uploadedIcon);
	}

	/**
	 * @return string|null
	 */
	public function getIconTitle(): ?string {
		return $this->iconTitle;
	}

	/**
	 * @return int|null
	 */
	public function getQuantity(): ?int {
		return $this->quantity;
	}

	/**
	 * @return int|null
	 */
	public function getDeleteIcon(): ?int {
		return $this->deleteIcon;
	}

	/**
	 * @return bool
	 */
	public function hasDeleteIcon(): bool {
		return !empty($this->deleteIcon);
	}

	/**
	 * @return array
	 */
	public function toArray(): array {
		return [
			'title' => $this->title,
			'file_url' => $this->fileUrl,
			'description' => $this->description,
			'date_unloaded' => $this->dateUnloaded,
			'format' => $this->format,
			'icon_title' => $this->iconTitle,
			'quantity' => $this->quantity,
		];
	}

	/**
	 * @param array $attributes
	 * @return static
	 */
	public static function createFromArray(array $attributes): self {
		return new self(
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title', ''),
			ArrayHelper::getNotEmptyValue($attributes, 'format'),
			ArrayHelper::getNotEmptyValue($attributes, 'file_url'),
			ArrayHelper::getNotEmptyValue($attributes, 'description'),
			ArrayHelper::getNotEmptyValue($attributes, 'date_unloaded'),
			ArrayHelper::getNotEmptyValue($attributes, 'file', null),
			ArrayHelper::getNotEmptyValue($attributes, 'icon', null),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'icon_title', ''),
			(int)ArrayHelper::getNotEmptyValue($attributes, 'quantity')?: null,
			(int)ArrayHelper::getNotEmptyValue($attributes, 'deleteIcon', 0) ?: null
		);
	}

}