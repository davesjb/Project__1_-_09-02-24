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

</body>

</html>