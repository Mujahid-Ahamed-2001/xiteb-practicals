<?php
session_start();
include '../db/db.php';
include '../views/authcheck.php';
if(isset($_POST["upload_prescription"]))
{
    if(empty($_POST["email"]) ||empty($_POST["password"]))
    {
        $_SESSION["login_update"]=1;
        header("Location:../Public/");
    }
}
else
{
    header("Location:../Public/dashboard.php");
}
?>