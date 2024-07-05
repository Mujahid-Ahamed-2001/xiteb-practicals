<?php 
session_start();
if(isset($_SESSION["user_login"]))
{
  header("location:../Public/dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    require '../views/head.php';
    ?>
</head>
<body class="page-sign">

    <div class="card card-sign">
      <div class="card-header">
        <a href="./" class="header-logo mb-4">Xiteb</a>
        <h3 class="card-title">Sign In</h3>
        <p class="card-text">Welcome back! Please signin to continue.</p>
      </div><!-- card-header -->
      <div class="card-body">
        <form action="../handlers/login-handler.php">
            <div class="mb-4">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="Enter your email address">
            </div>
            <div class="mb-4">
                <label class="form-label d-flex justify-content-between">Password </label>
                <input type="password" class="form-control" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary btn-sign" name="sign-in">Sign In</button>
        </form>
      </div><!-- card-body -->
      <div class="card-footer">
        Don't have an account? <a href="sign-up.php">Create an Account</a>
      </div><!-- card-footer -->
    </div><!-- card -->

  </body>
</html>