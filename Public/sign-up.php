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
    

    <div class="card card-sign w-30">
      <div class="card-header">
        <a href="./" class="header-logo mb-4">Xiteb</a>
        <h3 class="card-title">Sign Up</h3>
      </div><!-- card-header -->
      <div class="card-body">
        <?php 
        if(isset($_SESSION["signup_update"]))
        {
            if($_SESSION["signup_update"]==0)
            {
                ?>
                <div class="alert alert-danger">
                    &#9888; Email Already Available
                </div>
                <?php
            }
            elseif($_SESSION["signup_update"]==1)
            {
                ?>
                <div class="alert alert-danger">
                    &#9888; Please Fill All The Required Fields
                </div>
                <?php
            }
            elseif($_SESSION["signup_update"]==2)
            {
                ?>
                <div class="alert alert-danger">
                    &#9888; Oops! Something Went Wrong
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
            unset($_SESSION["signup_update"]);
        }
        ?>
        <form action="../handlers/signup-handler.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" required>
                        <span class="text-danger" id="validate">&#9888;Email Already Available</span>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Address </label>
                <textarea name="address" id="" class="form-control" required></textarea>
            </div>    
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Phone No</label>
                        <input type="tel" name="phone" class="form-control" placeholder="Enter your phone no" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" name="dob" class="form-control" placeholder="Enter your date of birth" required>
                    </div>
                </div>
            </div>        
            
            <div class="mb-4">
                <label class="form-label d-flex justify-content-between">Password </label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sign" id="btn" name="sign-up">Sign In</button>
        </form>
      </div><!-- card-body -->
        <div class="card-footer">
        Have an account? <a href="../Public/">Sign In</a>
        </div><!-- card-footer -->
    </div><!-- card -->
  </body>
  <script src="../Assets/jquery/signup.js"></script>
</html>