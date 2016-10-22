<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';

include 'includes/login_register_pop_over.php';
if(empty($_POST)===false)
{
   $req_fields=array('username','first_name','email','password','repassword');
   foreach($_POST as $keys=>$values)
   {
        if(empty($values)==true && in_array($keys,$req_fields)==true)
        {
            $errors[]='All the fields with (*) is requiered ';
            break 1;
        }
   }
   if(empty($errors)==true)
   {
        if(user_exits($_POST['username'])==true)
        {
            $errors[]='A user by \''. htmlentities($_POST['username']).'\' already exists ';
        }
        if(email_exists($_POST['email'])==true)
        {
            $errors[]='A user is already using this email address';
        }
        if(strlen($_POST['password'])<=7)
        {
            $errors[]='Password need to be at least 8 character';
        }
         if($_POST['password']!==$_POST['repassword'])
        {
            $errors[]='Re-entered password didn\'t match';
        }
        if(preg_match("/\\s/",$_POST['username'])==true)
        {
            $errors[]='Can not use any space in user name';
        }
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)==false)
        {
            $errors[]='Sorry the email address is not valid';
        }
   }
}
?>
<h2 class="h2" style="margin-left: 30px; text-align: center;;"> Register</h2><br />
<hr />
    <?php 
        if(isset($_GET['success'])&&empty($_GET['success']))
        {
           
include 'includes/login_register_pop_over.php';?>
           <h6 class="alert aleart-success">You have successfully registered . Go to your email to activate your account</h6>
           <?php 
        }
        else{
        if(empty($_POST)==false && empty($errors)==true)
        {
            
            $username=mysql_real_escape_string($_POST['username']);
           $password=md5($_POST['password']);
            $first_name=mysql_real_escape_string($_POST['first_name']);
            $last_name=mysql_real_escape_string($_POST['last_name']);
            $email=mysql_real_escape_string($_POST['email']);
            $email_code=md5($_POST['username']+microtime());
            $img_name=addslashes($_FILES['pro_img']['name']);
            $img_temp_name=addslashes($_FILES['pro_img']['tmp_name']);
            
            
           
            mysql_query("INSERT INTO `blog_user` (`user_name`,`password`,`first_name`,`last_name`,`email`,`email_code`) VALUES ('$username','$password','$first_name','$last_name','$email','$email_code')");
            $query=mysql_query("SELECT `user_id` FROM `blog_user` ORDER BY `user_id` DESC LIMIT 1") or die(mysql_error());
            $query=mysql_fetch_array($query);
            $userid=$query['user_id'];
            //image insert
          if(empty($_FILES['pro_img']['name'])==false){ 
           
           if(!is_dir("img/".$username))
           {
            mkdir("img/".$username);
             move_uploaded_file($_FILES['pro_img']['tmp_name'],"img/".$username."/".$_FILES['pro_img']['name']);
           }
           else{
            move_uploaded_file($_FILES['pro_img']['tmp_name'],"img/".$username."/".$_FILES['pro_img']['name']);}
            
            mysql_query("UPDATE `blog_user` SET `pro_img`='$img_name' WHERE `user_id`='$userid'");
            
            
            
            
            //end image insert
            }
            include 'core/function/email_activation.php';
            header('Location: register.php?success');
            exit();
        }
        else if (empty($errors)===false)
        {
            include 'includes/login_register_pop_over.php';
            echo error_handel($errors);
        }?>
<div class="row-fluid">
    <div class="col-lg-6" >
    <div class="span12">
        <form action="" method="post" enctype="multipart/form-data" style="margin-left: 30px;">
            <div class="form-group">
                <label for="exampleInputEmail1">User Name:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="User name" name="username"/>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">First Name:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name" name="first_name"/>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Last Name:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name" name="last_name"/>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email"/>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password"/>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Re-enter Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-enter Password" name="repassword"/>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Profile Picture:</label>
                <input onchange="imagepreview(this);" class="alert alert-success" type="file" id="pro_img_js" name="pro_img"/>
                <p class="help-block">Upload a profile pic otherwise a default pic will be given top your profile</p>
              </div>
              
              <button type="submit" class="btn btn-default">Register</button>
        </form>
    </div><!--/span-->
    </div>
</div>
<hr />
<?php 
}
 include 'includes/post_area.php';
include 'includes/whole_footer.php'




?>