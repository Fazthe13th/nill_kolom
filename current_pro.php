<?php 
include 'core/init.php';
if(loggedin()===true)

{
$userid=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$userid'");
$result=mysql_fetch_array($query);
$username=$result['user_name'];
$image=$result['pro_img'];
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';?>

<div style="float: right; margin-right: 500px;">
    
<?php if($result['pro_img']=='')
{
    ?>
    <img style="padding: 5px;" src="<?php echo "img/default.png"; ?>" height="100" width="100"/>
    <?php
}
    else{
        
    
?>
<img style="padding: 5px;" src="<?php echo "img/$username/$image"; ?>" height="100" width="100"/>


<?php }?>
<div style="border: 1px; border-radius: 2px;">
<p style="padding: 5px;">ইউজার এর নাম : <?php echo $result['user_name'];?></p>
<p style="padding: 5px;">প্রথম নাম : <?php echo $result['first_name'];?></p>
<p style="padding: 5px;">শেষ নাম : <?php echo $result['last_name'];?></p>
<p style="padding: 5px;">ইমেইল অ্যাড্রেস : <?php echo $result['email'];?></p>
</div>
    
</div>

<?php

include 'includes/whole_footer.php';
}
else
{
    die("<span class='alert alert-warning'>You are not logged in to any account. please do not mess around with the server . Go Back to <a href='index.php'>Home</a></span>");
}


?>


