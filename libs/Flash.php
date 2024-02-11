<?php
    class Flash {
        public static function set( $name, $value ) {
            $_SESSION[ $name ] = $value;
            if ( !isset( $_SESSION[ $name ] ) ) {
                return false;
            } 
            return true;
        }

        public static function has( $name ){
            if(isset($_SESSION[$name])) {
                return true;
            } else {
                return false;
            }
        }
        
        public static function display( $name ){
            if(isset($_SESSION[$name])){
                $flash = $_SESSION[$name];
                unset( $_SESSION[$name] );
                return $flash;
            }
            return "";  
        }
    }

