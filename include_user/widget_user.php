
<div class="well">
     <h4>Myanmar Favourite Foods</h4>
     <?php 

	    $sql ="SELECT * FROM post ORDER BY post_id DESC LIMIT 0,10";
	    $result = mysqli_query($con, $sql);
	    confirm_query($result);
	    while ($row = mysqli_fetch_assoc($result)):
	        $post_id = escape($row['post_id']);
	        $post_title = escape($row['post_title']);
	        $post_image = basename($row['post_image']);
	        $post_content = escape($row['post_content']);

	?>
     <a href="post.php?post_id=<?php echo "$post_id"; ?>">
     	<p class="lead"><?php echo "$post_title"; ?></p>
     	<img src="images/<?php echo $post_image; ?>" width="200px" class="img-responsive">
     	<p>
            <?php echo substr($post_content, 0 ,20); ?>
            <?php echo strlen($post_content) > 20 ? '...' : '' ?>     
        </p>
     </a> 
     <?php endwhile; ?>  
</div>
