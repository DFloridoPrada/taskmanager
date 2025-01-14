<?php 
    use davidflorido\Lib\Route; 

    Route::get('', function (){echo "<h1>hola</h1>";});
    Route::get('sobremi', function (){echo "<h1>sobre mi</h1>";});
    Route::post('contactos', function (){echo "<h1>contactos</h1>";});
    //Route::post('login', LoginController::class, 'index');

    Route::handleRoute();
?>