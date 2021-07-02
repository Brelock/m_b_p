<?php

namespace App\Mail;

use App\Models\Common\Callback;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCallbackRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $callback;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Callback $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@lombard-capital.com.ua')
            ->subject('Новая заявка на обратный звонок')
            ->view('emails.callback_request');
    }
}
