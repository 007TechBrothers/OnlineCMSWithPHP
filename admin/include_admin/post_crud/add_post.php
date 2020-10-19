<h3>Create Post Form</h3>
<form action="include_admin/post_crud/create.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label" for="post_cat_id">Select Category</label>
        <select name="post_cat_id" id="post_cat_id" class="form-control">
            <option value="">---</option>
            <?php 
              $sql = "SELECT * FROM categories";
              $result = mysqli_query($con, $sql);
              confirm_query($result);
              while ($row = mysqli_fetch_assoc($result)):
                $cat_id = escape($row['cat_id']);
                $cat_title = escape($row['cat_title']);
             ?>
            <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
            <?php 
            endwhile; ?>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="post_title">Post Title</label>
        <input type="text" name="post_title" id="post_title" class="form-control">
    </div>
    <div class="form-group">
        <label class="control-label" for="post_author">Post Author</label>
        <input type="text" name="post_author" id="post_author" class="form-control">
    </div>
    <div class="form-group">
        <label class="control-label" for="post_image">Post Image</label>
        <input type="file" name="post_image" id="post_image">
    </div>
    <div class="form-group">
        <label class="control-label" for="post_tag">Post Tag</label>
        <input type="text" name="post_tag" id="post_tag" class="form-control">
    </div>
    <div class="form-group">
        <label class="control-label" for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" value="Create Post" name="create" class="btn btn-primary">
</form>