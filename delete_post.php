<?php

include 'core/init.php';
$post_id = mysql_real_escape_string($_GET['id']);
$user_id = mysql_real_escape_string($_GET['userid']);
$issu_id = mysql_real_escape_string($_GET['issu']);
if ($userid == $user_id) {
    mysql_query("delete from `post` where `post_id` = '$post_id'");
    mysql_query("delete from `comments` where `post_id` = '$post_id'");
    header("Location: post_output.php?issu=$issu_id");
} else {
    echo "you are not alowed to delete post";
    header("Location: index.php");
    die();
}

?>