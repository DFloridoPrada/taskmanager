<?php 
    namespace davidflorido\App\controllers;
    use davidflorido\App\models\LoginModel;
    use davidflorido\Lib\Helper;
    use davidflorido\Lib\SessionManager;

    /**
     * TODO: crear clase con dos métodos uno para simplemente imprimir el login y otro (para peticiones por post)
     * que haga uso del modelo del login para verificar al usuario.
     */
    class LoginController {
        /**
         * Llama a la vista del login
         */
        public static function index() {
            // Comprobar que exista sesión
            if (SessionManager::exist('username')) {
                // Si existe agregar la vista del home
                require_once "../app/views/homeView.php";
                exit();
            }
            else {
                // Si no hay sesión agregar la vista del login
                require_once "../app/views/loginView.php";
                exit();
            }
        }

        /**
         * Debe comprobar que se haya introducido datos correctamente
         * y llamar al modelo del login para que los valide
         */
        public static function login() {

            // Recuperar los datos del formulario
            $userName = isset($_POST['username']) && !empty($_POST['username']) ? Helper::test_input($_POST['username']) : '';
            $password = isset($_POST['password']) && !empty($_POST['password']) ? Helper::test_input($_POST['password']) : '';

            // echo "<pre>";
            // echo 'Username:' . $_POST['username'];
            // echo '<br>';
            // echo 'Password:' . $_POST['password'];
            // echo "</pre>";

            // Si no estan vacíos
            if ($userName && $password) {
                // Llamar al modelo y verificar que exista un usuario con dichas credenciales
                $model = new LoginModel();
                if ($model -> verifyUser($userName, $password)) {
                    // Crear variables de sesión y redirigir al home
                    SessionManager::addNewSessionVar('username', $userName);
                    header('location: home');
                    exit();
                }
                else {
                    // Crear variables de errores y redirigir al login 
                    header('location:'. BASE_URL);
                    exit();
                }
            }
            else {
                header('location:'. BASE_URL);
                exit();
            }
        }

        static public function logout() {
            // Cerrar la sesión y redirigir al login
            SessionManager::closeSession(); 
            header('location:'. BASE_URL);
            exit();
        }
    }
?>