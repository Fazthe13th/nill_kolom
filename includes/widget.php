<?php if(loggedin()===true)
{
    $userid=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$userid'");
$result=mysql_fetch_array($query);
    ?>
        <div class="btn-group log-in-btn" role="group">
            <button type="button" class="btn btn-default dropdown-toggle  myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <small class="loggedin">Logged In As:</small><?php echo $result['user_name']?>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <?php 
                $admin_status=$result['admin'];
                if($_SESSION['user_id']==1 || $admin_status==1)
                {
                    ?>
                    <li><a href="admin_panel.php">Admin Panel</a></li>
                    <?php
                }
                ?>
                <li><a href="current_pro.php">View profile</a></li>
              <li><a href="edit_profile.php">Edit Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            
      </div>
        
        </nav>
        
      </div></div>
      

    <?php
}
else 
    {?>

<div class=" log-in-btn"><a href="#mymodal" class="btn btn-info" role="button" data-toggle="modal"><span class="glyphicon glyphicon-user"></span>Login</a></div>
        
</nav>
        
      </div></div>
      
<?php }?>

