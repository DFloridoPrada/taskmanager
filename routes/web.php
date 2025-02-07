<<<<<<< HEAD
<?php 
    use davidflorido\Lib\Route; 

    Route::get('', function (){require_once "../app/views/loginView.php";});
    Route::get('home', function (){require_once "../app/views/homeView.php";});
    Route::post('contactos', function (){echo "<h1>contactos</h1>";});
    //Route::post('login', LoginController::class, 'index');
=======
<?php

    use davidflorido\App\controllers\HomeController;
    use davidflorido\App\controllers\LoginController;
    use davidflorido\App\controllers\TaskController;
    use davidflorido\Lib\Route; 
    define('BASE_URL','/~DAW2/php/proyecto_mvc/public/');

    // LOGIN
    Route::get('', [LoginController::class, 'index']);
    Route::post('', [LoginController::class, 'login']);
    Route::get('logout', [LoginController::class, 'logout']);
    // HOME
    Route::get('home', [HomeController::class, 'home']);
    Route::get('documentation', [HomeController::class, 'documentation']);

    // TASKS
    Route::get('tasks', [TaskController::class, 'tasksIndex']);
    Route::get('tasks/delete/{id}', [TaskController::class, 'removeTask']);
    Route::get('tasks/modify/{id}', [TaskController::class, 'modifyTask']);
    Route::post('tasks/create', [TaskController::class, 'createTask']);
    //Route::get('*', function () {require_once '../app/views/errors/404.php';});
>>>>>>> 048bd86c341ccc636111bb909ef6f561e0513188

    Route::handleRoute();
?>