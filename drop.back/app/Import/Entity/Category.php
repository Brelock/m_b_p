<?php

namespace App\Import\Entity;

use App\Import\Collection\CategoryCollection;
use Illuminate\Support\Arr;

class Category extends BaseEntity {
  /**
   * @var string
   */
  protected $id;

  /**
   * @var string
   */
  protected $parentId;

  /**
   * @var string
   */
  protected $name;

  /**
   * @var CategoryCollection
   */
  public $subCategories;

  /**
   * @var integer
   */
  public $displayOrder = 0;

  /**
   * Category constructor.
   *
   * @param string $id
   * @param string $name
   * @param string|null $parentId
   */
  public function __construct(string $id, string $name, ?string $parentId = null) {
    $this->id = $id;
    $this->name = $name;
    $this->parentId = $parentId;

    $this->subCategories = new CategoryCollection();
  }

  /**
   * @return string
   */
  public function getId(): string {
    return $this->id;
  }

  /**
   * @return string|null
   */
  public function getParentId(): ?string {
    return $this->parentId;
  }

  /**
   * @return bool
   */
  public function hasParentId(): bool {
    return !empty($this->parentId);
  }

  /**
   * @return string
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * @return CategoryCollection
   */
  public function getSubCategories(): CategoryCollection {
    return $this->subCategories;
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [
      'external_id' => $this->id,
      'external_parent_id' => $this->parentId,
      'name' => $this->name,
      'subCategories' => $this->subCategories->toArray(),
	    'display_order' => $this->displayOrder,
    ];
  }

  /**
   * @param array $attributes
   * @return BaseEntity
   */
  public static function mapFromArray(array $attributes): BaseEntity {
    return new self(
      (string)(Arr::get($attributes, 'id') ?: ''),
      (string)(Arr::get($attributes, 'name') ?: ''),
      (string)(Arr::get($attributes, 'parent_id' ?: ''))
    );
  }
}