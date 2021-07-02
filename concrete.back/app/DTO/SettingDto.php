<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;

class SettingDto implements Arrayable {
  /**
   * @var string
   */
  protected $title;

  /**
   * @var string
   */
  protected $subtitle;

  /**
   * @var string
   */
  protected $email;

  /**
   * @var string
   */
  protected $footer;

	/**
	 * SettingDto constructor.
	 *
	 * @param string $title
	 * @param string $subtitle
	 * @param string $email
	 * @param string|null $footer
	 */
  public function __construct(string $title,
                              string $subtitle,
                              string $email,
                              string $footer = null) {
    $this->title = $title;
    $this->subtitle = $subtitle;
    $this->email = $email;
    $this->footer = $footer;
  }

  /**
   * @return string
   */
  public function getTitle(): string {
    return $this->title;
  }

	/**
	 * @return string
	 */
	public function getSubtitle(): string {
		return $this->subtitle;
	}

  /**
   * @return string
   */
  public function getEmail(): string {
    return $this->email;
  }

  /**
   * @return string
   */
  public function getFooter(): string {
    return $this->footer;
  }

  /**
   * @return array
   */
  public function toArray(): array {
    return [
      'title' => $this->title,
      'subtitle' => $this->subtitle,
      'email' => $this->email,
      'footer' => $this->footer,
    ];
  }

	/**
	 * @param array $attributes
	 * @return static
	 */
  public static function createFromArray(array $attributes): self {
    return new self(
      (string)ArrayHelper::getNotEmptyValue($attributes, 'title', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'subtitle'),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'email', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'footer', '')
    );
  }
}