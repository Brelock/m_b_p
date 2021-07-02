<?php

namespace App\SMS;


class SendSms
{
    public static function post_request($source, $destination, $text)
    {
        $headers = array('Authorization: Basic ' . base64_encode(   config('sms.sms_login') . ":" . config('sms.sms_password')), 'Content-Type: text/xml');
        $params = array('http' =>
            array(
                'method' => 'POST',
                'header' => implode("\r\n", $headers),
                'content' => '<?xml version="1.0" encoding="UTF-8" ?><message><service id="single" source="' . $source . '"/><to>' . $destination . '</to><body content-type="text/plain">' . htmlspecialchars($text) . '</body></message>'
            ));

        $ctx = stream_context_create($params);
//        $fp = fopen('https://api.life.com.ua/ip2sms/', 'rb', FALSE, $ctx);
        $fp = fopen(config('sms.sms_url'), 'rb', FALSE, $ctx);
        if($fp)
        {
            $response = stream_get_contents($fp);
            return $response;
        }else
        {
            return FALSE;
        }
    }

}