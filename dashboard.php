<?php
include "init.php";

if (!Auth::isLoggedIn()) {
    Redirect::to("login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome to Dashboard, <?php echo Session::get("username"); ?></h1>
    <a href="logout.php">Logout</a>
</body>

</html>