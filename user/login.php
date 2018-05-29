<?php
session_start();
require 'includes/loginValidate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>


    <link rel='stylesheet prefetch' href='vendor/bootstrap/css/bootstrap.min.css'>

    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>

<div class="wrapper">
    <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Please login</h2>
        <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus=""/>
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <label class="checkbox">
            <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div>


</body>

</html>
