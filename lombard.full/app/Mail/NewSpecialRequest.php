<?php

namespace App\Mail;

use App\Models\Common\Calculator\CalcSpecialRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewSpecialRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CalcSpecialRequest $request)
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
            ->replyTo($this->request->email ?? 'noreply@lombard-capital.com.ua')
            ->subject('Новая заявка по спецпредложениям')
            ->view('emails.special_request');
    }
}
