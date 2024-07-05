<?php
session_start();
include '../db/db.php';
include '../classes/login-class.php';
$login=new login();

if (isset($_POST["sign-in"])) 
{
    if(empty($_POST["email"]) ||empty($_POST["password"]))
    {
        $_SESSION["login_update"]=1;
        header("Location:../Public/");
    }
    else
    {
        $email=$_POST["email"];
        $password=md5($_POST["password"]);
        $logins=$login->login($email,$password);
        $count=mysqli_num_rows($logins);
        if($count==1)
        {
            $_SESSION["user_login"]=mysqli_fetch_array($logins);
            header("Location:../Public/dashboard.php");
        }
        else
        {
            $_SESSION["login_update"]=2;
            header("Location:../Public/");
        }
    }
}
else
{
    header("Location:../Public/");
}
?>