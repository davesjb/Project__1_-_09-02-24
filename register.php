<?php
include "init.php";

if (Auth::isLoggedIn()) {
    Redirect::to("dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-4 mt-4">

                <div class="card">
                    <div class="card-body">
                        <h1>Register</h1>
                        <?php if (Flash::has("error")) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error: </strong><?php echo Flash::display("error"); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="register-process.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary">Register</button>
                            <br><br>
                            <a href="login.php">login</a>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col"></div>
        </div>
    </div>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>