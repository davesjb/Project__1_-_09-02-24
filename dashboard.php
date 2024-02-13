<?php
include "init.php";
$database = new Database();
$table = "users";
$data = [
    "username" => "bahadur",
    "password" => password_hash("p1", PASSWORD_DEFAULT),
];
$where = "id = 7";

$result = $database->update($table, $data, $where);
print_r($result);


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