<?php


namespace App\Notifications\channels;


use Illuminate\Notifications\Notification;

class smsChannel
{
    public function send($notifiable,Notification $notification)
    {
        $url = "https://ippanel.com/services.jspd";
        $data = $notification->toEramSms($notifiable);

        $rcpt_nm = $data['phone'];
        $param = array
        (
            'uname'=>'mehdi',
            'pass'=>'mehdiABC!!',
            'from'=>'3000505',
            'message'=>$data['text'],
            'to'=>json_encode($rcpt_nm),
            'op'=>'send'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];


        echo $res_data;
    }
}
