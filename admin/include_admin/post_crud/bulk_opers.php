<?php 
    require_once "../db.php";
    require_once "../../functions.php";
 ?>
<?php 
	if(isset($_POST['checkBoxArray'])){
		foreach ($_POST['checkBoxArray'] as $p_id) {
			$bulk_option = $_POST['bulk_option'];
			if (empty($bulk_option)) {
				break;
			}
			switch ($bulk_option) {
				case 'clone':
					$sql = "SELECT * FROM post WHERE post_id = $p_id";
					$select_post = mysqli_query($con, $sql);
					confirm_query($select_post);
					while ($row = mysqli_fetch_assoc($select_post)):
						$post_cat_id = escape($row['post_cat_id']);
						$post_title = escape($row['post_title']);
						$post_author = escape($row['post_author']);
						$post_image = basename($row['post_image']);
						$post_date = escape($row['post_date']);
						$post_tag = escape($row['post_tag']);
						$post_content = escape($row['post_content']);
						$insert_sql = "INSERT INTO post(post_cat_id, post_title, post_author, post_date, post_image, post_tag, post_content) ";
				      	$insert_sql .= "VALUES ($post_cat_id,'$post_title', '$post_author',now() ,'$post_image', '$post_tag', '$post_content')";

						$result = mysqli_query($con, $insert_sql);
						confirm_query($result);
					endwhile;
					break;

				case 'delete':
					$sql = "DELETE FROM post WHERE post_id = $p_id";
					$result = mysqli_query($con, $sql);
					confirm_query($result);
					break;
				default:
					# code...
					break;
			}
		}
	}
	header('location: ../../post.php');

 ?>