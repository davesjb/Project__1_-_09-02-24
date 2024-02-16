<?php

class Input
{
    public static function has($input, $method = "post")
    {

        switch (strtolower($method)) {
            case "post":
                if (!isset($_POST[$input]) || empty($_POST[$input])) {
                    return false;
                }
                return true;
                break;
            case "get":
                if (!isset($_GET[$input]) || empty($_GET[$input])) {
                    return false;
                }
                return true;
                break;
        }
    }

    public static function get($input, $method = "post")
    {
        switch (strtolower($method)) {
            case "post":

                if (!self::has($input, $method)) {
                    return "";
                }
                return htmlentities(trim($_POST[$input]));
                break;
            case "get":

                if (!self::has($input, $method)) {
                    // die("here");
                    return "";
                }
                return htmlentities(trim($_GET[$input]));
                break;
        }
    }
}
