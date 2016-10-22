<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';


include 'includes/sidebar.php';
$post_id = mysql_real_escape_string($_GET['id']);
$user_id = mysql_real_escape_string($_GET['userid']);
$issu_id = mysql_real_escape_string($_GET['issu']);

$query = mysql_query("SELECT * FROM `post` WHERE `user_id`='$userid' AND `post_id` = '$post_id' AND `issu_id` = '$issu_id'");
$result = mysql_fetch_array($query);

?>
<h2 class="h2">Edit Post</h2><br />
    <?php

if (empty($_POST) == false) {


    if (empty($_POST['post_title']) == false) {
        $post_title = mysql_real_escape_string($_POST['post_title']);
        mysql_query("UPDATE `post` SET `post_title`='$post_title' WHERE `user_id`='$userid' AND `post_id` = '$post_id' AND `issu_id` = '$issu_id'") or
            die(mysql_error());
    }
    if (empty($_POST['writer_name']) == false) {
        $post_writer = mysql_real_escape_string($_POST['writer_name']);
        mysql_query("UPDATE `post` SET `post_writer`='$post_writer' WHERE `user_id`='$userid' AND `post_id` = '$post_id' AND `issu_id` = '$issu_id'") or
            die(mysql_error());
    }
    if (empty($_POST['cat']) == false) {
        $cat = $_POST['cat'];
        $cat = $cat[0];
        mysql_query("UPDATE `post` SET `cat`='$cat' WHERE `user_id`='$userid' AND `post_id` = '$post_id' AND `issu_id` = '$issu_id'") or
            die(mysql_error());
    }
    if (empty($_POST['post_content']) == false) {
        $post_content = mysql_real_escape_string($_POST['post_content']);
        mysql_query("UPDATE `post` SET `post_content`='$post_content' WHERE `user_id`='$userid' AND `post_id` = '$post_id' AND `issu_id` = '$issu_id'") or
            die(mysql_error());
    }
    if (empty($_FILES['post_img']['name']) == false) {
        $post_img = addslashes($_FILES['post_img']['name']);
        mysql_query("UPDATE `post` SET `post_img`='$post_img' WHERE `user_id`='$userid' AND `post_id` = '$post_id' AND `issu_id` = '$issu_id'") or
            die(mysql_error());
        //image insert


        move_uploaded_file($_FILES['post_img']['tmp_name'], "img/" . $issu_id . "/" . $post_id .
            "/" . $_FILES['post_img']['name']);


        //end image insert
    }

    if (isset($_POST['delete_post_img'])) {

        mysql_query("UPDATE `post` SET `post_img`='' WHERE `user_id`='$userid' AND `post_id` = '$post_id' AND `issu_id` = '$issu_id'") or
            die(mysql_error());
        header("Location: edit_post.php?id=$post_id&userid=$user_id&issu=$issu_id");
        die();
    }


    header("Location: post_output.php?issu=$issu_id&success");

} else
    if (empty($errors) === false) {
        include 'includes/login_register_pop_over.php';
        echo error_handel($errors);
    } ?>
<div class="row">
    <div class="span8">
        <form action="" method="post" enctype="multipart/form-data">
              
              <div class="form-group">
                <input onchange="imagepreview(this);" class="alert alert-success" type="file" id="issu_img_js" name="post_img"/>
                
              </div>
                <div class="form-group">
                    <div >
                        <img id="preview"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Delete Profile Picture:</label>
                    <button class="alert alert-danger" name="delete_pro_img">Delete Profile Picture</button>
                    <p class="help-block">If you delete post than a default picture will be given to your post</p>
                 </div>
                <div class="form-group">
                    <label for="name">Post Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="post_title" value="<?php echo
$result['post_title'] ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label>Writer's Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="punlish" name="writer_name" value="<?php echo
$result['post_writer'] ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel1">Select list (select one):</label>
                      <div class="col-sm-6">
                          <select class="form-control" id="sel1" name="cat[]">
                            <option value="Unknown">Unknown</option>
                            <option value="Onubad Kbita">Onubad Kbita</option>
                            <option value="Onubad Golpo">Onubad Golpo</option>
                            <option value="Natok">Natok</option>
                            <option value="Alokcitro">Alokcitro</option>
                          </select>
                      </div>
                </div>
                <div class="form-group">
                    <label for="message">Content</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4" name="post_content"><?php echo
$result['post_content'] ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="submit" id="post_submit"/>
                        
                    </div>
                </div>
                
        </form>
    </div><!--/span-->
</div>
<hr />
<div><a href="post_content.php?issu=<?php echo $issu_id; ?>">make more posts</a></div>

<?php


include 'includes/whole_footer.php'




?>