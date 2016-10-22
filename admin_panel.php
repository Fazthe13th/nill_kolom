<?php

ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';
include 'includes/login_register_pop_over.php';


$userid=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$userid'");
$result=mysql_fetch_array($query);
if($result['admin']!= 1)
{
    echo "<h4 style='margin-right: 500px;float: right;'>আপনি এডমিন না  </h4>";
    die();
}



?>
<div class="row">
    <div class="span4">
        <a href="publish_issu.php"><button class="alert alert-info">Publish new issu</button></a>
    </div>
    
    <div class="span4" style="padding: 5;">
        <a href="bann_user.php"><button class="alert alert-info">Bann a user</button></a>
    </div>
    <div class="span4" style="padding: 5;">
        <a href="all_issu.php"><button class="alert alert-info">All Published Issus</button></a>
    </div>
    <div class="span4" style="padding: 5;">
        <a href="all_recent_comments.php"><button class="alert alert-info">All Recent Comments</button></a>
    </div>
</div>

<?php 

include 'includes/whole_footer.php';

?>