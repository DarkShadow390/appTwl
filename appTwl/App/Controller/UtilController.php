<?php
// utilitaire/controller.php
use App\Utils\Encryption;
use App\Utils\RandomKey;

class UtilController {
    public static function processRequest($dataToEncrypt) {
        $key = RandomKey::generateRandomKey(1);
        $iv = openssl_random_pseudo_bytes(16);
        // $dataToEncrypt = "123";

        $encryptedData = Encryption::encryptData($dataToEncrypt, $key, $iv);
        $decryptedData = Encryption::decryptData($encryptedData, $key, $iv);
        dump($decryptedData);

        // // Affichage de la clé aléatoire de chiffrement
        // echo "Clé aléatoire de chiffrement : " . $key . "<br>";

        // // Affichage des données chiffrées et déchiffrées
        // echo "Données chiffrées : " . $encryptedData . "<br>";
        // echo "Données déchiffrées : " . $decryptedData . "<br>";
    }
}
