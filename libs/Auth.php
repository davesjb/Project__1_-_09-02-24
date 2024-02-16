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
        if (!$user || !password_verify($password, $user["password"])) {
            Flash::set("error", "Username/Password is incorrect!");
            Redirect::to("login.php");
        }

        Session::set("username", $username);
        Redirect::to("dashboard.php");
    }

    public static function fetchProducts()
    {
        $database = new Database();
        $sql = "SELECT * FROM products";
    }

    // Task is simply to logout
    public static function logout()
    {
        // Session::delete("username");
        session_destroy();
        Redirect::to("/");
    }

    public static function register($username, $password)
    {
        $database = new Database();
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = [
            ":username" => $username
        ];
        $user = $database->fetch($sql, $params);
        if ($user) {
            Flash::set("error", "Username is not available");
            Redirect::to("register.php");
        }
        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            "username" => $username,
            "password" => $password
        ];

        $database->insert("users", $data);
        // die("user registered");
        Flash::set("success", "User Registered");
        Redirect::to("login.php");
    }
}
