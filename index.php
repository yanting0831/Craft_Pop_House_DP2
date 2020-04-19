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
	<link href="styles/homepagestyle.css" rel="stylesheet">
	
	<!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the pae via file://-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respons.min.js"></script>
    <![endif]-->
</head>
<body>

	<?php
		include "nav_header.php";
	?>
	
	<div class="slide_container">
		<slider>
			<slide><p>Slide 1</p></slide>
			<slide><p>Slide 2</p></slide>
			<slide><p>Slide 3</p></slide>
			<slide><p>Slide 4</p></slide>
		</slider>
	</div>
	
	<div class="body_container">
		<hr class="line1">
		<h2> Welcome <h3>
		<p>This is the online shop for handicrafts from all over Malaysia.</p>
		
		<hr class="line2">
		<h3>Featured Products</h3>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<img class="card-img" src="images/1.jpg" style="width: 100%">
					<div class="card-body">
						<h4 class="card title">ASD</h4>
						<p> example </p>
						<a href="#" class="btn btn-primary">See Details</a>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<img class="card-img" src="images/1.jpg" style="width: 100%">
					<div class="card-body">
						<h4 class="card title">ASD</h4>
						<p> example </p>
						<a href="#" class="btn btn-primary">See Details</a>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<img class="card-img" src="images/1.jpg" style="width: 100%">
					<div class="card-body">
						<h4 class="card title">ASD</h4>
						<p> example </p>
						<a href="#" class="btn btn-primary">See Details</a>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<img class="card-img" src="images/1.jpg" style="width: 100%">
					<div class="card-body">
						<h4 class="card title">ASD</h4>
						<p> example </p>
						<a href="#" class="btn btn-primary">See Details</a>
					</div>
					
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-3">
					<img class="card-img" src="images/1.jpg" style="width: 100%">
					<div class="card-body">
						<h4 class="card title">ASD</h4>
						<p> example </p>
						<a href="#" class="btn btn-primary">See Details</a>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<img class="card-img" src="images/1.jpg" style="width: 100%">
					<div class="card-body">
						<h4 class="card title">ASD</h4>
						<p> example </p>
						<a href="#" class="btn btn-primary">See Details</a>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<img class="card-img" src="images/1.jpg" style="width: 100%">
					<div class="card-body">
						<h4 class="card title">ASD</h4>
						<p> example </p>
						<a href="#" class="btn btn-primary">See Details</a>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<img class="card-img" src="images/1.jpg" style="width: 100%">
					<div class="card-body">
						<h4 class="card title">ASD</h4>
						<p> example </p>
						<a href="#" class="btn btn-primary">See Details</a>
					</div>
					
				</div>
				
			</div>
		</div>

		<h3>Featured Blog</h3>
		<div class="container">
			<div class="row">
				<div class="col-md-6"><p>APRIL 19, 2020<p></div>
				<div class="col-md-6"><p>APRIL 19, 2020<p></div>
			</div>
			
			<div class="row">
				<div class="col-md-6"><p>APRIL 19, 2020<p></div>
				
			</div>
			
			<div class="row">
				<div class="col-md-6"><p>APRIL 19, 2020<p></div>
				
			</div>
			
		</div>
	</div>
	
	
	<!-- jQuery - required for Bootstraop's Javascript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plugins file -->
    <script src="js/bootstrap.min.js"></script>
	
	<?php
		include "footer.php";
	?>
</body>

</html>