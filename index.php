<?php 
	include('functions.php');
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>Craft Pop House</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Web Development"/>
	<meta name="keywords" content=""/>
	<meta name="author" content="Ricky Su"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="styles/homepagestyle.css" rel="stylesheet" type="text/css">
	<link href="styles/cart.css" rel="stylesheet" type="text/css">
	
	<!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
	
</head>
<body>

	<?php
		include "includes/nav_header.php";
	?>
	
	<!-- notification message -->
	<?php if (isset($_SESSION['success'])) : ?>
		<br/>
		<br/>
		<br/>
		<div class="error success" >
			
			<h3>
				<?php 
					echo $_SESSION['success']; 
					unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>
		
	<div class="slide_container">
		<slider>
			<slide><p>Heritage From Malaysia</p></slide>
			<slide><p>Traditional Carves</p></slide>
			<slide><p>Original Accessories</p></slide>
			<slide><p>Handmade Candles</p></slide>
		</slider>
	</div>

	<!-- This is a seperator-->
	<div class="seperator">
		<section class="sec">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						
					</div>
				</div>
			</div>
		</section>
	</div>
	<!--End of seperator -->
	
	<div class="body_container">
		<hr class="line1">
		<h2>Welcome <h3>
		<p>This is the online shop for handicrafts from all over Malaysia.</p>
		
		<hr class="line2">
		<h3>Featured Products</h3>
		<div class="container">
			<div id="firstcol" class="row">
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/bag1.jpg" style="width: 100%">
							<h4 class="card title">Handmade Rattan Handbag</h4>
							<p> RM50.00 </p>
							<a href="bag1.php" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">					
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/bag2.jpg" style="width: 100%">
							<h4 class="card title">Handmade Rattan Crossbody Bag</h4>
							<p> RM45.00 </p>
							<a href="bag2.php" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/candle3.jpg" style="width: 100%">
							<h4 class="card title">Alpine Morning Original Jar Candle</h4>
							<p> RM45.00 </p>
							<a href="candle3.php" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/candle4.jpg" style="width: 100%">
							<h4 class="card title">A Calm & Quiet Place Jar Candle</h4>
							<p> RM45.00 </p>
							<a href="candle4.php" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div id="secondcol" class="row">
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/soap1.jpg" style="width: 100%">
							<h4 class="card title">Deep Charcoal Soap</h4>
							<p> RM15.00 </p>
							<a href="soap1.php" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/soap4.jpg" style="width: 100%">
							<h4 class="card title">Lavender Olive Soap</h4>
							<p> RM20.00 </p>
							<a href="soap4.php" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/wood3.jpg" style="width: 100%">
							<h4 class="card title">The Owl</h4>
							<p> RM95.00 </p>
							<a href="wood3.php" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/wood4.jpg" style="width: 100%">
							<h4 class="card title">The Grand Piano</h4>
							<p> RM85.00 </p>
							<a href="wood4.php" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
		
	</div>
	
	
	<?php
		include "includes/footer.php";
	?>
</body>

</html>