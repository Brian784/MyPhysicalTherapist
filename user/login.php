<?php
if(isset($_POST['email']) && isset($_POST['password'])) {
    include "DatabaseConnectorClass.php";
    $DBconn = new DababaseConnector();
    $conn = $DBconn->getConnection();
    $stmt = $conn->prepare("SELECT Email, Password FROM `user_account` WHERE Email = ? AND Password= ?");
    $stmt->bind_param("ss", $_POST['email'],  $_POST['password']);
    $stmt->execute();
    //$sql="SELECT Email,Password FROM `user_account` WHERE Email= '$email' AND Password= '$password'";
    //$response = @mysqli_query($conn,$sql);
    //echo $response->num_rows;
echo $stmt->num_rows;
    if ($stmt->num_rows != 0) {
        header("Location: index.php");
        exit();
    } else {
        echo '<script>alert("User Not Found")</script>';
    }

}
?>

<!DOCTYPE html>
<html lang="en" >
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
      <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
  </div>
  
  

</body>

</html>
