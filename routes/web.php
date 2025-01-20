<?php 
    use davidflorido\Lib\Route; 

    Route::get('', function (){require_once "../app/views/loginView.php";});
    Route::get('home', function (){require_once "../app/views/homeView.php";});
    Route::post('contactos', function (){echo "<h1>contactos</h1>";});
    //Route::post('login', LoginController::class, 'index');

    Route::handleRoute();
?>