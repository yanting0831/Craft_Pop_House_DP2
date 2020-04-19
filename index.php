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
	
	<!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the pae via file://-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respons.min.js"></script>
    <![endif]-->
</head>
<body>

	<?php
		include "includes/nav_header.php";
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
			<div id="firstcol" class="row">
				<div class="col-md-3">
					
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/bag1.jpg" style="width: 100%">
							<h4 class="card title">ASD</h4>
							<p> example </p>
							<a href="#" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-md-3">
					
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/bag2.jpg" style="width: 100%">
							<h4 class="card title">ASD</h4>
							<p> example </p>
							<a href="#" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/candle3.jpg" style="width: 100%">
							<h4 class="card title">ASD</h4>
							<p> example </p>
							<a href="#" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/candle4.jpg" style="width: 100%">
							<h4 class="card title">ASD</h4>
							<p> example </p>
							<a href="#" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div id="secondcol" class="row">
				<div class="col-md-3">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/soap1.jpg" style="width: 100%">
							<h4 class="card title">ASD</h4>
							<p> example </p>
							<a href="#" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/soap4.jpg" style="width: 100%">
							<h4 class="card title">ASD</h4>
							<p> example </p>
							<a href="#" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/wood3.jpg" style="width: 100%">
							<h4 class="card title">ASD</h4>
							<p> example </p>
							<a href="#" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-md-3">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/wood4.jpg" style="width: 100%">
							<h4 class="card title">ASD</h4>
							<p> example </p>
							<a href="#" class="btn btn-primary">See Details</a>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>

		<h3 class="blog">Featured Blog</h3>
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
	
	
	<?php
		include "includes/footer.php";
	?>
</body>

</html>