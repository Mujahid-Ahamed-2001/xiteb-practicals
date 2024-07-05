<?php 
if(isset($_POST["sign-up"]))
{
    if(empty($_POST["name"]) ||empty($_POST["email"]) ||empty($_POST["address"]) ||empty($_POST["phone"]) ||empty($_POST["dob"]) ||empty($_POST["password"]))
    {
        header("Location:../Public/sign-up.php");
    }
    else
    {
        
    }
}
else
{
    header("Location:../Public/");
}
?>