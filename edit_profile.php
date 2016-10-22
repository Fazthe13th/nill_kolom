<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';


include 'includes/sidebar.php';
include 'includes/jambutton.php';
$userid = $_SESSION['user_id'];
$query = mysql_query("SELECT * FROM `blog_user` WHERE `user_id`='$userid'");
$result = mysql_fetch_array($query);
if (empty($_POST) === false) {

    if (empty($errors) == true) {


        if (empty($_POST['password']) == false) {

            if (strlen($_POST['password']) <= 7) {
                $errors[] = 'Password need to be at least 8 character';
            }
            if ($_POST['password'] !== $_POST['repassword']) {
                $errors[] = 'Re-entered password didn\'t match';
            }
        }

    }
}
?>
<h2 class="h2">Edit Your Profile</h2><br />
    <?php
if (isset($_GET['success']) && empty($_GET['success'])) {
    include 'includes/login_register_pop_over.php'; ?>
           <h6 class="h6">You have successfully edited your profile. Go to <a href="current_pro.php">current profile</a> if you want.</h6>
           <?php
} else {
    if (empty($_POST) == false && empty($errors) == true) {


        if (empty($_POST['password']) == false) {
            $password = md5($_POST['password']);
            mysql_query("UPDATE `blog_user` SET `password`='$password' WHERE `user_id`='$userid'") or
                die(mysql_error());
        }
        if (empty($_FILES['pro_img']['name']) == false) {
            $pro_img = addslashes($_FILES['pro_img']['name']);
            mysql_query("UPDATE `blog_user` SET `pro_img`='$pro_img' WHERE `user_id`='$userid'") or
                die(mysql_error());
            //image insert

            if (!is_dir("img/" . $result['user_name'])) {
                mkdir("img/" . $result['user_name']);
                move_uploaded_file($_FILES['pro_img']['tmp_name'], "img/" . $result['user_name'] .
                    "/" . $_FILES['pro_img']['name']) or die("no");
            } else {
                move_uploaded_file($_FILES['pro_img']['tmp_name'], "img/" . $result['user_name'] .
                    "/" . $_FILES['pro_img']['name']) or die("no");
            }


            //end image insert
        }

        if (isset($_POST['delete_pro_img'])) {

            mysql_query("UPDATE `blog_user` SET `pro_img`='' WHERE `user_id`='$userid'") or
                die(mysql_error());
            header('Location: edit_profile.php');
            die();
        }


        include 'core/function/email_activation.php';
        header('Location: edit_profile.php?success');
        exit();
    } else
        if (empty($errors) === false) {
            include 'includes/login_register_pop_over.php';
            echo error_handel($errors);
        } ?>
<div class="row-fluid">
    <div class="span12">
        <form action="" method="post" enctype="multipart/form-data">
              
              <div class="form-group">
                <label for="exampleInputPassword1">Change Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password"/>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Re-enter New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-enter Password" name="repassword"/>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Change Profile Picture:</label>
                <input class="alert alert-success" type="file" id="exampleInputFile" name="pro_img"/>
                <p class="help-block">Upload a profile picture</p>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Delete Profile Picture:</label>
                <button class="alert alert-danger" name="delete_pro_img">Delete Profile Picture</button>
                <p class="help-block">If you delete a profile picture than a default picture will be given to your profile</p>
              </div>
              
              <button type="submit" class="btn btn-default">Update Profile</button>
        </form>
    </div><!--/span-->
</div>
<hr />
<?php
}
include 'includes/post_area.php';
include 'includes/whole_footer.php'




?>