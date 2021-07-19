<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
			<title>Login</title>
			<link rel="stylesheet" href="style.css" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		</head>
		<body>
			<?php
				require('config.php');
				session_start();
				// If form submitted, insert values into the database.
				if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($conn,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "
			<div class='form'>
				<h3>Username/password is incorrect.</h3>
				<br/>Click here to 
				<a href='login.php'>Login</a>
			</div>";
				}
    }else{
?>
				<div class="login-wrapper">
					<h1><center>Sign In</center></h1>
					<form action="" method="post" name="login">
					<div class="mb-3">
						<label for="InputForEmail" class="form-label">Username</label>
						<input type="text" name="username" class="form-control" placeholder="Username" required />

					</div>
					<div class="mb-3">
						<label for="InputForPassword" class="form-label">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password" required />
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
					</form>
					<p>Not registered yet? 
						<a href='registration.php'>Register Here</a>
					</p>
				</div>
			</div>
			<?php } ?>
		</body>
	</html>