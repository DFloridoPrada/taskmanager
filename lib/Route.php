<?php 
    namespace davidflorido\Lib;
    class Route {
        static $routes = [];
        // public function addRoute($route, callable $handle) {
        //     $this -> routes[$route] = $handle;
        // }
        static function get($route, callable $handle) {
            Self::$routes['GET'][$route] = $handle;
        }

        static function post($route, callable $handle) {
            Self::$routes['POST'][$route] = $handle;
        }

        static function handleRoute() {
            $uri = $_SERVER["REQUEST_URI"];
            $script_name = $_SERVER["SCRIPT_NAME"];

            $script_name = parse_url($script_name, PHP_URL_PATH);
            $base_route = str_replace('index.php', '', $script_name);
            $ruta = str_replace($base_route, '', $uri);
            
            $method = $_SERVER["REQUEST_METHOD"];


            // Inicializar la variable para verificar si se encuentra una ruta
            $routeFound = false;
            // Recorrer todas las rutas registradas para el método HTTP actual
            foreach (self::$routes[$method] as $route => $handler) {
                // Convertir la ruta con parámetros en un patrón de expresión regular
                $routePattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
                // Verificar si la ruta solicitada coincide con el patrón de la ruta registrada
                if (preg_match('#^' . $routePattern . '$#', $ruta, $matches)) {
                    array_shift($matches); // Eliminar la coincidencia completa
                    // Llamar al manejador de la ruta con los parámetros capturados
                    call_user_func_array($handler, $matches);
                    // Establecer que se ha encontrado una ruta y salir del bucle
                    $routeFound = true;
                    break;
                }
            }

            // // Comprobamos si la ruta introducida en la url es una de las configuradas en el array
            // if (array_key_exists($route, Self::$routes[$method])) {
            //     call_user_func(Self::$routes[$method][$route]);
            // }
            // else {
            //     require_once __DIR__ . "/../app/views/errors/404.php";   
            // }   
        }
    }
?>