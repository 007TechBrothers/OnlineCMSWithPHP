<?php 
    require_once "../db.php";
    require_once "../../functions.php";
 ?>

<?php 
 
  if(isset($_POST['create'])){

  	$cat_title = escape($_POST['cat_title']);
  	if($cat_title != null){
  		$sql = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";

	  	$result = mysqli_query($con, $sql);
	  	confirm_query($result);
  	}
  	else {
  		header('location: ../../admin_categories.php');
  	}
  	
  }

  header('location: ../../admin_categories.php');
 ?>