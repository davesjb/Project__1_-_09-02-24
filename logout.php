<?php
include "init.php";
if (!Auth::isLoggedIn()) {
    Redirect::to("dashboard.php");
}
Auth::logout();

// Will will write a method 
