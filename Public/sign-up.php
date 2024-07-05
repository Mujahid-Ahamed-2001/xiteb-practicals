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
        <form action="../handlers/login-handler.php">
            <div class="mb-4">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" placeholder="Enter your full name">
            </div>
            <div class="mb-4">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="Enter your email address">
            </div>
            <div class="mb-4">
                <label class="form-label">Address </label>
                <textarea name="" id="" class="form-control"></textarea>
            </div>            
            <div class="mb-4">
                <label class="form-label">Phone No</label>
                <input type="tel" class="form-control" placeholder="Enter your phone no">
            </div>
            <div class="mb-4">
                <label class="form-label d-flex justify-content-between">Password </label>
                <input type="password" class="form-control" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary btn-sign" name="sign-in">Sign In</button>
        </form>
      </div><!-- card-body -->
    </div><!-- card -->
  </body>
</html>