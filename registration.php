<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">
<head> 
	<title>Craft Pop House</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="styles/register.css">
	<meta name="description" content="Web Development">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="author" content="Eric Kong">
	 
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
	
	<!--<h1> Registration Form </h1>
		<div class="box">

		<form action="/action_page.php">

			<input type="radio" id="buyer" name="user">
			<label for="buyer">I'm buyer</label>
			<input type="radio" id="seller" name="user">
			<label for="seller">I'm seller</label>

			
			<img src="images/bag4.jpg"alt="handicraft"/>
			<label><input type="text" class="nameline" placeholder="Your Name" name="Uname" required="required" ,maxlength="15"/> </label>
			<p><label><input type="text"  placeholder="Your Email" class="nameline "name="Uemail" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/> </label></p>
			<p><label><input type="tel"class="nameline" name="Ucontact"  placeholder="Contact" placeholder="012-345-6789" pattern="\(\d{2}\) +\d{3}-\d{4}" required="required"/> </label></p>
			<p><label><input type="Password" class="nameline"	name="Upassword" required="required" placeholder="Enter Passwords" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  uppercase and one number and lowercase letter, and at least 8 or more characters"/></label></p>
			<p><label><input type="Password" class="nameline "name="Rpassword" required="required" placeholder="Reconfirm Passwords"/></label></p>
			
			<input type="checkbox" id="Agreement">
			<label for="Agreement">I have read and understood Craft Pop House's Terms and Conditions</label>
			<button type="submit" class="registerbtn">Register</button>
			 <p class="Aacount">Already have an account? <a href="#">Sign in</a>.</p>
		</form>
	</div>-->
	
	<form id="landing" action="registration.php" method="POST">
		<div class="container">
			<h1>Registration page</h1>			
			<hr>
			
			<label for="username"><b>Username:  </b></label>
			<input type="text" placeholder="Enter Your User ID" name="username">
			
			<label for="email"><b>Email address  (as login ID):</b></label>
			<input type="email" placeholder="Enter Your Email Address" name="email">
			
			<label for="password"><b>Password: </b></label>
			<input type="password" name="password"></p>
			
			<label for="password"><b>Confirm password: </b></label>
			<input type="password" name="confirm_password"></p>
			
			<input type="submit" class="registerbtn" value="Register" name="register_button">
			
			<input type="reset" class="resetbtn" value="Reset" name="reset_button">
			
			<?php echo display_error(); ?>
		</div>
	</form>	
	
	<?php
		include "includes/footer.php";
	?>	

</body>
</html>
	
	
	