<?php
include "init.php";

if (!Input::has("username") || !Input::has("password")) {
    Flash::set("error", "Username/password is required!");
    Redirect::to("login.php");
}

$username = Input::get("username");
$password = Input::get("password");

Auth::login($username, $password);


// print_r($user);
// die();





    // echo $username . "<br>";
    // echo $password . "<br>";
    // die();