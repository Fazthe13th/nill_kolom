<?php

include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';
include 'includes/login_register_pop_over.php';
$issu_id=$_GET['issu'];
$userid = $_SESSION['user_id'];
$query=mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$userid'");
$result=mysql_fetch_array($query);
$admin=$result['admin'];
$output_post=mysql_query("SELECT * FROM `post` WHERE `issu_id` = '$issu_id'") or die(mysql_error());
?>
<div class="row">
    <div class="span8">

<?php
while($result=mysql_fetch_array($output_post))
{
    ?>
    
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
<?php if(isset($_GET['success'])&& empty($_GET['success']))
    {
        set_time_limit(10);
        
    ?>
    
        <div class="col-sm-10">
            <p class="alert alert-success">Successfully edited the post</p>
        <div>
 
   <?php }?>
    
    <div class="alert alert-danger"><?php echo $result['post_title'];?></div>
    <div><?php echo $result['post_writer'];?></div>
    <div><?php echo $result['cat'];?></div>
    <div><?php echo $result['post_publish_time'];?></div>
    <?php 
    
    $content = nl2br($result['post_content']);
    if(strlen($content)>400)
    {
        $content = substr($content,0,500);
        $content = $content.'...';
        
    }?>
    <div><?php echo nl2br($content);?></div>
    <div><?php if($admin == 1){?><a href="delete_post.php?id=<?php echo $result['post_id']?>&userid=<?php echo $result['user_id']?>&issu=<?php echo $issu_id;?>">Delete</a>
        <a href="edit_post.php?id=<?php echo $result['post_id']?>&userid=<?php echo $result['user_id']?>&issu=<?php echo $issu_id;?>">Edit</a><?php }?>
        <a href="comments.php?id=<?php echo $result['post_id']?>&issu=<?php echo $issu_id;?>">Comments &rarr;</a>
    </div>
    
    <?php
}
    if($admin == 1){
        
    
?> 

        <div><a href="post_content.php?issu=<?php echo $issu_id;?>">make more</a></div><?php }?>
    </div>
</div>
<?php include 'includes/whole_footer.php';?>



