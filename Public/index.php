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
      <?php 
        if(isset($_SESSION["login_update"]))
        {
            if($_SESSION["login_update"]==1)
            {
                ?>
                <div class="alert alert-danger">
                    &#9888; Please Fill All The Required Fields
                </div>
                <?php
            }
            elseif($_SESSION["login_update"]==2)
            {
                ?>
                <div class="alert alert-danger">
                    &#9888; Incorrect Email/Password
                </div>
                <?php
            }
            else
            {
                ?>
                <div class="alert alert-danger">
                    &#9888; Oops! Something Went Wrong
                </div>
                <?php
            }
            unset($_SESSION["login_update"]);
        }
        ?>
        <form action="../handlers/login-handler.php" method="post">
            <div class="mb-4">
                <label class="form-label">Email address <span class="text-danger">*</span> </label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
            </div>
            <div class="mb-4">
                <!-- <label class="form-label d-flex justify-content-between">Password <span class="text-danger">*</span> </label> -->
                <label class="form-label">Password <span class="text-danger">*</span> </label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
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