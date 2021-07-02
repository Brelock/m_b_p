<?php

namespace App\Jobs;

use App\SMS\SendSms;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendCalcGadgetRequestSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 2;

    protected $phone;
    protected $price;
    protected $model;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phone, $price, $model)
    {
        $this->phone = $phone;
        $this->price = $price;
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $phone = '+38'. preg_replace('/[^0-9]/', '', $this->phone);
//        $answer = SendSms::post_request('CAPITAL', $phone, 'мы дадим '. $this->price . ' грн за ваш девайс');
        $text = 'Оцінка від ломбарду Капітал - '.$this->model.' до '.$this->price.'грн. Швидкі кредити під заставу золота, техніки та срібла! Чекаємо на Вас '.route('departments');
        SendSms::post_request('CAPITAL', $phone, $text);
    }
}
