<?php

namespace App\Models\Mixins;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

trait NewsMixin {
  /**
   * @param Builder $query
   * @param string $value
   * @return bool
   */
  protected function getFullTextSearchColumn($query, $value) {
    return 'title_uk';
  }

  /**
   * @return bool
   */
  public function isPublished(): bool {
    return $this->is_published == $this::IS_PUBLISHED;
  }

  /**
   * @return bool
   */
  public function isNew(): bool {
    return !$this->exists;
  }

  /**
   * @param string|null $param
   * @return Carbon
   */
  public function getFormattedDateAttribute(?string $param = null) {
    if ($param)
      return Carbon::parse($this->$param);
    return Carbon::parse($this->created_at);
  }

  /**
   * @return string|null
   */
  public function getBackgroundImagePath(): ?string {
    /* @var News|self $this */
    return $this->mainPicture
      ? $this->mainPicture->getOriginalImagePath()
      : null;
  }

  /**
   * @param string $line
   * @param int $symbolsCount
   * @param string $endLine
   *
   * @return string|null
   */
  public function getTransformText(string $line, int $symbolsCount = 600, string $endLine = ' ...'): ?string {
    if (!is_string($line)) return $line;

    $string = preg_replace("/<[^>]*>/", "", $line);
    $string = preg_replace("/&nbsp;/", " ", $string);
    $string = preg_replace("/[\r\n]+/", " ", $string);

    $length = mb_strlen($string);
    if ($length > $symbolsCount && preg_match("/^.{{$symbolsCount}}\S*\s/", $string, $match)) {
      $string = preg_replace("/(\.|\,)\s*?\S?$/", "", Arr::get($match, 0, $string));
      $string = "{$string}{$endLine}";
    }

    return $string;
  }

}