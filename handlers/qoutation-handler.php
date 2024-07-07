<?php 
$usertype=1;
include '../db/db.php';
include '../views/authcheck.php';
include '../classes/drug-class.php';
include '../classes/qoutation-class.php';
include '../classes/mail-class.php';
if(isset($_POST["add_qoute"]))
{
    $pres_id=$_POST["prescription_id"];
    if(!isset($_POST["drugid"]) ||!isset($_POST["qty"]) ||!isset($_POST["price"]) ||!isset($_POST["amount"]) )
    {
        $_SESSION["qoute_update"]=0;
        header("Location:../Public/create-qoutation.php?pres_id=$prescription_id");
    }
    else
    {
        $qoutation= new qoutation();
        $count=count($_POST["drugid"]);
        for ($i=0; $i <$count ; $i++) 
        { 
            $drug_id=$_POST["drugid"][$i];
            $drug=$_POST["drug"][$i];
            $price=$_POST["price"][$i];
            $qty=$_POST["qty"][$i];
            $amount=$_POST["amount"][$i];
            $add=$qoutation->insert_qoute($drug_id,$pres_id,$drug,$price,$qty,$amount);
            if($add==true)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        
        $pres=$qoutation->select_pres($pres_id);
        $row=mysqli_fetch_assoc($pres);
        $user=$row["user"];
        $receiver=$row["email"];
        $description="Qoutation Created";
        $qoutation->notification($description,$user);
        $update=$qoutation->update_pres_status($pres_id,$status=1);
        $email=new email();
        $subject="Your Qoutation Has Been Created";
        $body="";
        $emails=$email->emailsend($subject,$body,$receiver);
        if($update==true)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
        $_SESSION["qoute_update"]=1;

        header("Location:../Public/dashboard.php");
    }
}
else
{
    $_SESSION["qoute_update"]=5;  
    header("Location:../Public/dashboard.php");
}
?>