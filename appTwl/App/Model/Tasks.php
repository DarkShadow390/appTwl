<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Categorie;
class Tasks extends BddConnect{
    //attributs
    private ?int $id_tasks;
    private ?string $title_tasks;
    private ?string $description_tasks;
    private ?string $deadline_tasks;
    private bool $statut_tasks;
    private ?string $keys_tasks;
    private categorie $categorie;


      //constructeur
    public function __construct(){
        $this->categorie = new Categorie();
    }

     //Getters et Setters
    public function getId():?int{
        return $this->id_tasks;
    }
    public function setId(?int $id){
        $this->id_tasks = $id;
    }
    public function getTitle():?string{
        return $this->title_tasks;
    }
    public function setTitle(?string $nom){
        $this->title_tasks = $nom;
    }
    public function getDescription():?string{
        return $this->description_tasks;
    }
    public function setDescription(?string $description){
        $this->description_tasks = $description;
    }
    public function getDeadline():?string{
        return $this->deadline_tasks;
    }
    public function setDeadline(?string $deadline){
        $this->deadline_tasks = $deadline;
    }
    public function getStatut():?bool{
        return $this->statut_tasks;
    }
    public function setStatut(?bool $statut){
        $this->statut_tasks = $statut;
    }
    public function getKeys():?string{
        return $this->keys_tasks;
    }
    public function setKeys(?string $keys){
        $this->keys_tasks = $keys;
    }
    public function getCategorie():?Categorie{
        return $this->categorie;
    }
    public function setCategorie(?Categorie $categorie){
        $this->categorie = $categorie;
    }

    //Méthode
    public function showTasks(){
        try {
            $req = $this->connexion()->prepare("SELECT id_tasks, title_tasks, description_tasks, deadline_tasks, statut_tasks FROM tasks");
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE);
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }

    public function addTasks(){
        try {
            $title = $this->getTitle();
            $description = $this->getDescription();
            $deadline = $this->getDeadline();
            $statut = $this->getStatut();
            $req = $this->connexion()->prepare("INSERT INTO tasks(title_tasks, description_tasks, deadline_tasks, statut_tasks) VALUES(?,?,?,?)");
            $req->bindParam(1, $title, \PDO::PARAM_STR);
            $req->bindParam(2, $description, \PDO::PARAM_STR);
            $req->bindParam(3, $deadline, \PDO::PARAM_STR);
            $req->bindParam(4, $statut,  \PDO::PARAM_BOOL);
            $req->execute();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }

    public function editTasks(){
        try {
            $title = $this->getTitle();
            $description = $this->getDescription();
            $deadline = $this->getDeadline();
            $id = $this->getId();
            $req = $this->connexion()->prepare("UPDATE tasks SET title_tasks = ?, description_tasks = ?, deadline_tasks = ? WHERE id_tasks = ?");
            $req->bindParam(1, $title, \PDO::PARAM_STR);
            $req->bindParam(2, $description, \PDO::PARAM_STR);
            $req->bindParam(3, $deadline, \PDO::PARAM_STR);
            $req->bindParam(4, $id, \PDO::PARAM_INT);
            $req->execute();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
        
    }

    public function showEditTasks(){
        try {
            $id = $this->getId();
            $req = $this->connexion()->prepare("SELECT title_tasks, description_tasks, deadline_tasks FROM tasks WHERE id_tasks = ?");
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE);
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
        
    }
    public function removeTasks(){
        try {
            $id = $this->getId();
            $req = $this->connexion()->prepare("DELETE tasks WHERE id_tasks = ?");
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }

    }
    public function historyTasks(){

    }
    public function filterTasks(){

    }
    public function completedTasks(){
        try {
            $id = $this->getId();
            $req = $this->connexion()->prepare("UPDATE tasks SET statut_tasks = 1 WHERE id_tasks = ?");
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function expiredTasks(){

    }

    public function notificationTasks(){

    }
    public function searchTasks(){

    }

}
























?>