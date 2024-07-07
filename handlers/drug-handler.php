<?php
$usertype=1;
include '../db/db.php';
include '../views/authcheck.php';
include '../classes/drug-class.php';
$drug=new drug();
if(isset($_POST["drugid"]))
{
    $id=$_POST["drugid"];
    $drugs=$drug->get_drug($id=null);
    $row=mysqli_fetch_assoc($drugs);
    echo $row["price"];
}
else
{
    header("Location:../Public/dahsboard.php");
}
?>