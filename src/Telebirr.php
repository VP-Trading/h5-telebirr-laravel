<?php

namespace Vptrading\TelebirrLaravel;

use Exception;
use Illuminate\Support\Facades\Http;

class Telebirr
{
    public static function buy(string $subject, float $amount, string $returnUrl, int $shortCode)
    {
        $appId = config('telebirr.test_mode') ? config('telebirr.test_appId') : config('telebirr.appId');
        $notifyUrl = config('telebirr.test_mode') ? config('telebirr.test_notifyUrl') : config('telebirr.notifyUrl');
        $publicKey = config('telebirr.test_mode') ? config('telebirr.test_publicKey') : config('telebirr.publicKey');
        $appKey = config('telebirr.test_mode') ? config('telebirr.test_appKey') : config('telebirr.appKey');
        $url = config('telebirr.test_mode') ? config('telebirr.test_url') : config('telebirr.url');


        $telebirrRequest = [
            "appId" => $appId,
            "returnUrl" => $returnUrl,
            "subject" => $subject,
            "outTradeNo" => strval(bin2hex(random_bytes(8))),
            "timeoutExpress" => strval(config('telebirr.timeoutExpress')),
            "totalAmount" => strval($amount),
            "shortCode" =>  $shortCode,
            "timestamp" => strval(now()->timestamp),
            "nonce" => strval(bin2hex(random_bytes(8))),
            "receiveName" => strval(config('telebirr.receiveName')),
            "notifyUrl" =>  $notifyUrl,
        ];

        try {
            ksort($telebirrRequest);

            $json = json_encode($telebirrRequest);

            $json_array = str_split($json, 245);

            $encrypted = '';

            foreach ($json_array as $j) {
                openssl_public_encrypt($j, $data, $publicKey);
                $encrypted = $encrypted . $data;
            }

            $telebirrRequest["appKey"] =  $appKey;

            ksort($telebirrRequest);

            $string = '';

            foreach ($telebirrRequest as $key => $value) {
                if ($key == 'appId') {
                    $string = $string . $key . '=' . $value;
                } else {
                    $string = $string . '&' . $key . '=' . $value;
                }
            }

            $sign = hash("sha256", $string);

            $response = Http::withHeaders(["Content-Type" => "application/json"])->post($url . "/toTradeWebPay", [
                "appid" => $appId,
                "sign" => $sign,
                "ussd" => base64_encode($encrypted)
            ]);
        } catch (Exception $e) {

            throw $e;
        }

        return response()->json(['teleResponse' => $response->json(), 'outTradeNo' => $telebirrRequest['outTradeNo']]);
    }
}
