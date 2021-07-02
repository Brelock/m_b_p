<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sms configurations
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    'sms_login' => env('SMS_LOGIN'),
    'sms_password' => env('SMS_PASSWORD'),
    'sms_url' => env('SMS_URL', 'https://api.life.com.ua/ip2sms/'),

];