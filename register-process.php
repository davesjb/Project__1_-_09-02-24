<?php
include "init.php";

if (Auth::isLoggedIn()) {
    Redirect::to("dashboard.php");
}

if (!Input::has("username") || !Input::has("password")) {
    Flash::set("error", "username and password is required");
    Redirect::to("register.php");
}

$username = Input::get("username");
$password = Input::get("password");

Auth::register($username, $password);
