<?php

include 'core/init.php';
$issu_id = mysql_real_escape_string($_GET['issu']);
$userid = $_SESSION['user_id'];
$query=mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$userid'");
$result=mysql_fetch_array($query);
$admin=$result['admin'];
if ($admin == 1) {
    mysql_query("delete from `post` where `issu_id` = '$issu_id'");
    mysql_query("delete from `comments` where `issu_id` = '$issu_id'");
    mysql_query("delete from `issues` where `issu_id` = '$issu_id'");
    
    header("Location: all_issu.php");
} else {
    echo "you are not alowed to delete post";
    header("Location: index.php");
    die();
}


?>