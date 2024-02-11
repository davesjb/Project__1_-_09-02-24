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

    public static function delete($name)
    {
        if (!isset($_SESSION[$name])) {
            return true;
        }

        unset($name);
        return true;
    }
}
