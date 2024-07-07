<?php
$usertype=1;
include '../db/db.php';
include '../views/authcheck.php';
include '../classes/drug-class.php';
$drug=new drug();
if(isset($_POST["drugid"]))
{
    $id=$_POST["drugid"];
    $drugs=$drug->get_drug($id);
    $row=mysqli_fetch_assoc($drugs);
    echo $row["price"];
}
elseif (isset($_POST["drug"])) 
{
    $id=$_POST["drug"];
    $qty=$_POST["qty"];
    $drugs=$drug->get_drug($id);
    $row=mysqli_fetch_assoc($drugs);
    $price=$row["price"];
    $amount=$qty*$price;
    $tr="<tr id='tr$row[DID]'>";
    $tr.="<td>";
    $tr.="<input type='hidden' name='drugid[]' value='$id'>";
    $tr.="<input type='hidden' name='qty[]' value='$qty'>";
    $tr.="<input type='hidden' name='price[]' value='$price'>";
    $tr.="<input type='hidden' name='drug[]' value='$row[name]'>";
    $tr.="<input type='hidden' name='amount[]' id='amount' value='$amount'>";
    $tr.="$row[name]</td>";
    $tr.="<td>$row[price] x $qty </td>";
    $tr.="<td>$amount </td>";
    $tr.="</tr>";
    echo $tr;
}
else
{
    header("Location:../Public/dahsboard.php");
}
?>