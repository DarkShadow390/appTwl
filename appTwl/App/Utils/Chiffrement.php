<?php
class Chiffrement{
    // Fonction pour chiffrer les données
function encryptData($data, $key, $iv) {
    $cipher = "AES-256-CBC";
    $encryptedData = openssl_encrypt($data, $cipher, $key, 0, $iv);
    return base64_encode($encryptedData);
}

// Fonction pour déchiffrer les données
function decryptData($encryptedData, $key, $iv) {
    $cipher = "AES-256-CBC";
    $decryptedData = openssl_decrypt(base64_decode($encryptedData), $cipher, $key, 0, $iv);
    return $decryptedData;
}

// Fonction pour générer une clé aléatoire
function generateRandomKey($length = 60) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+[]{}|;:,.<>?';
    $charactersLength = strlen($characters);
    $randomKey = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomKey .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $randomKey;
}

// Clé aléatoire de chiffrement
$key = generateRandomKey();

// Vecteur d'initialisation (IV) sécurisé
$iv = openssl_random_pseudo_bytes(16);

// Données à chiffrer
$dataToEncrypt = "123";

// Chiffrement des données
$encryptedData = encryptData($dataToEncrypt, $key, $iv);
echo "Données chiffrées : " . $encryptedData . "<br>";

// Déchiffrement des données
$decryptedData = decryptData($encryptedData, $key, $iv);
echo "Données déchiffrées : " . $decryptedData . "<br>";

// Affichage de la clé aléatoire de chiffrement
echo "Clé aléatoire de chiffrement : " . $key;

}

?>
