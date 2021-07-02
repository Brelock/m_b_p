<?php

namespace App\NovaPoshta\Models\QueryBuilder;

use App\NovaPoshta\Models\QueryBuilder\InternetDocument\BaseOptions;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\Sender;

abstract class BaseCreateInternetDocumentQueryBuilder implements IQueryBuilder {
  /**
   * Обьект отправителя.
   *
   * @var Sender
   */
  protected $sender;

  /**
   * Стандартные параметры экспресс-накладной.
   *
   * @var BaseOptions
   */
  protected $options;

  /**
   * BaseCreateInternetDocument constructor.
   *
   * @param Sender $sender
   * @param BaseOptions $options
   */
  public function __construct(Sender $sender, BaseOptions $options) {
    $this->sender = $sender;
    $this->options = $options;
  }

  /**
   * @return BaseOptions
   */
  public function getOptions(): BaseOptions {
    return $this->options;
  }

  /**
   * @param BaseOptions $options
   * @return self
   */
  public function setOptions(BaseOptions $options): self {
    $this->options = $options;
    return $this;
  }

  /**
   * @return Sender
   */
  public function getSender(): Sender {
    return $this->sender;
  }

  /**
   * @param Sender $sender
   * @return self
   */
  public function setSender(Sender $sender): self {
    $this->sender = $sender;
    return $this;
  }

  /**
   * @return bool
   */
  public function hasAllForSendRequest(): bool {
    return true;
  }

  /**
   * @return array
   */
  public function queryParams(): array {
    return array_merge(
      $this->sender->queryParams(),

      $this->options->queryParams()
    );
  }
}