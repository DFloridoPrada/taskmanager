<?php 
    namespace davidflorido\Lib;

    use Exception;

    class SessionManager {

        static private function startSessionIfNeeded() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start(); 
            }
        }

        static public function addNewSessionVar($key, $value) {
            if (!empty($key) && is_string($key)) {

                Self::startSessionIfNeeded();

                $_SESSION[$key] = $value;
            }
            else {
                throw new Exception('error: clave introducida no válida');
            }
        }

        static public function getSessionVar($key) {
            if (!empty($key) && is_string($key)) {

                Self::startSessionIfNeeded();

                return $_SESSION[$key];
            }
            else {
                throw new Exception('error: clave introducida no válida');
            }
        }

        static public function removeSessionVar($key) {
            if (!empty($key) && is_string($key)) {

                Self::startSessionIfNeeded();

                unset($key);
            }
            else {
                throw new Exception('error: clave introducida no válida');
            }
        }

        static public function exist($key) {
            if (!empty($key) && is_string($key)) {

                Self::startSessionIfNeeded();

                if (isset($_SESSION[$key])) {
                    
                    if (!empty($_SESSION[$key])) {
                        return true;
                    }
                    else {
                        unset($_SESSION[$key]);
                        return false;
                    }
                }
                else {
                    return false;
                }
            }
            else {
                throw new Exception('error: clave introducida no válida');
            }
        }

        static public function closeSession() {
            Self::startSessionIfNeeded();
            unset($_SESSION['username']);
            session_unset();
            session_destroy();
        }
    }
?>