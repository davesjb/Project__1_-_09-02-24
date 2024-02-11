<?php

class Session
{
    public static function set($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function has($name)
    {
        if (!isset($_SESSION[$name])) {
            return false;
        }
        return true;
    }
    //  If self we are using class method (self is for static method)
    public static function get($name)
    {
        if (!self::has($name)) {
            return "";
        }

        return $_SESSION[$name];
    }

    public static function delete($name)
    {
        if (!isset($_SESSION[$name])) {
            return true;
        }

        unset($name);
        return true;
    }
}
