<?php
    namespace App\Utils;
    class BddConnect{
        //fonction connexion BDD
        public function connexion(){
            include "./env.php";
            //retour de l'objet PDO
            return new \PDO('mysql:host='.$host.';dbname='.$database.'', $login, $password, 
            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
}}?>
