<?php

    session_start();
    error_reporting(0);
    require('database/connect.php');
    require('function/user.php');
    require('function/general.php');
    $errors=array();
    $userid=$_SESSION['user_id'];
    
?>