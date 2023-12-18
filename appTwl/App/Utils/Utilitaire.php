<?php
namespace App\Utils;
class Utilitaire{
    public static function cleanInput(?string $valeur):?string{
        return htmlspecialchars(strip_tags(trim($valeur)), ENT_QUOTES | ENT_HTML401);
    }
    public static function getFileExtension($file){
        return substr(strrchr($file,'.'),1);
    }
}