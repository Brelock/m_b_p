<?php

namespace App\Mail;

use App\Models\Common\Calculator\CalcGadgetRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewGadgetRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CalcGadgetRequest $request)
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
            ->replyTo(filter_var($this->request->email, FILTER_VALIDATE_EMAIL) ? $this->request->email : 'noreply@lombard-capital.com.ua')
            ->subject('Новая заявка по технике')
            ->view('emails.gadget_request');
    }
}
