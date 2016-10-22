<?php

ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';
include 'includes/login_register_pop_over.php';
$blog_user=mysql_query("SELECT * FROM `blog_user` ORDER BY `user_id`") or die(mysql_error());
$number = 1;
if(empty($_GET['bann'])==false)
                        {
                            
                            $user_id_this = $_GET['bann'];
                            bann_user($user_id_this);
                            
                        }
                    if(empty($_GET['unbann'])==false)
                        {
                            $user_id_this = $_GET['unbann'];
                            unbann_user($user_id_this);
                        }


?>
<div style="height: auto; width: 500px; float: right; margin-right: 300px;">
<hr />
<h4>সকল ইউজার এর লিস্ট
</h4>
<hr />
<?php
while($blog_users = mysql_fetch_array($blog_user))
{
    $username = $blog_users['user_name'];
    $admin = $blog_users['admin'];
    $banned = $blog_users['bann'];
   
    
    if($admin == 1)
    {
        continue;
    }
    
    
?>

<div class="span10">
<ul style="list-style: none;" role="menu">
                <li><?php echo $number?> ) ইউজার এর নাম <?php echo $username?> 
                <?php 
                    if($banned == 1)
                        {
                            ?>
                            <h6>(এই ইউজার এখন ব্যানড)</h6>
                            <?php
                        }
                       
                    $user_id_this = $blog_users['user_id'];   
                ?>
                <a style="padding: 5px;" href="bann_user.php?bann=<?php echo $user_id_this?>">bann user</a> <a href="bann_user.php?unbann=<?php echo $user_id_this?>">Unbann user</a>
                
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