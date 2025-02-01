<?php 
    namespace davidflorido\App\controllers;
    use davidflorido\Lib\SessionManager;

    class HomeController {
        static function home() {
            // TODO: Verificar la sesión
            if (SessionManager::exist('username')) {
                require_once "../app/views/homeView.php";
            }
            else {
                header('location:'. BASE_URL);
                exit();
            }
        }

        static function documentation() {
            require_once "../app/views/documentationView.php";
        }
    }
?>