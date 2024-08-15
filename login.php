<?php
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    header("Location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include("Headers.php"); ?>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="Auth.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small style="color:black; weight:bold;">email:andrewfirmansap@gmail | pass:123456</small><br>
                        <?php
                        if (isset($_SESSION['login_error'])) {
                            echo '<small style="color:red;">' . $_SESSION["login_error"] . '</small><br>';
                            unset($_SESSION['login_error']);
                        }
                        ?>
                        <small><a href="#">Forgot your password?</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>