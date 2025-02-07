<?php 
    namespace davidflorido\Lib;

    use Exception;
    use mysqli;

    /**
     * Clase encargada de realizar la conexión y desconexión con la base de datos 
     * y ejecutar las queries del CRUD.
     */
    class Database {

        private $db = 'tareas_app';
        private $username = 'tareas_app';
        private $userpass = '1234';
        private $servername = 'localhost';
        private $conn;

        public function __construct() {
            try {
                $this -> conn = new mysqli($this->servername, $this->username, $this->userpass, $this->db);
            }catch(Exception $e) {
                echo "Error: " . $e -> getMessage() . " || " . $this -> conn -> connect_error;        
            }
        }

        /**
         * Devuelve el objeto conexión.
         */
        public function getConn() {
            if(!empty($this -> conn)) {
                return $this -> conn;
            }
            else {
                return null;
            }
        }

        /**
         * Desconecta la app de la base de datos.
         */
        public function closeConn() {
            $this -> conn -> close();
        }

        /**
         * Ejecuta una sentencia indicada y devuelve los datos en un array asociativo.
         */
        public function executeQuery($query, $param = [], $types = '') {

            if($stmt = $this -> conn -> prepare($query)) {

                // Si se han introducido parámetros
                if (!empty($param)) {
                    $stmt -> bind_param($types, ...$param); 
                }

                $stmt -> execute();
                $result = $stmt -> get_result();
                $stmt -> close();
                return $result -> fetch_all(MYSQLI_ASSOC);

            }
            else {
                // Si la preparación falla, mostramos el error
                echo "Error al preparar la consulta: " . $this->conn->error;
                return -1;
            }
            
        }

        /**
         * Ejecuta la sentencia indicada y devuelve el número de filas afectadas.
         */
        public function updateQuery($query, $param = [], $types = '') {
            
            if($stmt = $this -> conn -> prepare($query)) {

                // Si se han introducido parámetros
                if (!empty($param)) {
                    $stmt -> bind_param($types, ...$param); 
                }

                $stmt -> execute();
                $result = $stmt -> affected_rows;
                $stmt -> close();
                return $result;

            }
            else {
                // Si la preparación falla, mostramos el error
                echo "Error al preparar la consulta: " . $this->conn->error;
                return -1;
            }
        }
    }
?>