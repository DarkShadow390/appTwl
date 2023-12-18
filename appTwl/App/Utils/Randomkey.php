<?php
namespace App\Utils;

use App\Model\Tasks;
use App\Utils\BddConnect;
// class RandomKey {
    
//     public static function generateRandomKey($test) {
//         try {
//             $ojectTasks = new Tasks();
//             // $id = $ojectTasks->setId($_GET['id_tasks']);
//             $id = $ojectTasks->setId($test);
    
//             $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//             $charactersLength = strlen($characters);
//             $randomKey = '';
    
//             for ($i = 0; $i < 60; $i++) {
//                 $randomKey .= $characters[random_int(0, $charactersLength - 1)];
//             }
//             $conn = new BddConnect();
//             $req = $conn->connexion()->prepare("UPDATE tasks SET keys_tasks = ? WHERE id_tasks = ?");
//             // $req = $conn->connexion()->prepare("INSERT INTO tasks(keys_tasks) VALUES(?) WHERE id_tasks = ?");
//             $req->bindParam(1, $randomKey, \PDO::PARAM_STR);
//             $req->bindParam(2, $id, \PDO::PARAM_INT);
//             $req->execute();
//             dump($randomKey,"test");
//             return $randomKey;
//         } catch (\Exception $e) {
//             die('Error : ' . $e->getMessage());
//         }
      
//     }
    
// }



class RandomKey {
    public static function generateRandomKey($length = 60) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*?';
        $charactersLength = strlen($characters);
        $randomKey = '';

        for ($i = 0; $i < $length; $i++) {
            if (function_exists('random_int')) {
                // PHP 7 ou version ultérieure, utilise random_int
                $randomKey .= $characters[random_int(0, $charactersLength - 1)];
            } else {
                // Version antérieure de PHP, utilise mt_rand
                $randomKey .= $characters[mt_rand(0, $charactersLength - 1)];
            }
        }

        return $randomKey;
    }
}

