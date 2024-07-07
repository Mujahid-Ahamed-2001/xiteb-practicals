<?php 
include '../views/authcheck.php';
include '../db/db.php';
include '../classes/notification-class.php';
$notification = new notification();
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
                    Notifications
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $noti=$notification->notification();
                                    while($row=mysqli_fetch_assoc($noti))
                                    {
                                        ?>
                                        <tr>
                                            <td><?=$row["notification"]?></td>
                                            <td><?=$row["date"]?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../Assets/jquery/upload-prescription.js"></script>
    <?php 
    include '../views/foot.php';
    ?>
</body>
</html>