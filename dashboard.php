<?php
include "init.php";
$database = new Database();
$table = "users";
$data = [
    "username" => "david",
    "password" => password_hash("p2", PASSWORD_DEFAULT),
];

// $params = [
//     "id" => 7
// ];

$params = [
    "id" => 10
];

$where = "id = :id";

// $result = $database->update($table, $data, $where, $params);
// print_r($result);

// $result = $database->delete($table, $where, $params);
// print_r($result);

$result = $database->fetchAll("SELECT * FROM users;");
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