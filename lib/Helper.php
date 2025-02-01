<?php
    namespace davidflorido\Lib;
    // Este archivo contiene funciones que no guardan relación directa con el proyecto
    // pero son herramientas útiles que seran incluidas en los ficheros frecuentemente.
    ///////////////////////////////////////////////////////////////////////////////////

    class Helper {
        /**
         * Devuelve la cadena sanitizada
         */
        static function test_input($string) {
            $string = trim($string);
            $string = stripslashes($string);
            $string = htmlspecialchars($string);
            return $string;
        }

        /**
         * Transforma un array asociativo de los que se optienen
         * en las consultas con la base de datos en un array plano de objetos
         */
        static function objectify($array) {
            return array_map(function ($row) {
                return (object) $row;
            }, $array);
        }
    }

?>