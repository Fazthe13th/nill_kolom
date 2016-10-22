<div class="span8">
          <div class="jumbotron">
            <?php $query=mysql_query("SELECT * FROM `issues` ORDER BY `issu_id` DESC LIMIT 1");
                    $issu=mysql_fetch_array($query);
                    
                ?>
                
            <img class="img-responsive" src="<?php echo 'img/'.$issu['issu_id'].'/'.$issu['issu_cover'];?>"/>
            <br />
            <h1 style="padding-top: 10px;"><?php echo $issu['issu_title'];?></h1>
            <p><?php echo $issu['issu_des']?></p>
            <p><a href="post_output.php?issu=<?php echo $issu['issu_id']?>" class="btn btn-primary btn-large">See All Contents&raquo;</a></p>
          </div>