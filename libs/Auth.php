<?php

class Auth
{
    // Asking is user logged in
    public static function isLoggedIn()
    {
        if (!isset($_SESSION["username"])) {
            return false;
        }
        return true;
    }

    // Task is simply to logout
    public static function logout()
    {
        unset($_SESSION["username"]);
        Redirect::to("login.php");
    }
}
