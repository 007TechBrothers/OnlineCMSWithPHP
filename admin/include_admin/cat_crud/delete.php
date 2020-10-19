<?php 
    require_once "../db.php";
    require_once "../../functions.php";
 ?>

<?php 
 
  if(isset($_GET['delete'])){
  	$cat_id = escape($_GET['delete']);
  	if($cat_id != null){
  		$sql = "DELETE FROM categories WHERE cat_id= $cat_id";

	  	$result = mysqli_query($con, $sql);
	  	confirm_query($result);
  	}
  	else {
  		header('location: ../../admin_categories.php');
  	}
  	
  }

  header('location: ../../admin_categories.php');
 ?>
 