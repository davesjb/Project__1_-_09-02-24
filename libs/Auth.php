<?php

class Auth
{
    // Asking is user logged in
    public static function isLoggedIn()
    {
        if (!Session::has("username")) {
            return false;
        }
        return true;
    }

    public static function login($username, $password)
    {

        $database = new Database();
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = [
            ":username" => $username
        ];

        $user = $database->fetch($sql, $params);
        if (!$user || $user["password"] !== $password) {
            Flash::set("error", "Username/Password is incorrect!");
            Redirect::to("login.php");
        }

        Session::set("username", $username);
        Redirect::to("dashboard.php");
    }

    // Task is simply to logout
    public static function logout()
    {
        Session::delete("username");
        Redirect::to("login.php");
    }
}
