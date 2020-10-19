<?php 
    require_once "../db.php";
    require_once "../../functions.php";
 ?>

<?php 
 
  if(isset($_POST['update'])){
  	$cat_id = escape($_POST['cat_id']);
  	$cat_title = escape($_POST['editname']);

  	if($cat_title != null){
  		$sql = "UPDATE categories SET cat_title='$cat_title' WHERE cat_id= $cat_id";

	  	$result = mysqli_query($con, $sql);
	  	confirm_query($result);
  	}
  	else {
  		header('location: ../../admin_categories.php');
  	}
  	
  }

  header('location: ../../admin_categories.php');
 ?>
 