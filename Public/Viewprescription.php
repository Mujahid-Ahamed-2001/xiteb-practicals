<?php 
$usertype=0;
include '../views/authcheck.php';
include '../db/db.php';
include '../classes/prescription-class.php';
include '../classes/qoutation-class.php';
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
                    View Qoutation
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        <form action="../handlers/prescription-handler.php" method="post" enctype="multipart/form-data">
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
                                    <div class="table-responsive mb-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width:250px;">Drug</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                                <?php 
                                                $qoutation= new qoutation();
                                                $qoute=$qoutation->get_qoute($prescription_id);
                                                while ($row=mysqli_fetch_assoc($qoute)) 
                                                {
                                                    $tr="<tr id='tr$row[drug_id]'>";
                                                    $tr.="<td>";
                                                    $tr.="<input type='hidden' name='drugid[]' value='$row[drug_id]'>";
                                                    $tr.="<input type='hidden' name='qty[]' value='$row[quantitys]'>";
                                                    $tr.="<input type='hidden' name='price[]' value='$row[prices]'>";
                                                    $tr.="<input type='hidden' name='drug[]' value='$row[drugs]'>";
                                                    $tr.="<input type='hidden' name='amount[]' id='amount' value='$row[amounts]'>";
                                                    $tr.="$row[drugs]</td>";
                                                    $tr.="<td>$row[prices] x $row[quantitys] </td>";
                                                    $tr.="<td>$row[amounts] </td>";
                                                    $tr.="</tr>";
                                                    echo $tr;
                                                }
                                                ?>
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
                                    <form action="../handlers/prescription-handler.php" method="post">
                                        <label for="" class="form-label">Accept/Reject Qoutation</label>
                                        <select name="status" id="" class="form-control" required>
                                            <option value="">Accept/Reject</option>
                                            <option value="1">Accept</option>
                                            <option value="2">Reject</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-2" name="accept_reject">Submit</button>
                                    </form>
                                </div>
                            </div>                            
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