<div class="row-fluid">
            
            <div class="span12">
            <?php 
                $query=mysql_query("SELECT * FROM `post` ORDER BY `issu_id` DESC LIMIT 6");
                
                while($posts=mysql_fetch_array($query))
                {
                    
                
                    
            ?>
              <h5><?php echo $posts['post_title']?></h5>
              <p><?php if(strlen($posts['post_content'])>100)
              {
                $result = mb_substr($posts['post_content'], 0, 500);
                echo $result.'...';
              }
              else{
                echo $posts['post_content'];
              }?></p>
              <p><a class="btn" href="comments.php?id=<?php echo $posts['post_id']?>&issu=<?php echo $posts['issu_id']?>">Comments &raquo;</a></p>
              <?php }?>
            </div><!--/span-->
            
          </div><!--/row-->
       

      
