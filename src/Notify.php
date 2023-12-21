<?php

namespace Vptrading\TelebirrLaravel;

class Notify
{
    public static function notify(string $notifyData)
    {

        $base64_data = base64_decode($notifyData);

        $decrypted = '';

        $splited_data = str_split($base64_data, 256);

        foreach ($splited_data as $data) {
            openssl_public_decrypt($data, $decrypted_data, config('telebirr.test_mode') ? config('telebirr.test_publicKey') : config('telebirr.publicKey'));
            $decrypted = $decrypted . $decrypted_data;
        }

        $dec = json_decode($decrypted, true);

        return $dec;
    }
}
