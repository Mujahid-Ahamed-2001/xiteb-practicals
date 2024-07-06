<?php 
date_default_timezone_set('Asia/Colombo');
session_start();
if(!isset($_SESSION["user_login"]))
{
    header("Location: ../Public/");
}
if(isset($usertype))
{
    if($_SESSION["user_login"]["usertype"]!=$usertype)
    {
        header("Location: ../Public/dashboard");
    }
}

?>