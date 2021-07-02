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
    public $status;
    public $hallmark;
    public $tariff;
    public $category;

    /**
     * NewRequest constructor.
     * @param CalcRequest $request
     */
    public function __construct(CalcRequest $request, $status, $hallmark, $tariff, $category)
    {
        $this->request = $request;
        $this->status = $status;
        $this->hallmark = $hallmark;
        $this->tariff = $tariff;
        $this->category = $category;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@eurolombard.com.ua')
            ->subject('Новая заявка по ювелирке')
            ->view('emails.request');
    }
}
