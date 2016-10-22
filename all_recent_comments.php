<?php

ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';
include 'includes/login_register_pop_over.php';
$recent_comments_re=mysql_query("SELECT * FROM `comments` ORDER BY `comment_id` DESC") or die(mysql_error());
$number = 1;
?>
<div style="height: auto; width: 400px; float: right; margin-right: 300px;">
<hr />
<h4>All comments</h4>
<hr />
<?php
while($recent_comments = mysql_fetch_array($recent_comments_re))
{
    
    $post_id = $recent_comments['post_id'];
    
    
    $recent_comment = mysql_fetch_array(mysql_query("SELECT * FROM `post` WHERE `post_id` ='$post_id'"));
    $post_title_re = $recent_comment['post_title'];
    $user_id = $recent_comments['user_id'];
    $user_info = mysql_fetch_array(mysql_query("SELECT * FROM `blog_user` WHERE `user_id` = '$user_id'"));
    $username = $user_info['user_name'];
    if(strlen($post_title_re)>20)
    {
        $post_title_re = substr($post_title_re,0,50).'...';
    }
    $post_issu_id= $recent_comment['issu_id'];

?>

<div class="span8">
<ul style="list-style: none;" role="menu">
                <li><a href="comments.php?id=<?php echo $post_id?>&issu=<?php echo $post_issu_id?>"><p><?php echo $number?> ) <?php echo $username?> commented on "<?php echo $post_title_re?>"</p></a></li>
                
</ul>
</div>
<?php 
$number++;
}
?>
</div>
<?php 

include 'includes/whole_footer.php';


?>