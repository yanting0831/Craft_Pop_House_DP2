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
	<link rel="stylesheet" type="text/css" href="styles/Login.css">
	
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
<div class="container-fluid bg" >

	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
		<div class="col-md-4 col-sm-4 col-xs-12">
		
		<form class="form-container" method="POST" action="login.php">
		<h1> Login </h1>
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" name="email"  class="form-control" required="required" id="exampleInputEmail1" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" required="required" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			<button type="submit" name="login_button" class="btn btn-success btn-block">Submit</button>
		</form>
		
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
	</div>
	</div>

	<?php
		include "includes/footer.php";
	?>
	
	
</body>
</html>