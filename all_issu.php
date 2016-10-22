<?php

ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';
include 'includes/login_register_pop_over.php';
$recent_issu_re=mysql_query("SELECT * FROM `issues` ORDER BY `issu_id`") or die(mysql_error());
$number = 1;
?>
<div style="height: auto; width: 400px; float: right; margin-right: 300px;">
<hr />
<h4>All issus</h4>
<hr />
<?php
while($recent_issus = mysql_fetch_array($recent_issu_re))
{
    $issu_id = $recent_issus['issu_id'];
    $issu_title = $recent_issus['issu_title'];
    $issu_date = $recent_issus['issu_date'];
    
?>

<div class="span8">
<ul style="list-style: none;" role="menu">
                <li style="padding: 20px; background-color: #D3D3D3; border-radius: 2px; height: auto; width: 600px;">ইস্যু <?php echo $number?> যার টাইটেল ছিল <?php echo $issu_title?> , এর প্রকাশ
               হবার সময় : <?php echo $issu_date;?>
               
               <?php 
               $userid = $_SESSION['user_id'];
               $query=mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$userid'");
                $result=mysql_fetch_array($query);
                $admin=$result['admin'];
                if($admin == 1)
                {
                    ?>
                    <a style="padding: 5px;" href="post_content.php?issu=<?php echo $issu_id?>">Edit</a> <a href="delete_issu.php?issu=<?php echo $issu_id?>">Delete</a>
                    <?php
                }
               ?>
               <br />
               <a style="padding: 5px;" href="post_output.php?issu=<?php echo $issu_id?>">এই ইস্যু এর লিখনিগুলো দেখুন</a>
               </li>
                
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