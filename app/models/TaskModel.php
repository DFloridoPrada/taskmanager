<?php 
    namespace davidflorido\App\models;

    use davidflorido\Lib\Database;
    use davidflorido\Lib\Helper;
    use davidflorido\Lib\SessionManager;

    class TaskModel {

        /**
         * Obtiene un array asociativo con todas las tareas 
         */
        function getAllTasks() {
            $query = 'SELECT * FROM tareas';
            $db = new Database();

            // Obtener la fila correspondiente 
            $result = $db -> executeQuery($query);
            // Desconectar base de datos
            $db -> closeConn();
            
            if ($result) {
                $result = Helper::objectify($result);
                return $result;
            }

            // Las credenciales son incorrectas
            return false;   
        }

        /**
         * Elimina de la tabla tareas la tarea que coincida con el id dado
         */
        function delete($id) {
            $query = 'DELETE FROM tareas WHERE id=?';
            $db = new Database();

            $result = $db -> updateQuery($query, [$id], 'i');

            $db -> closeConn();

            return $result;
        }

        /**
         * Crea una nueva tabla con los datos del formulario
         */
        function create($title, $description, $state, $completionDate) {
            $query = 'INSERT INTO tareas (titulo, descripcion, estado, fecha_fin, usuario) VALUES (?,?,?,?,?)';
            $db = new Database();
            // Obtener el nombre del usuario de la sesión
            $userName = SessionManager::getSessionVar('username');
            $param = [$title, $description, $state, $completionDate, $userName];
            $result = $db -> updateQuery($query, $param, 'sssss');
            $db -> closeConn();

            return $result;
        }

        /**
         * Modifica con los nuevos datos la tarea cuya id coincida con la 
         * del parámetro
         */
        function modify($id, $title, $description, $state, $completionDate) {
            //TODO
        }
    }
?>