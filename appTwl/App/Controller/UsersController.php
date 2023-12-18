<?php
namespace App\Controller;
use App\Model\Users;
use App\Utils\Utilitaire;
use App\Vue\Template;
class UsersController extends Users {
    public function addUsers(){
        $error = "";
        //tester si le formulaire
        if(isset($_POST['submit'])){
            //test si les champs sont remplis
            if(!empty($_POST['name_users']) AND !empty($_POST['firstname_users']) 
            AND !empty($_POST['email_users']) AND !empty($_POST['password_users']) 
            AND !empty($_POST['repeat_password_users'])){
                //Test si les mots de passe correspondent
                if($_POST['password_users']==$_POST['repeat_password_users']){
                    //setter les valeurs à l'objet UtilisateurController
                    $this->setNom(Utilitaire::cleanInput($_POST['name_users']));
                    $this->setPrenom(Utilitaire::cleanInput($_POST['firstname_users']));
                    $this->setMail(Utilitaire::cleanInput($_POST['email_users']));
                    //tester si le compte existe
                    if(!$this->findOneBy()){
                        if($_FILES['image_users']['tmp_name'] != ""){
                            $ext = Utilitaire::getFileExtension($_FILES['image_users']['name']);
                            if($ext=='png' OR $ext =='PNG' OR $ext = 'jpg' OR $ext =='JPG'OR $ext =='jpeg' OR $ext == 'JPEG' OR $ext=='bmp' OR $ext=='BMP'){
                                $this->setImage($_FILES['image_users']['name']);
                                move_uploaded_file($_FILES['image_users']['tmp_name'], './Public/asset/images/'.$_FILES['image_users']['name']);
                            }
                            else{
                                $error = 'format incorrect';
                                $this->setImage('profilUser.png');
                            }
                        }
                        else{
                            $this->setImage('profilUser.png');
                        }
                        $this->setStatut(false);
                        //hashser le mot de passe
                        $this->setPassword(password_hash(Utilitaire::cleanInput($_POST['password_users']), PASSWORD_DEFAULT));
                        //créer les variables 
                        $destinataire =  $this->getMail();
                        $objet = 'Cliquez utiliser le site';
                        $contenu = '<p>clic en dessous pour accéder au site</p>
                        <a href="http://localhost/appTwl/useractivate?mail='.$this->getMail().'
                        ">activer le compte</a>';
                        //Ajouter le compte en BDD
                        $this->addUser();
                        // Messagerie::sendEmail($destinataire, $objet, $contenu);
                        $error = "Le compte a été ajouté en BDD";
                        header('Refresh:2; url=./');
                    }    
                    else{
                        $error = "Le compte existe déja";
                    }
                }else{
                    $error = "Les mots de passe ne correspondent pas";
                }
            }else{
                $error = "Veuillez renseigner tous les champs du formulaire";
            }
        }
        Template::render('navbar.php','footer.php','vueAddUser.php','Inscription', 
        ['script.js'],['style.css'],$error);
        
    }



    public function connexionUser(){ 
        $error ="";
        //tester si le formulaire est submit
        if(isset($_POST['submit'])){
            //tester si les champs sont remplis
            if(!empty($_POST['email_users']) AND !empty($_POST['password_users'])){
                //tester si le compte existe (findOneBy du model)
                $this->setMail(Utilitaire::cleanInput($_POST['email_users']));
                $user = $this->findOneBy();
            
                if($user){
                    //Test si le compte est activé
                    if($user->getStatut()){
                        //tester si le mot de passe correspond (password_verify)
                        if(password_verify(Utilitaire::cleanInput($_POST['password_users']), $user->getPassword())){
                        // if(Utilitaire::cleanInput($_POST['password_users']) === $user->getPassword()){
                            $error = "Connecté";
                            $_SESSION['connected'] = true;
                            $_SESSION['id'] = $user->getId();
                            $_SESSION['nom'] = $user->getNom();
                            $_SESSION['prenom'] = $user->getPrenom();
                            $_SESSION['mail'] = $user->getMail();
                            $_SESSION['image'] = $user->getImage();
                            header('Refresh:2; url=./');
                        }else {
                            $error = "Les informations de connexion ne sont pas valides";
                        }
                    }
                    //Test le compte n'est pas activé
                    else{
                        header('Refresh:2; url=./useractivate?mail='.$user->getMail().'');
                    }
                //test le compte n'existe pas
                }else{
                    $error = "Les informations de connexion ne sont pas valides";
                }
            //Test les champs sont vides
            }else{
                $error = "Veuillez renseigner tous les champs du formulaire";
            }
        }
        Template::render('navbar.php','footer.php','vueConnexionUser.php','Connexion', 
        ['script.js', 'main.js'], ['style.css', 'main.css'],$error);
    }

    public function deconnexionUser(){
        unset($_COOKIE['PHPSESSID']);
        session_destroy();
        header('Location: ./');
    }
}


?>