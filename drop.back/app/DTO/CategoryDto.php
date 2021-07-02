<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;

class CategoryDto {
  /**
   * @var integer
   */
  public $parentId;

  /**
   * @var string
   */
  public $externalId;

  /**
   * @var string
   */
  public $externalParentId;

  /**
   * @var string
   */
  public $name;

  /**
   * CategoryDto constructor.
   *
   * @param integer $parentId
   * @param string $externalId
   * @param string $externalParentId
   * @param string $name
   */
  public function __construct(int $parentId,
                              string $externalId,
                              string $externalParentId,
                              string $name) {
    $this->parentId = $parentId;
    $this->externalId = $externalId;
    $this->externalParentId = $externalParentId;
    $this->name = $name;
  }

  /**
   * @return integer
   */
  public function getParentId() {
    return (int)$this->parentId;
  }

  /**
   * @return string
   */
  public function getExternalId(): string {
    return $this->externalId;
  }

  /**
   * @return string
   */
  public function getExternalParentId(): string {
    return $this->externalParentId;
  }

  /**
   * @return string
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * @return array
   */
  public function toArray(): array {
    return [
      'parent_id' => $this->parentId,
      'external_id' => $this->externalId,
      'external_parent_id' => $this->externalParentId,
      'name' => $this->name,
    ];
  }

  /**
   * @param array $attributes
   * @return CategoryDto
   */
  public static function createFromArray(array $attributes): self {
    return new self(
      (int)ArrayHelper::getNotEmptyValue($attributes, 'parent_id') ?: null,
      ArrayHelper::getNotEmptyValue($attributes, 'external_id', ''),
      ArrayHelper::getNotEmptyValue($attributes, 'external_parent_id', ''),
      ArrayHelper::getNotEmptyValue($attributes, 'name', '')
    );
  }
}
