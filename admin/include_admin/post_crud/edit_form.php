<?php 
	if(isset($_GET['id'])){
		$post_id = (int)$_GET['id'];
		$sql = "SELECT * FROM post WHERE post_id = $post_id";
		$result = mysqli_query($con, $sql);
		confirm_query($result);
		$row = mysqli_fetch_assoc($result);
		$post_id = escape($row['post_id']);
        $post_cat_id = escape($row['post_cat_id']);
		$post_title = escape($row['post_title']);
		$post_author = escape($row['post_author']);
		$post_image = basename($row['post_image']);
		$post_date = escape($row['post_date']);
		$post_tag = escape($row['post_tag']);
		$post_content = escape($row['post_content']);
	}
 ?>

<h3>Edit Post Form</h3>
<form action="include_admin/post_crud/update.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="post_id" value="<?php echo "$post_id" ?>">
    <div class="form-group">
        <label class="control-label" for="post_cat_id">Select Category</label>
        <select name="post_cat_id" id="post_cat_id" class="form-control">
            
            <?php 
              $sql = "SELECT * FROM categories";
              $result = mysqli_query($con, $sql);
              confirm_query($result);
              while ($row = mysqli_fetch_assoc($result)):
                $cat_id = escape($row['cat_id']);
                $cat_title = escape($row['cat_title']);
                if($cat_id == $post_cat_id){
            ?>
            <option value="<?php echo $cat_id; ?>" selected><?php echo $cat_title; ?></option>
            <?php
                } else {
             ?>
            <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
            <?php 
            }
            endwhile; ?>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="post_title">Post Title</label>
        <input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo "$post_title" ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="post_author">Post Author</label>
        <input type="text" name="post_author" id="post_author" class="form-control" value="<?php echo "$post_author" ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="post_image">Post Image</label>
        <input type="file" name="post_image" id="post_image">
    </div>
    <div class="form-group">
    	<img class="img-responsive" width="200px" src="../images/<?php echo $post_image ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="post_tag">Post Tag</label>
        <input type="text" name="post_tag" id="post_tag" class="form-control" value="<?php echo "$post_tag" ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10"><?php echo "$post_content" ?>
        </textarea>
    </div>
    <input type="submit" value="Update Post" name="update" class="btn btn-primary">
</form>