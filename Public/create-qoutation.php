<?php 
$usertype=1;
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
            <?php
            if(isset($_SESSION["upload_update"]))
            {
                if($_SESSION["upload_update"]==1)
                {
                ?>
                    <div class="alert alert-danger">
                        Please Fill All The Required Fields.
                    </div>
                <?php
                }
                elseif($_SESSION["upload_update"]==2)
                {
                ?>
                    <div class="alert alert-danger">
                        Oops, Something Went Wrong.
                    </div>
                <?php
                }
                elseif($_SESSION["upload_update"]==3)
                {
                ?>
                    <div class="alert alert-success">
                        Prescription Uploaded Successfully
                    </div>
                <?php
                }
                else
                {
                ?>
                    <div class="alert alert-danger">
                        Oops, Something Went Wrong.
                    </div>
                <?php
                }
                unset($_SESSION["upload_update"]);
            }
            ?>
            
            <div class="text-center">
                <h1>
                    Create Qoutation
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        <form action="../handlers/prescription-handler.php" method="post" enctype="multipart/form-data">
                            <div id="preview" class="mb-3"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../Assets/uploads/coding.jpg" alt="" class="img">
                                    <div class="row mt-3 mb-3">
                                        <div class="col-md-3"><img src="../Assets/uploads/coding.jpg" alt="" class="img2"></div>
                                        <div class="col-md-3"><img src="../Assets/uploads/coding.jpg" alt="" class="img2"></div>
                                        <div class="col-md-3"><img src="../Assets/uploads/coding.jpg" alt="" class="img2"></div>
                                        <div class="col-md-3"><img src="../Assets/uploads/coding.jpg" alt="" class="img2"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width:250px;">Drug</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form d-flex justify-content-end">
                                        <div class="form-group">
                                            <lable class="form-lable">Drug</lable>
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="upload_prescription">Submit</button>
                            
                        </form>
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