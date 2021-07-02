<?php

namespace App\Import\Entity\Offer;

use App\Helpers\ArrayHelper;
use App\Import\Entity\BaseEntity;
use App\Import\Helpers\ParseUrl;
use Illuminate\Support\Arr;

class Picture extends BaseEntity {
  /**
   * @var string
   */
  protected $url;

  /**
   * @var integer|null
   */
  protected $ordering;

  /**
   * @var ParseUrl
   */
  private $parserUrl;

	/**
	 * Picture constructor.
	 *
	 * @param string $url
	 * @param int|null $ordering
	 */
  public function __construct(string $url, ?int $ordering=null) {
    $this->url = $url;
    $this->ordering = $ordering;
  }

  /**
   * @return string
   */
  public function getUrl(): string {
    return $this->url;
  }

  /**
   * @return integer
   */
  public function getOrdering(): int {
    return $this->ordering;
  }

  /**
   * @return string
   */
  public function getUrlForDownload(): string {
    $baseUri = $this->getParserUrl()->buildBaseUriWithoutQuery();
    $queryParams = array_merge($this->getParserUrl()->getQuery(), ['export' => 'download']);

    $queryString = http_build_query($queryParams);

    return "{$baseUri}?{$queryString}";
  }

  /**
   * @param  string|null $default
   * @param  string|null $expression
   * @param  string|null $prefix_
   * @return string
   */
  public function getId(?string $default = null, ?string $expression = null, ?string $prefix_ = null) : string {
    $default = is_null($default) ? uniqid(time(), true) : $default;
    $expression = $expression ?: '';
    $prefix_ = $prefix_ ?: '';

    $id = (string)Arr::get($this->getParserUrl()->getQuery(), 'id', $default);

    return trim("{$prefix_}{$id}{$expression}");
  }

  /**
   * @return ParseUrl
   */
  public function getParserUrl() : ParseUrl {
    return $this->parserUrl ?: $this->parserUrl = new ParseUrl($this->url);
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [
    	'url' => $this->url,
	    'ordering' => $this->ordering
    ];
  }

  /**
   * @param array $attributes
   * @return BaseEntity
   */
  public static function mapFromArray(array $attributes): BaseEntity {
    return new self(
    	(string)Arr::get($attributes, 'url', ''),
	    (int)ArrayHelper::getNotEmptyValue($attributes, 'ordering') ?: null
    );
  }
}