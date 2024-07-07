<?php 
$usertype=1;
include '../views/authcheck.php';
include '../db/db.php';
include '../classes/drug-class.php';
include '../classes/prescription-class.php';
$drug=new drug();
$drugs=$drug->get_drug();
if(!isset($_GET["pres_id"]) || $_GET["pres_id"]==0 || $_GET["pres_id"]=="")
{
    header("location:../Public/dashboard.php");
}
$prescription_id=$_GET["pres_id"];
$prescription=new prescription();
$prescription=$prescription->documents($prescription_id,$feature=1);
$doc_row=mysqli_fetch_assoc($prescription);
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
                    Create Qoutation
                </h1>
                <?php 
                if(isset($_SESSION["qoute_update"]))
                {
                    if ($_SESSION["qoute_update"]==0) 
                    {
                        ?>
                        <div class="alert alert-danger">
                            Oops! Something Went Wrong, Please Try Again.
                        </div>
                        <?php
                    }
                    unset($_SESSION["qoute_update"]);
                }
                ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        <div id="preview" class="mb-3"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="../Assets/uploads/<?=$doc_row["source"]?>" alt="" class="img">
                                <div class="row mt-3 mb-3">
                                    <?php 
                                        $prescription=new prescription();                                        
                                        $prescription=$prescription->documents($prescription_id,$feature=0);
                                        while($doc_row=mysqli_fetch_assoc($prescription))
                                        {
                                            ?>
                                            <div class="col-md-3"><img src="../Assets/uploads/<?=$doc_row["source"]?>" alt="" class="img2"></div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="../handlers/qoutation-handler.php" method="post">
                                    <input type="hidden" name="prescription_id" value="<?=$prescription_id?>">
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
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td><b>Total</b><input type="hidden" name="" id="total" value="" readonly required></td>
                                                    <td id="totalval">0.00</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="form mb-3 mt-3">
                                        <table class="w-100">
                                            <tr>
                                                <td><lable class="form-lable">Drug</lable></td>
                                                <td>
                                                    <select name="" id="drug" class="form-control">
                                                        <option value="">Select</option>
                                                        <?php 
                                                        while ($row=mysqli_fetch_assoc($drugs)) 
                                                        {
                                                            ?>
                                                            <option value="<?=$row["DID"]?>"><?=$row["name"]?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <input type="hidden" name="" id="price" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><lable class="form-lable">Quantity</lable></td>
                                                <td><input type="number" name="" id="qty" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><a href="#" id="add" class="btn btn-primary">Add</a></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary" name="add_qoute">Send Qoutation</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../Assets/jquery/upload-prescription.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <?php 
    include '../views/foot.php';
    ?>
</body>
</html>