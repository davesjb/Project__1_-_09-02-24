<?php

if (Auth::isLoggedIn()) {
    Redirect::to("dashboard.php");
}

if (!Input::has("username") || !Input::has("password")) {
    Flash::set("error", "username and password is required");
    Redirect::to("register.php");
}

if()