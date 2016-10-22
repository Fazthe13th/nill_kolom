<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/widget.php';
include 'includes/sidebar.php';
$issu_id=$_GET['issu'];



?>

<div class="row">
    <div class="span8">
    <form class="form-horizontal" role="form" method="post" action="post_into_db.php?issu=<?php echo $issu_id;?>" style="padding-left: 100px;" enctype="multipart/form-data">
    <div class="form-group">
    <input onchange="imagepreview(this);" class="alert alert-success" type="file" id="issu_img_js" name="post_img"/>
    
    </div>
    <div class="form-group">
        <div >
            <img id="preview"/>
        </div>
    </div>
    <div class="form-group">
        <label for="name">Post Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="post_title" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="email">Writer's Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="punlish" name="writer_name" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="sel1">Select list (select one):</label>
          <div class="col-sm-6">
              <select class="form-control" id="sel1" name="cat[]">
                <option value="">Unknown</option>
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
            <textarea class="form-control" rows="4" name="content"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-10">
            <input type="submit" id="post_submit"/>
            
        </div>
    </div>
    <?php if(isset($_GET['success'])&& empty($_GET['success']))
    {
        set_time_limit(10);
        
    ?>
    <div class="form-group">
        <div class="col-sm-10">
            <p class="alert alert-success">Successfuly Added to this issu's posts</p>
        <div>
    </div>
   <?php }?>
    <div class="form-group">
        <a href="post_output.php?issu=<?php echo $issu_id;?>">See All Posts</a>
    </div>
</form>

</div>

</div>
<div></div>
<?php 

include 'includes/whole_footer.php'
?>