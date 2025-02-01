<?php 
    namespace davidflorido\App\controllers;

    use davidflorido\App\models\TaskModel;
use davidflorido\Lib\Helper;
use davidflorido\Lib\SessionManager;

    class TaskController {
        /**
         * Carga la página principal de las tareas
         */
        static function tasksIndex() {
             // Comprobar que exista sesión
             if (SessionManager::exist('username')) {

                // Usar el modelo para obtener las tareas de la base de datos
                $taskModel = new TaskModel();
                $tasks = $taskModel -> getAllTasks();   

                $htmlTasks = '';

                if ($tasks) {
                    // Recorrer el array y crear los elementos html
                    foreach ($tasks as $task) {
                        $newTask = "
                            <div class='
                                border-2
                                border-white
                                min-h-[10rem]
                                rounded
                                flex
                                flex-col
                                px-5
                                py-3
                                font-mono
                                xl:text-base
                                text-xs
                                text-white
                                shadow-xl
                                relative
                            '>
                                <!-- Título en la esquina superior izquierda -->
                                <h2 class='absolute top-3 left-3 font-bold mb-1'>{$task->titulo}</h2>
                                
                                <!-- Iconos de acción en la esquina superior derecha -->
                                <div class='absolute top-3 right-3 flex gap-3'>
                                 <!-- Icono para cambiar una tarea a completada -->
                                    <a href='tasks/check/{$task->id}'>
                                        <i class='
                                            fa-solid 
                                            fa-check
                                            text-2xl 
                                            text-white 
                                            cursor-pointer
                                            hover:text-orange-400
                                        '>    
                                        </i>
                                    </a>
                                 <!-- Icono para borrar una tarea -->
                                    <a href='tasks/delete/{$task->id}'>
                                        <i class='
                                            fa-solid 
                                            fa-rectangle-xmark 
                                            text-2xl 
                                            text-white 
                                            cursor-pointer
                                            hover:text-orange-400
                                        '>    
                                        </i>
                                    </a>
                                 <!-- Icono para modificar una tarea -->
                                    <a href='tasks/modify/{$task->id}'>
                                        <i class='
                                            fa-solid 
                                            fa-gear
                                            text-2xl 
                                            text-white 
                                            cursor-pointer
                                            hover:text-orange-400
                                        '>    
                                        </i>
                                    </a>
                                </div>
                                <!-- Descripción centrada -->
                                <p class='mt-10 mb-10'>{$task->descripcion}</p>
                                
                                <!-- Estado en la esquina inferior izquierda -->
                                <p class='absolute bottom-3 left-3 text-xs'>{$task->estado}</p>
                                
                                <!-- Fechas en la esquina inferior derecha -->
                                <div class='absolute bottom-3 right-3 text-xs'>
                                    <p>Creación: {$task->fecha_creacion}</p>
                                    <p>Fin: " . ($task->fecha_fin ? $task->fecha_fin : " No especificada") . "</p>
                                </div>
                            </div>
                        ";
                        $htmlTasks.=$newTask;
                    }
                }
            

                // Si existe agregar la vista del home
                require_once "../app/views/tasksView.php";
                exit();
            }
            else {
                // Si no hay sesión redirigir al login
                header('location:'. BASE_URL);
                exit();
            }
        }

        /**
         * Método que elimina de la base de dato la tarea que coincida con el id
         */
        static public function removeTask($id) {
            //echo $id;
            if (SessionManager::exist('username')) {
                // Usar el modelo para realizar un delete
                $taskModel = new TaskModel();
                $rows = $taskModel -> delete($id);

                if ($rows) {
                   // TODO 
                }
                else {
                    
                }

                header('location:'. BASE_URL . 'tasks');
                exit();
            }
            else {
                // Si no hay sesión redirigir al login
                header('location:'. BASE_URL);
                exit();
            }
        }

        /**
         * Crea una nueva tarea en la base de datos
         */
        static public function createTask() {
            //echo $id;
            if (SessionManager::exist('username')) {

                // Recuperar los datos del formulario
                $title = isset($_POST['title']) && !empty($_POST['title']) ? Helper::test_input($_POST['title']) : '';
                $description = isset($_POST['description']) && !empty($_POST['description']) ? nl2br(Helper::test_input($_POST['description'])) : '';
                $state = isset($_POST['state']) && !empty($_POST['state']) ? Helper::test_input($_POST['state']) : '';
                $completionDate = isset($_POST['completionDate']) && !empty($_POST['completionDate']) ? Helper::test_input($_POST['completionDate']) : '';


                // Usar el modelo para realizar un create
                $taskModel = new TaskModel();
                $result = $taskModel -> create($title, $description, $state, $completionDate);

                if ($result) {
                    // La operación se ha realizado con éxito
                    // TODO: mensajes
                }
                else {
                    // La operación no se ha podido realizar
                    // TODO: mensaje
                }

                // Volver a la página de las tareas
                header('location:'. BASE_URL . 'tasks');
                exit();
            }
            else {
                // Si no hay sesión redirigir al login
                header('location:'. BASE_URL);
                exit();
            }
        }

        /**
         * Modifica la tarea con la id indicada
         */
        static function modifyTask($id) {
            // TODO
        }
    }
?>