<?php

namespace App\Helpers;

/**
 * DateHelper provides additional date functionality that you can use in your application.
 *
 * @package App\Helpers
 */
class DateHelper extends \DateTime {
  /**
   * Check valid date to format 'Y-m-d'.
   *
   * @param string $date
   * @param string $format
   * @return bool
   */
  public static function validateDate($date, $format = 'Y-m-d') {
    $d = static::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
  }

  /**
   * Convert date to format.
   *
   * @param string $date
   * @param string $originalFormat for example 'Y-m-d'
   * @param string $makeFormat for example 'd/m/Y'
   * @return string results date in the format from $makeFormat
   */
  public static function toFormat($date, $originalFormat, $makeFormat) {
    $d = static::createFromFormat($originalFormat, $date);
    return $d ? $d->format($makeFormat) : $date;
  }

  /**
   * Value of date from request in the format 'd/m/Y' convert to format 'Y-m-d'.
   *
   * @param string|null $value
   * @param string $makeFormat
   * @param string|false $otherFormat
   * @return mixed
   */
  public static function dateValueToFormatDB($value, $makeFormat = 'Y-m-d', $otherFormat = false) {
    if(static::validateDate($value))
      return $value;

    if(static::validateDate($value, 'd/m/Y'))
      return static::toFormat($value, 'd/m/Y', $makeFormat);

    if(static::validateDate($value, 'd/m/y'))
      return static::toFormat($value, 'd/m/y', $makeFormat);

    if($otherFormat && static::validateDate($value, $otherFormat))
      return static::toFormat($value, $otherFormat, $makeFormat);

    return $value;
  }

  /**
   * Define day of week by date.
   *
   * @param $date
   * @return int
   * @throws \Exception
   */
  public static function getDayOfWeek($date) {
    $self = new self($date);
    return $self->dayOfWeek();
  }

  /**
   * Returns count days by remaining from date to now.
   *
   * @param $date
   * @return int
   * @throws \Exception
   */
  public static function getDaysRemaining($date) : int {
    $from = new self($date);
    $diff = $from->diff(new self())->format("%a");
    $days = intval($diff);

    return $days;
  }

  /**
   * @param \DateTime $checkDate
   * @param \DateTime $startDate
   * @param \DateTime $endDate
   * @return bool
   */
  public static function checkInRange(\DateTime $checkDate, \DateTime $startDate, \DateTime $endDate) : bool {
    return $checkDate >= $startDate && $checkDate <= $endDate;
  }

  /**
   * @param string $time
   * @param int $utcOffset
   * @param string $resultFormat
   * @return false|string
   */
  public static function transformWithTimezone(string $time, int $utcOffset, string $resultFormat = 'H:i') {
    return date_format(date_create(sprintf("%s %+d hours", $time, $utcOffset)),"H:i");
  }

  /**
   * @param string $time
   * @param int $utcOffset
   * @param string $resultFormat
   * @return string
   */
  public static function addWithTimezone(string $time, int $utcOffset, string $resultFormat = 'H:i') : string {
    return static::transformWithTimezone($time, $utcOffset, $resultFormat);
  }

  /**
   * @param string $time
   * @param int $utcOffset
   * @param string $resultFormat
   * @return string
   */
  public static function subWithTimezone(string $time, int $utcOffset, string $resultFormat = 'H:i') : string {
    return static::transformWithTimezone($time, ($utcOffset*(-1)), $resultFormat);
  }

  /**
   * @param int $timestamp
   * @return DateHelper
   * @throws \Exception
   */
  public static function createByTimestamp(int $timestamp) {
    $self = new self();
    return $self->setTimestamp($timestamp);
  }

  /**
   * @return DateHelper
   */
  public static function now() : self {
    return new self();
  }

  /**
   * @param int $utcOffset
   * @return DateHelper
   */
  public function addByOffset(int $utcOffset) {
    return $this->setTimestamp($this->getTimestamp()+($utcOffset*60*60));
  }

  /**
   * @param int $utcOffset
   * @return self
   */
  public function subtractByOffset(int $utcOffset) : self {
    return $this->setTimestamp($this->getTimestamp()-($utcOffset*60*60));
  }

  /**
   * @return DateHelper
   */
  public function toEndOfDay() {
    return $this->setTime(23, 0);
  }

  /**
   * @return int
   */
  public function dayOfWeek() : int {
    return (int)$this->format('N');
  }
}