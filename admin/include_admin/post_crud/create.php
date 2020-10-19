<?php 
    require_once "../db.php";
    require_once "../../functions.php";
 ?>

<?php 
  
  if(isset($_POST['create'])){
    $post_cat_id = escape($_POST['post_cat_id']);
    $post_title = escape($_POST['post_title']);
    $post_author = escape($_POST['post_author']);
    $post_tag = escape($_POST['post_tag']);
    $post_content = escape($_POST['post_content']);

    $post_image_name = basename($_FILES['post_image']['name']);
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    move_uploaded_file($post_image_temp, '../../../images/'.$post_image_name);

  	if($post_title != null){
  		$sql = "INSERT INTO post(post_cat_id, post_title, post_author, post_date, post_image, post_tag, post_content) ";
      $sql .= "VALUES ($post_cat_id, '$post_title', '$post_author',now() ,'$post_image_name', '$post_tag', '$post_content')";

	  	$result = mysqli_query($con, $sql);
	  	confirm_query($result);
  	}
  	else {
  		header('location: ../../post.php');
  	}
  	
  }

  header('location: ../../post.php');
 ?>