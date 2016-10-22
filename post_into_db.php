<?php



include 'core/init.php';

$issu_id=$_GET['issu'];
$post_title=mysql_real_escape_string($_POST['post_title']);
$post_writer=mysql_real_escape_string($_POST['writer_name']);
$post_content=nl2br(mysql_real_escape_string($_POST['content']));
$img_name=addslashes(basename($_FILES['post_img']['name']));
$img_temp_name=addslashes(basename($_FILES['post_img']['tmp_name']));
$cat=$_POST['cat'];
$cat = $cat[0];
mysql_query("INSERT INTO `post` (`issu_id`,`user_id`,`post_title`,`post_writer`,`post_content`,`post_publish_time`,`cat`) VALUES ('$issu_id','$userid','$post_title','$post_writer','$post_content',now(),'$cat')");
$query=mysql_query("SELECT `post_id` FROM `post` ORDER BY `post_id` DESC LIMIT 1") or die(mysql_error());
$query=mysql_fetch_array($query);
$postid=$query['post_id'];

             //image insert
   
           
           if(!is_dir("img/".$issu_id."/".$postid))
           {
            mkdir("img/".$issu_id."/".$postid);
             move_uploaded_file($_FILES['post_img']['tmp_name'],"img/".$issu_id."/".$postid."/".$_FILES['post_img']['name']);
           }
           else{
            move_uploaded_file($_FILES['post_img']['tmp_name'],"img/".$issu_id."/".$postid."/".$_FILES['post_img']['name']);}
            
            mysql_query("UPDATE `post` SET `post_img`='$img_name' WHERE `post_id`='$postid'") or die(mysql_error());
            
            
            
            
            //end image insert
            
           




header("Location: post_content.php?issu=$issu_id&success");




?>