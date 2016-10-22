<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';
include 'includes/jambutton.php';
include 'includes/login_register_pop_over.php';
if(empty($_POST)===false)
{
    $username=mysql_real_escape_string($_POST['user_name']);
    $password=mysql_real_escape_string($_POST['password']);
    if(empty($username)===true || empty($password)===true)
    {
        $errors[]='You have to give both user name and password';
    }
    else if(user_exits($username)===false)
    {
        $errors[]='There is no user by this name . Plaswe register today';
    }
    
    else
    {
        $login=login($username,$password);
        if($login===false)
        {
            $errors[]='Your username and password didn\'t mix correctly';
        }
        else if(banned($login)===true)
        {
            $errors[]='Your account is currently banned by admin. Sorry , try to contact admin';
        }
       else{
            $_SESSION['user_id']=$login;
            header('Location: index.php');
            exit();}
        
    }
}

?>
<div class="col-lg-6">
		<?php 
        
        if(empty($errors)==false)
        {
           include 'includes/login_register_pop_over.php';
            ?>
            <h4 class="h4">We faced some problem during login</h4>
            
            <?php
            echo error_handel($errors);
            
        }?>
</div><!--Main-->
<?php  include 'includes/post_area.php';
include 'includes/whole_footer.php'




?>