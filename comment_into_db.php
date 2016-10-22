<?php

include 'core/init.php';
$post_id = mysql_real_escape_string($_GET['id']);

$issu_id = mysql_real_escape_string($_GET['issu']);
$comment=mysql_real_escape_string($_POST['comment']);

mysql_query("INSERT INTO `comments` (`post_id`, `user_id`, `issu_id`, `comment`) VALUES ('$post_id','$userid','$issu_id','$comment')") or die(mysql_error());

//Output comment
$userid_admin = $_SESSION['user_id'];
$query_admin=mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$userid_admin'");
$result_admin=mysql_fetch_array($query_admin);
$admin=$result_admin['admin'];
$output_comment=mysql_query("SELECT * FROM `comments` WHERE `issu_id` = '$issu_id' AND `post_id` = '$post_id' ORDER BY `comment_id` DESC") or die(mysql_error());
            
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