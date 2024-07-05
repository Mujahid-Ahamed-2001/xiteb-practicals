<?php 
date_default_timezone_set('Asia/Colombo');
session_start();
if(!isset($_SESSION["user_login"]))
{
    header("Location: ../Public/");
}
?>