<?php
namespace App\Controller;
use App\Vue\Template;
class HomeController{
    public function getHome(){
        $error = "";
        Template::render('navbar.php','footer.php', 'vueHome.php','Accueil TWL', 
        ['script.js'], ['style.css'],$error);
    }
    public function get404(){
        $error = '';
        Template::render('navbar.php','footer.php', 'vueError.php','Accueil', 
        ['script.js'], ['style.css'],$error);
    }
}
?>
