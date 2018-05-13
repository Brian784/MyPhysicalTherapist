<?php
session_start();
include_once "cookiesAndSessions.php";
include_once "EncryptClass.php";
include_once "DatabaseConnectorClass.php";
$cookieMaker = new CookiesTracking();
$sessionMaker = new SessionsTracking();
$DBconn = new DababaseConnector();
$encrtptor = new EncryptClass();
$EmaiCookielValue = $cookieMaker->getCookieValue('UserEmailCookie');
$PsdCookieValue = $cookieMaker->getCookieValue('UserPsdCookie');
if ($EmaiCookielValue != null && $PsdCookieValue != null) {
    $EmaiCookielValue = $encrtptor->crypt_function($EmaiCookielValue, 'd');
    $PsdCookieValue = $encrtptor->crypt_function($PsdCookieValue, 'd');
    $isValid = $DBconn->validateUser($EmaiCookielValue, $PsdCookieValue);
    if ($isValid) {
        header('Location: index.php');
    } else {
        $cookieMaker->deleteCookie('UserEmailCookie');
        $cookieMaker->deleteCookie('UserPsdCookie');
        echo '<script>alert("Invalid Cookies")</script>';

    }

} else {
    $emailSessionValue = $sessionMaker->getSession('UserEmailSession');
    $psdSessionValue = $sessionMaker->getSession('UserPsdSession');
    $psdSessionValue = $encrtptor->crypt_function($psdSessionValue, 'd');
    $emailSessionValue = $encrtptor->crypt_function($emailSessionValue, 'd');
    echo $psdSessionValue;
    echo $emailSessionValue;
    $isValid = $DBconn->validateUser($emailSessionValue, $psdSessionValue);
    if ($isValid) {
        header('Location: index.php');
    } else {
        $sessionMaker->deleteSession('UserEmailSession');
        $sessionMaker->deleteSession('UserPsdSession');
        echo '<script>alert("Invalid Session")</script>';
    }

}
//submit
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $isValid = $DBconn->validateUser($email, $password);
    if ($isValid) {
        $encryptedPsd = $encrtptor->crypt_function($password, 'e');
        $encryptedEmail = $encrtptor->crypt_function($email, 'e');
        $check_value = isset($_POST['rememberMe']) ? 1 : 0;
        if ($check_value == 1) {
            $cookieMaker->createCookie('UserEmailCookie', $encryptedEmail);
            $cookieMaker->createCookie('UserPsdCookie', $encryptedPsd);

        } else {
            $sessionMaker->createSession('UserEmailSession', $encryptedEmail);
            $sessionMaker->createSession('UserPsdSession', $encryptedPsd);
        }
        header('Location: index.php');
        exit();
    } else {
        header('Location: login.php');
        echo '<script>alert("User Not found")</script>';
    }

}
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
