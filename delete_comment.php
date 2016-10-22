<?php

include 'core/init.php';
$comment = mysql_real_escape_string($_GET['comment']);

$issu_id = mysql_real_escape_string($_GET['issu']);
$post_id = mysql_real_escape_string($_GET['post_id']);

    mysql_query("delete from `comments` where `comment_id` = '$comment'");
    header("Location: comments.php?issu=$issu_id&id=$post_id");




?>