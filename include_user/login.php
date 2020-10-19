<?php 
	require_once "../admin/include_admin/db.php";
	require_once "../admin/functions.php";
 ?>
<?php session_start(); ?>
 <?php 

 if(isset($_POST['login'])){
 	$username = clean_input($_POST['username']);
 	$password = clean_input($_POST['password']);

 	$username = escape($username);
 	$password = escape($password);

 	$sql = "SELECT * FROM users WHERE username = '$username'";
 	$result = mysqli_query($con, $sql);
 	confirm_query($result);
 	if(mysqli_num_rows($result) > 0){
 		$row = mysqli_fetch_assoc($result);
 		$db_password = $row['password'];
 		$user_role = $row['user_role'];

 		if(password_verify($password, $db_password)){
 			$_SESSION['username'] = $username;
 			$_SESSION['user_role'] = $user_role;
 			header('location:../admin/index.php');
 		}
 		else{
	 		header('location:../index.php');
	 	}

 	}else{
 		header('location:../index.php');
 	}
 }
 else{
 	header('location:../index.php');
 }
 
  ?>