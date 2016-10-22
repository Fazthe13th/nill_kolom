<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';
if(have_access($userid)==true)
{
if($_POST)
{
   $issu_title=mysql_real_escape_string($_POST['issu_name']);
   $issu_publisher=mysql_real_escape_string($_POST['published_by']);
   $issu_des=mysql_real_escape_string($_POST['description']);
   $img_name=addslashes(basename($_FILES['issu_img']['name']));
   $img_temp_name=addslashes(basename($_FILES['issu_img']['tmp_name']));
   
   
 
   $userid=$_SESSION['user_id'];
   mysql_query("INSERT INTO `issues` (`issu_title`,`issu_publish`,`issu_des`,`user_id`,`issu_date`) VALUES ('$issu_title','$issu_publisher','$issu_des','$userid',now())");
   $query=mysql_query("SELECT `issu_id` FROM `issues` ORDER BY `issu_id` DESC LIMIT 1") or die(mysql_error());
   $query=mysql_fetch_array($query);
   $issuid=$query['issu_id'];
   
             //image insert
   if(empty($_FILES['issu_img']['name'])==false){ 
           
           if(!is_dir("img/".$query['issu_id']))
           {
            mkdir("img/".$query['issu_id']);
             move_uploaded_file($_FILES['issu_img']['tmp_name'],"img/".$query['issu_id']."/".$_FILES['issu_img']['name']);
           }
           else{
            move_uploaded_file($_FILES['issu_img']['tmp_name'],"img/".$query['issu_id']."/".$_FILES['issu_img']['name']);}
            
            mysql_query("UPDATE `issues` SET `issu_cover`='$img_name' WHERE `issu_id`='$issuid'") or die(mysql_error());
            
            
            
            
            //end image insert
            }
   header('Location: publish_issu.php?success');
}


?>


<div class="row">
    <div class="span8">
    <form class="form-horizontal" role="form" method="post" action="" style="padding-left: 100px;" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Issu Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="issu_name" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="email">Published By</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="punlish" name="published_by" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="message">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="4" name="description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Issu Cover</label>
        <input onchange="imagepreview(this);" class="alert alert-success" type="file" id="issu_img_js" name="issu_img"/>
        <p class="help-block">Upload a issu cover picture</p>
    </div>
    <div class="form-group">
        <div >
            <img id="preview"/>
        </div>
    </div>
    <div class="form-group">
        <div >
            <button type="submit" class="btn btn-warning" name="submit">Initiate Issu</button>
            <p class="help-block">Please initiate the issu first before go on posting issu content</p>
        </div>
    </div>
    
    <?php if(isset($_GET['success'])&&empty($_GET['success']))
    {
        $issu_id=issu_id();
        ?>
            <div class="form-group">
                <div >
                    
                    <p class="alert alert-success">Successfully Initiated Issu </p>
                </div>
        </div>
            <div class="form-group">
                <div >
                    <a href="post_content.php?issu=<?php echo $issu_id;?>" class="btn btn-success">Post Content On Issu</a>
                </div>
             </div>
        
        <?php
    }?>
    
    
</form>

</div>

</div>
<?php 
}
else
{
    echo "You are not an admin";
}
include 'includes/whole_footer.php';?>