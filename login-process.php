<?php
include "init.php";

if (!Input::has("username") || !Input::has("password")) {
    Flash::set("error", "Username/password is required!");
    Redirect::to("login.php");
}

$username = Input::get("username");
$password = Input::get("password");
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


// print_r($user);
// die();





    // echo $username . "<br>";
    // echo $password . "<br>";
    // die();