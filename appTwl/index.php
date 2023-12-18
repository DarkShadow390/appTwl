<?php
    require_once './env.php';
    //import de l'autoloader des classes
    require_once './autoload.php';
    require_once './vendor/autoload.php';
    use App\Controller\HomeController;
    use App\Controller\UsersController;
    use App\Controller\TasksController;
    $homeController = new HomeController();
    $usersController = new UsersController();
    $tasksController = new TasksController();
    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //routeur
    if(isset($_SESSION['connected'])){
        switch ($path) {
            case '/appTwl/':
                $tasksController->showTasks();
                break;
            case '/appTwl/connexionUser':
                $usersController->deconnexionUser();
                break;
            case '/appTwl/addTasks':
                $tasksController->addTasks();
                break;
            case '/appTwl/editTasks':
                $tasksController->editTasks();
                break;
            case '/appTwl/removeTasks':
                $tasksController->removeTasks();
                break;
            case '/appTwl/historyTasks':
                $tasksController->historyTasks(); //à faire
                break;
            case '/appTwl/filterTasks':
                $tasksController->filterTasks(); //à faire
                break;
            case '/appTwl/completedTasks':
                $tasksController->completedTasks();
                break;
            case '/appTwl/expiredTasks':
                $tasksController->expiredTasks(); //à faire
                break;
            case '/appTwl/notificationTasks':
                $tasksController->notificationTasks(); //à faire
                break;
            case '/appTwl/searchTasks':
                $tasksController->searchTasks(); //à faire
                break;
            default:
                $homeController->get404();
                break;
        }
    }else{
        switch ($path){
            case '/appTwl/':
                $tasksController->showTasks();
                break;
            case '/appTwl/connexionUser':
                $usersController->connexionUser(); //à faire
                break;
            case '/appTwl/addUser':
                $usersController->addUsers();
                break;
            case '/appTwl/editTasks':
                $tasksController->editTasks();
                break;
            default:
                $homeController->get404();
            break;
        }
    }
?>
