<?php
namespace App\Model;
use App\Utils\BddConnect;

class Users extends BddConnect{
    //attributs
    private ?int $id_users;
    private ?string $name_users;
    private ?string $firstname_users;
    private ?string $email_users;
    private ?string $password_users;
    private ?string $image_users;
    private bool $statut_users;

    //Getters et Setters
    public function getId():?int{
        return $this->id_users;
    }
    public function setId(?int $id){
        $this->id_users = $id;
    }
    public function getNom():?string{
        return $this->name_users;
    }
    public function setNom(?string $nom){
        $this->name_users = $nom;
    }
    public function getPrenom():?string{
        return $this->firstname_users;
    }
    public function setPrenom(?string $prenom){
        $this->firstname_users = $prenom;
    }
    public function getMail():?string{
        return $this->email_users;
    }
    public function setMail(?string $mail){
        $this->email_users = $mail;
    }
    public function getPassword():?string{
        return $this->password_users;
    }
    public function setPassword(?string $password){
        $this->password_users = $password;
    }
    public function getImage():?string{
        return $this->image_users;
    }
    public function setImage(?string $image){
        $this->image_users = $image;
    }
    public function getStatut():?bool{
        return $this->statut_users;
    }
    public function setStatut(?bool $statut){
        $this->statut_users = $statut;
    }

    //Méthodes
    public function addUser(){
        try {
            //récupérer les données de l'objet
            $nom = $this->name_users;
            $prenom = $this->firstname_users;
            $mail = $this->email_users;
            $password = $this->password_users;
            $image = $this->image_users;
            $statut = $this->statut_users;
            $req = $this->connexion()->prepare(
                "INSERT INTO users(name_users, firstname_users, 
                email_users, password_users, image_users, statut_users) VALUES(?,?,?,?,?,?)");
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->bindParam(2, $prenom, \PDO::PARAM_STR);
            $req->bindParam(3, $mail, \PDO::PARAM_STR);
            $req->bindParam(4, $password, \PDO::PARAM_STR);
            $req->bindParam(5, $image, \PDO::PARAM_STR);
            $req->bindParam(6, $statut, \PDO::PARAM_BOOL);
            $req->execute();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findOneBy(){
        try {
            //récupérer les données de l'objet
            $mail = $this->email_users;
            $req = $this->connexion()->prepare(
                "SELECT id_users, name_users, firstname_users, 
                email_users, password_users, statut_users, image_users 
                FROM users WHERE email_users = ?");
            $req->bindParam(1, $mail, \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Users::class);
            $req->execute();
            return $req->fetch();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findAll(){
        try {
            $id = $this->getId();
            $req = $this->connexion()->prepare(
                "SELECT id_users, name_users, firstname_users, 
                email_users, image_users FROM users WHERE id_users != ?");
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Users::class);
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function updateMail(){
        try {
            $mail = $this->email_users;
            $req = $this->connexion()->prepare('UPDATE users SET 
            statut_users = true WHERE email_users = ?');
            $req->bindParam(1, $mail, \PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }

    
}
?> 