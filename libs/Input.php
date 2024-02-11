<?php
    class Input {
        public static function has( $input ) {
            if ( !isset( $_POST[$input] ) || empty( $_POST[$input] ) ) {
                return false;
            }
            return true;
        }

        public static function get( $input ){
            if ( !isset( $_POST[ $input ]) || empty( $_POST[$input] ) ){
                return "";
            }
            return $_POST[ $input ];
        }
    }
?>