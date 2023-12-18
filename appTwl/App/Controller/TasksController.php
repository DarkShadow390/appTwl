<?php
namespace App\Controller;
use App\Model\Tasks;
use App\Utils\Messagerie;
use App\Utils\Utilitaire;
use App\Vue\Template;
use App\Model\Users;
use App\Utils\Encryption;
use App\Utils\RandomKey;

class TasksController extends Tasks {
    public function showTasks(){
        $tasks = Tasks::showTasks();
        $error = "";
        Template::render('navbar.php','footer.php', 'vueHome.php','Accueil TWL', 
        ['script.js'], ['style.css'],$error,$tasks);
    }

    public function editTasks(){
        $error = "";
        $ojectTasks = new Tasks();
        $ojectTasks->setId(Utilitaire::cleanInput( Encryption::decryptData($_GET['id_tasks'], $this->getKeys(), openssl_random_pseudo_bytes(16))));
        $tasks = $ojectTasks->showEditTasks();
        if (isset($_POST['submit'])) {
            if(!empty($_POST['title_tasks'])){
                $ojectTasks->setTitle(Utilitaire::cleanInput($_POST['title_tasks']));
                $ojectTasks->setDescription(Utilitaire::cleanInput($_POST['description_tasks']));
                $ojectTasks->setDeadline(Utilitaire::cleanInput($_POST['deadline_tasks']));
                $ojectTasks->setId(Utilitaire::cleanInput(Encryption::decryptData($_GET['id_tasks'], $_GET['keys_tasks'], openssl_random_pseudo_bytes(16))));
                $ojectTasks->editTasks();
                header("Location: ./");
            }else{
                $error ="veiller remplir les champ";
            }
        }
        Template::render('navbar.php','footer.php', 'vueEditTasks.php','Modifier Tâche', 
        ['script.js'], ['style.css'],$error,$tasks);
    }
    public function notificationTasks(){
        $ojectTasks = new Tasks();
        $ojectUsers = new Users();
        $tasks = Tasks::showTasks();
        foreach($tasks as $tk){
            dump($tk);
        }
      
    
        dump($_SESSION['mail']);
     
       
        die();
        $ojectTasks->getTitle();
        $ojectTasks->getDescription();
        
        $ojectUsers->getMail();

        
        if( $ojectTasks->getDeadline() - "7 jour"){
            Messagerie::sendEmail($ojectUsers->getMail(),"rappel tâche (titre de la tâche)","(titre de la tâche) description de la tâche");
        }
        if( $ojectTasks->getDeadline() - "3 jour"){
            Messagerie::sendEmail( $ojectUsers->getMail(),"rappel tâche (titre de la tâche)","(titre de la tâche) description de la tâche");
        }
        if( $ojectTasks->getDeadline()){
            Messagerie::sendEmail( $ojectUsers->getMail(),"rappel tâche (titre de la tâche)","(titre de la tâche) description de la tâche");
        }
        
        $error = "";
        Template::render('navbar.php','footer.php', 'vueHome.php','Accueil TWL', 
        ['script.js'], ['style.css'],$error);
    }
}


?>