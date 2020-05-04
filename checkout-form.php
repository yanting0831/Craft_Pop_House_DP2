<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8"/>
	<title>Checkout</title>
	<meta name="description" content="Web Development">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="author" content="Yan Ting">
	<link rel="stylesheet" type="text/css" href="styles/checkoutForm.css">
	
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
					<form class="form-container" method="POST" action="checkout_form.php">
						<h1> Checkout Details </h1>
						
						<?php echo display_error(); ?>
						<div class="form-group">
							<label for="firstName">First Name</label>
							<input type="text" name="firstName" required="required" class="form-control" id="fName" placeholder="First Name">
						</div>
						<div class="form-group">
							<label for="lastName">Last Name</label>
							<input type="text" name="lastName"  class="form-control" required="required" id="Lname" placeholder="Last Name">
						</div>
						<div class="form-group">
							<label for="Address">Address</label>
							<input type="text" name="address" required="required" class="form-control" id="address" placeholder="Address">
						</div>
						<div class="form-group">
							<label for="phoneNumber">Phone Number</label>
							<input type="number" name="phoneNo" required="required" class="form-control" id="phoneNo" placeholder="e.g 0123456789">
						</div>
						<button type="submit" name="checkout_btn" class="btn btn-success btn-block">Checkout</button>
						
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