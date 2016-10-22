<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/login_register_pop_over.php';
include 'includes/sidebar.php';

$userid_admin = $_SESSION['user_id'];
$query_admin=mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$userid_admin'");
$result_admin=mysql_fetch_array($query_admin);
$admin=$result_admin['admin'];
$post_id = mysql_real_escape_string($_GET['id']);

$issu_id = mysql_real_escape_string($_GET['issu']);

    $result=mysql_fetch_array(mysql_query("SELECT * FROM `post` WHERE `issu_id` = '$issu_id' AND `post_id` = '$post_id'")) or die(mysql_error());
    ?>
<div class="row">
    <div class="span8">  
    <?php if($result['post_img']=='')
{
    ?>
    
    <img src="<?php echo "img/default_post.jpg"; ?>" height="200" width="200"/>
    <?php
}
    else{
        $image=$result['post_img'];
        $postid=$result['post_id'];
    
?>

<img src="<?php echo "img/$issu_id/$postid/$image";?>" height="200" width="200"/>


<?php }?>
    
    <div class="alert alert-danger"><?php echo $result['post_title'];?></div>
    <div><?php echo $result['post_writer'];?></div>
    <div><?php echo $result['cat'];?></div>
    <div><?php echo $result['post_publish_time'];?></div>
    <div><?php echo nl2br($result['post_content']);?></div>
    <hr />
    <?php 
    
        if(loggedin()==true)
        {
    ?>
    <form action="comment_into_db.php?id=<?php echo $post_id?>&issu=<?php echo $issu_id?>" method="post" id="comment_form">
        <div class="form-group">
                    <h6>Make a comment</h6>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4" name="comment"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit" id="comment_make">Comment</button>
                   
                </div>
    </form>
    <?php }
        else{
            echo "<h6>You are not logged in. Please Login or register to make a comment</h6>";
        }
    ?>
    
        <div class="span8">
            <hr />
            <h6>Previous comments:</h6>
            <div id="comments">
           <?php $output_comment=mysql_query("SELECT * FROM `comments` WHERE `issu_id` = '$issu_id' AND `post_id` = '$post_id' ORDER BY `comment_id` DESC") or die(mysql_error());
            
            while($comments=mysql_fetch_array($output_comment))
            {
                $comment_user_id=$comments['user_id'];
                $query=mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$comment_user_id'");
                $result=mysql_fetch_array($query);
                $username=$result['user_name'];
                $image=$result['pro_img'];
                
                ?>
                <div class="row">
                <div class="span12">
                <div style="padding: 5px;">
                    <?php if($result['pro_img']=='')
            {
                ?>
                <img src="<?php echo "img/default.png"; ?>" height="50" width="50"/>
                <?php
            }
                else{
                    
                
            ?>
            <img src="<?php echo "img/$username/$image"; ?>" height="50" width="50"/>
            
            
            <?php }?>
                </div>
                <div style="background: #E5E5E5; border: 1px; border-radius: 2px;width: 600px;">
                <p style="padding: 20px;"><?php echo $comments['comment']?>
                
                </p>
           
                <div style="float: left; padding: 5px;"><h6>by <?php echo $username;?></h6></div>
                </div>
                <?php if ($admin == 1 || $comments['user_id'] == $_SESSION['user_id'])
                {
                    
                ?>
                <a class="btn bg-primary" style="color: white; background: #80FF80; margin-left: 450px;" href="delete_comment.php?comment=<?php echo $comments['comment_id']?>&post_id=<?php echo $post_id?>&issu=<?php echo $issu_id?>">Delete</a>
                <?php }?>
                </div>
                
                </div>
                
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php

include 'includes/whole_footer.php'



?>

