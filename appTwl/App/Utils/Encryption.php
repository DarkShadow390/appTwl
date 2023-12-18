<?php
namespace App\Utils;
use App\Utils\RandomKey;
class Encryption {
    public static function encryptData($data, $key, $iv) {
        // if ($key === null) {
        //     $RandomKey = new RandomKey();
        //     $key = $RandomKey->generateRandomKey();
        // }
        $cipher = "AES-256-CBC";
        $encryptedData = openssl_encrypt($data, $cipher, $key, 0, $iv);
        return base64_encode($encryptedData);
    }

    public static function decryptData($encryptedData, $key, $iv) {
        $cipher = "AES-256-CBC";
        $decryptedData = openssl_decrypt(base64_decode($encryptedData), $cipher, $key, 0, $iv);
        return $decryptedData;
    }
}

