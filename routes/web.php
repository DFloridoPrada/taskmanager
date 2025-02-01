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

    Route::handleRoute();
?>