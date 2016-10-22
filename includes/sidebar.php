<body style="background-image: url('img/blu2.jpg');">
    <div class="container" style="background: white; border-radius: 2px; padding: 10px;">
      <div class="row">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Top Posts</li>
              <?php 
              error_reporting(0);
                 $top_comments_count = mysql_query("SELECT `post_id`, COUNT(`comment_id`) FROM `comments` GROUP BY `post_id`");
                 $all=array();
                 while($top_comments_counts=mysql_fetch_array($top_comments_count))
                    {
                        $all_a=array($top_comments_counts[1],$top_comments_counts['post_id']);
                        $all[]=$all_a;
                        
                    } 
                  array_multisort($all);
                  rsort($all);
                  $count = 1;
                  foreach($all as $value)
                    {
                        if($count==8)
                            break 1;
                        $post_id=$value[1];
                        $post=mysql_fetch_array(mysql_query("SELECT * FROM `post` WHERE `post_id` = '$post_id'"));
                        $post_title = $post['post_title'];
                        if(strlen($post_title)>20)
                        {
                            $post_title = substr($post_title,0,50).'...';
                        }
                        $post_issu_id= $post['issu_id'];
                        ?>
                        <li><a style="color: white;" class="btn" href="comments.php?id=<?php echo $post_id?>&issu=<?php echo $post_issu_id?>"><?php echo $post_title;?></a></li>
                        <?php
                    $count++;
                    }       
              ?>
              <li class="nav-header">Recent Commented</li>
              <?php 
                    $recent_comments_re=mysql_query("SELECT * FROM `comments` ORDER BY `comment_id` DESC") or die(mysql_error());
                    $count_recent = 1;
                    while($recent_comments = mysql_fetch_array($recent_comments_re))
                    {
                        if($count_recent == 8)
                            break 1;
                        $count_recent++;
                        $post_id = $recent_comments['post_id'];
                        if($post_id == $repet_stop)
                        {
                            continue;
                        }
                        $repet_stop = $post_id;
                        
                        $recent_comment = mysql_fetch_array(mysql_query("SELECT * FROM `post` WHERE `post_id` ='$post_id'"));
                        $post_title_re = $recent_comment['post_title'];
                        if(strlen($post_title_re)>20)
                        {
                            $post_title_re = substr($post_title_re,0,50).'...';
                        }
                        $post_issu_id= $recent_comment['issu_id'];
                        
                        ?>
                        
                        <li><a style="color: white;" class="btn" href="comments.php?id=<?php echo $post_id?>&issu=<?php echo $post_issu_id?>"><?php echo $post_title_re;?></a></li>
                        <?php
                        
                    }
              ?>
              </ul>
          </div><!--/.well -->
        </div><!--/span-->