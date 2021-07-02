<?php

namespace App\Mail;

use App\Models\Common\Calculator\CalcRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    /**
     * NewRequest constructor.
     * @param CalcRequest $request
     */
    public function __construct(CalcRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@lombard-capital.com.ua')
            ->replyTo($this->request->email)
            ->subject('Новая заявка по ювелирке')
            ->view('emails.request');
    }
}
