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
            $route = str_replace($base_route, '', $uri);
            
            $method = $_SERVER["REQUEST_METHOD"];
            // Comprobamos si la ruta introducida en la url es una de las configuradas en el array
            if (array_key_exists($route, Self::$routes[$method])) {
                call_user_func(Self::$routes[$method][$route]);
            }
            else {
                echo "Error: 404, la página no existe";
            }
        }
    }
?>