<?php

namespace App\Mail;

use App\Models\Common\Evaluation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewSadEvaluate extends Mailable {
  use Queueable, SerializesModels;

  /**
   * @var Evaluation
   */
  protected $evaluation;

  /**
   * NewSadEvaluate constructor.
   *
   * @param Evaluation $evaluation
   */
  public function __construct(Evaluation $evaluation) {
    $this->evaluation = $evaluation;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build() {
    return $this->from(config('mail.from.address'))
      ->subject('Новый плохой отзыв для отделения'.' '.$this->evaluation->office->number)
      ->view('emails.sad_evaluation', ['evaluation' => $this->evaluation]);
  }
}
