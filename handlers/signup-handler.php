<?php
session_start();
include '../db/db.php';
include '../classes/signup-class.php';
$signup= new signup();
if(isset($_POST["sign-up"]))
{
    if(empty($_POST["name"]) ||empty($_POST["email"]) ||empty($_POST["address"]) ||empty($_POST["phone"]) ||empty($_POST["dob"]) ||empty($_POST["password"]))
    {
        $_SESSION["signup_update"]=1;
        header("Location:../Public/sign-up.php");
    }
    else
    {
        $emailValidate=$signup->emailvalidate($_POST["email"]);
        if($emailValidate==true)
        {
            $name=$_POST["name"];
            $email=$_POST["email"];
            $address=$_POST["address"];
            $phone=$_POST["phone"];
            $dob=$_POST["dob"];
            $password=md5($_POST["password"]);
            $user=$signup->create_user($name,$email,$address,$phone,$dob,$password);
            if($user==false)
            {
                $_SESSION["signup_update"]=2;
                header("Location:../Public/sign-up.php");

            }
            else
            {
                $id=$user;
                $userInfo=$signup->get_user_by_id($id);
                $_SESSION["user_login"]=mysqli_fetch_array($userInfo);
                header("Location:../Public/dashboard.php");
            }

            // no email found

        }
        else
        {
            $_SESSION["signup_update"]=0;
            header("Location:../Public/sign-up.php");
            // email found
        }


    }
}
elseif (isset($_POST["email"]))
{
    $email=$_POST["email"];
    $emailValidate=$signup->emailvalidate($email);
    if($emailValidate==true)
    {
        echo 1;
        // no email found
    }
    else
    {
        echo 0;
        // email found
    }
}
else
{
    header("Location:../Public/");
}
?>