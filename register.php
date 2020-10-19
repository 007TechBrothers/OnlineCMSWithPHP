<?php include_once "include_user/header_user.php" ?>
<?php include_once "include_user/nav_user.php" ?>

<?php 
	$message="";
	if(isset($_POST['register'])){
		$username = clean_input($_POST['username']) ;
		$email = clean_input($_POST['email']);
		$password = clean_input($_POST['password']);
		$password = password_hash($password, PASSWORD_BCRYPT, ['Kyite' => true]);

		if(empty($username) || empty($password || empty($email))){
			echo "<script> alert('Fail can not be blank') </script>";
		}else{
			$username = escape($username);
			$email = escape($email);
			$password = escape($password);
			$search_sql = "SELECT username FROM users WHERE username = '$username'";
			$search_res = mysqli_query($con, $search_sql);
			confirm_query($search_res);
			$row = mysqli_fetch_assoc($search_res);
			@$name = $row['username'];
			if(!empty($name)){
				$message = 'Username already exists, Please enter other name';
			}
			else{
				$sql = "INSERT INTO users(username, email, password) 
					VALUES ('$username', '$email', '$password')";
				$result = mysqli_query($con, $sql);
				confirm_query($result);
				$message = "Register Successfully";
			}

			
		}
		
	}

 ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-4 col-md-offset-4">
            	<div class="well">
	            	<form method="post" action="">
	            		<h3 class="text-center">Registration Form</h3>
	            		<legend></legend>
	            		<p class="bg-success">
	            			<?php echo $message; ?>
	            		</p>
	            		<div class="form-group">
	            			<input type="text" placeholder="Please Enter Your Name" name="username" class="form-control">
	            		</div>
	            		<div class="form-group">
	            			<input type="email" placeholder="somebody@example.com" name="email" class="form-control">
	            		</div>
	            		<div class="form-group">
	            			<input type="password" placeholder="Please Enter Your Password" name="password" class="form-control">
	            		</div>
	            		<input type="submit" value="Registration" name="register" class="btn btn-success btn-block">
	            	</form>
            	</div>
            </div>
        </div>
    </div>
