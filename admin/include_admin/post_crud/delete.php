<?php 
    require_once "../db.php";
    require_once "../../functions.php";
 ?>

<?php 
 
  if(isset($_GET['delete'])){
  	$post_id = escape($_GET['delete']);
  	if($post_id != null){
  		$sql = "DELETE FROM post WHERE post_id= $post_id";

	  	$result = mysqli_query($con, $sql);
	  	confirm_query($result);
  	}
  	else {
  		header('location: ../../post.php');
  	}
  	
  }

  header('location: ../../post.php');
 ?>
 