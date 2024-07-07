<?php
$usertype=0;
include '../db/db.php';
include '../views/authcheck.php';
include '../classes/prescription-class.php';
$prescription= new prescription();
if(isset($_POST["upload_prescription"]))
{
    if(empty($_POST["delivery"]) || empty($_POST["time"]))
    {
        $_SESSION["upload_update"]=1;
        header("Location:../Public/upload-prescription.php");
    }
    elseif(count($_FILES['prescription']['name'])==0)
    {
        $_SESSION["upload_update"]=1;
        header("Location:../Public/upload-prescription.php");
    }
    else
    {
        $delivery=$_POST["delivery"];
        $time=$_POST["time"];
        if(isset($_POST["Note"]))
        {
            $note=$_POST["Note"];
        }
        else
        {
            $note="";
        }
        $add_prescription=$prescription->upload_prescrion($delivery,$time,$note);
        $presID=mysqli_insert_id($prescription->conn);
        if($add_prescription==true)
        {
            $fileCount=count($_FILES['prescription']['name']);
            for ($i=0; $i < $fileCount; $i++) { 
                $tagetdir="../Assets/uploads/";
                $filetempname=$_FILES['prescription']['tmp_name'][$i];
                $fileName=$_FILES['prescription']['name'][$i];
                if($i==0)
                {$feature=1;}
                else
                {$feature=0;}
                $target_file=$tagetdir.basename($_FILES["prescription"]["name"][$i]);
                $document=$prescription->upload_document($presID,$fileName,$feature);
                move_uploaded_file($filetempname,$target_file);            
            }
            $_SESSION["upload_update"]=3;
            header("Location:../Public/upload-prescription.php");

        }
        else
        {
            $_SESSION["upload_update"]=2;
            header("Location:../Public/upload-prescription.php");
        }
        
    }
}
elseif ($_POST["accept_reject"]) 
{
    if(empty($_POST["status"]) )
    {
        $_SESSION["upload_update"]=1;
        header("Location:../Public/Viewprescription.php");
    }
    else
    {
        
    }
}
else
{
    header("Location:../Public/dashboard.php");
}
?>