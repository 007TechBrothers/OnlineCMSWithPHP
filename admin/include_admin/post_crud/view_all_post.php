
<form method="post" action="include_admin/post_crud/bulk_opers.php">
	<div class="col-md-2">
		<div class="form-group">
			<select name="bulk_option" class="form-control" >
				<option value="">--- Select</option>
				<option value="clone">Clone</option>
				<option value="delete">Delete</option>
			</select>
		</div>
	</div>
	<div class="col-md-10">
		<input type="submit" value="Apply" class="btn btn-success" name="">
	</div>
	<table class="table-condensed table table-responsive">
		<tr>
			<th><input type="checkbox" class="checkAllBox" name=""></th>
			<th>ID</th>
			<th>Category</th>
			<th>Title</th>
			<th>Author</th>
			<th>Image</th>
			<th>Date</th>
			<th>Tag</th>
			<th>Content</th>
		</tr>
	<?php 

		$sql ="SELECT * FROM post ORDER BY post_id DESC";
		$result = mysqli_query($con, $sql);
		confirm_query($result);
		while ($row = mysqli_fetch_assoc($result)):
			$post_cat_id = escape($row['post_cat_id']);
			$post_id = escape($row['post_id']);
			$post_title = escape($row['post_title']);
			$post_author = escape($row['post_author']);
			$post_image = basename($row['post_image']);
			$post_date = escape($row['post_date']);
			$post_tag = escape($row['post_tag']);
			$post_content = escape($row['post_content']);

	?>

		<tr>
			<td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>
			<td><?php echo "$post_id"; ?></td>
			<td>
				<?php
					$sql = "SELECT cat_title 
							FROM categories 
							WHERE cat_id=$post_cat_id";
      				$cat_title = mysqli_query($con, $sql);
      				confirm_query($cat_title);
      				if(mysqli_num_rows($cat_title)){
      					$cat_title = mysqli_fetch_row($cat_title)[0];
      					echo "$cat_title";
      				}
      				
				?>		
			</td>
			<td><?php echo "$post_title"; ?></td>
			<td><?php echo "$post_author"; ?></td>
			<td><img src="../images/<?php echo "$post_image"; ?>" class="img-responsive" width="100px"></td>
			<td><?php echo "$post_date"; ?></td>
			<td><?php echo "$post_tag"; ?></td>
			<td>
				<?php echo substr($post_content, 0 ,50); ?>
				<?php echo strlen($post_content) > 50 ? '...' : '' ?>			
			</td>
			<td>
				<a class="btn btn-warning" href="post.php?source=edit_post&id=<?php echo "$post_id" ?>">Edit</a>
			</td>
			<td>
				<a class="btn btn-danger confirm_delete" href="include_admin/post_crud/delete.php?delete=<?php echo "$post_id" ?>">Delete</a>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</form>