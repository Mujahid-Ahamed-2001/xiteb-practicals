<?php 
include '../views/authcheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include '../views/head.php';
    ?>
</head>
<body>
    <div class="wrapper">
        <?php 
        include '../views/sidebar.php';
        ?>
        <div class="main p-3">
            <div class="text-center">
                <h1>
                    Dashboard
                </h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3">
                        <p>Pending Prescriptions</p>    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <p>Accepted Qoutation</p>    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <p>Pending Qoutations</p>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include '../views/foot.php';
    ?>
</body>
</html>