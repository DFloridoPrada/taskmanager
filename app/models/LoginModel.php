<?php 
    namespace davidflorido\App\models;  
    use davidflorido\Lib\Database;
    use davidflorido\Lib\Helper;

    /**
     * TODO: esta clase es la encargada de verificar los datos introducidos por el usuario
     * en la página del login e indicar si es un usuario válido o no.
     */
    class LoginModel {

        public function __construct() {

        }

        /**
         * Realiza la conexión con la base de datos y verifica
         * las credenciales introducidas.
         */
        public function verifyUser($userName, $password) {

            $query = 'SELECT * FROM usuarios WHERE usuario = ?';
            $param = [$userName];
            $types = 's';
            $db = new Database();

            // Obtener la fila correspondiente 
            $result = $db -> executeQuery($query, $param, $types);
            // Desconectar base de datos
            $db -> closeConn();
            
            if ($result) {
                $result = Helper::objectify($result);
                // echo '<pre>';
                // echo print_r($result);
                // echo '</pre>';
    
                for ($i = 0; $i < count($result); $i++) {
                    if (password_verify($password, $result[$i] -> password)) {
                        // Las credenciales son correctas
                        return true;
                    }
                }
            }

            // Las credenciales son incorrectas
            return false;
        }
    }
?>