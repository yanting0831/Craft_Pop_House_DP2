<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8"/>
	<title> Login Account</title>
	<!--<link rel="stylesheet" type="text/css" href="styles/Login.css">-->
	<meta name="description" content="Web Development">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="author" content="Eric Kong">
	<link rel="stylesheet" type="text/css" href="styles/register.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

	<?php
		include "includes/nav_header.php";
	?>	
	
	<!--<div class="box">
	<img src="images/avatar.jpg" id="avatar">
		<h1>Login Account </h1>
			<form>
				<p>Email</p>
				<input type="text" class="nameline "name="Uemail" required="required" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/>
				<p>Password</p>
				<input type="password" class="Passwordline "name="Upassword" placeholder="Enter Password" required="required"/>
				<p><input type="submit" name="submit" class="login"></p>
				<a href="file:///D:/Xampp/htdocs/Craft_Pop_House_DP2/registration.html">Don't have an account?</a>
			</form>
	
	</div>
	-->
	<form action="login.php" method="POST">
	<div class="container">
		<h1>Login Page</h1>
		<label for="email"><b>Email address  (as login ID):</b></label>
		<input type="email" placeholder="Enter Your Email Address" name="email">
		
		<label for="password"><b>Password: </b></label>
		<input type="password" name="password"></p>
		
		<input type="submit" class="registerbtn" value="Login" name="login_button">
			
		<input type="reset" class="resetbtn" value="Reset" name="reset_button">
		<?php echo display_error(); ?>
	</div>
	
	<?php
		include "includes/footer.php";
	?>	

	
</body>