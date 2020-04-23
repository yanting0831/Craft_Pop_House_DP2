<!DOCTYPE html>

<html lang="en">
<head>
	<title> Product Category </title>
	<meta charset="utf-8">
	<meta name="author" content="Yan Ting">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="description" content="category page">
	<meta name="keywords" content="handicrafts">
	<link rel="stylesheet" type="text/css" href="styles/category.css">
	<link rel="stylesheet" href="
	https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
	<?php
		include "includes/nav_header.php";
	?>
	
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item"><a href="#">Hand Crafted Bags</a></li>
		<li class="breadcrumb-item active" aria-current="page">Handmade Top-Handle Bag</li>
	  </ol>
	</nav>
	
	<div class="soap">
		<img src="images/bag-3.jpg" alt="handicraft soap" class="charcoal">
		<h2>Handmade Top-Handle Bag</h2>
		<p>This traditional rattan made handbag allows you to bring everything in this simplistic and fashion design bag. Get compliments from everyone on the gorgeous gold hardware on this stunning bag.</p>
		<p><b>Dimension(s):</b> 30.5cm × 10cm × 29 cm</p>
		<p>RM40.00</p>
		<form>
			<label for="quantity">Quantity:</label>
			<input type="number" id="quantity" name="quantity" min="0" max="100" step="1" value="1">
			<input type="submit" value="Add to Basket">
		</for>
	</div>
	
	<div class="container">
		<h2>Related Products</h2>
			<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-xm-12">
				<div class="thumbnail">
				<img class="card-img-top" src="images/bag-1.jpg" alt="...">
					<div class="caption">
					<h3>Handmade Rattan Handbag</h3>
					<p>This gorgeous hand crafted rattan handbag by our top designer David allows you to bring everything with you whenever you need to, but fashionably of course! Grab this beautiful hand crafted rattan made for yourself or your loved ones before its too late!<br></br></p>
					<p><b>Dimension(s):</b> 33.5cm × 11cm × 29 cm</p>
					<p class="price">RM50.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-8 col-xm-12">
				<div class="thumbnail">
				<img src="images/bag-2.jpg" alt="...">
					<div class="caption">
					<h3>Handmade Rattan Crossbody Bag</h3>
					<p>A rattan crossbody bag by Craft Pop House, allows you to bring everything with you whenever you need to, but fashionably of course! Get compliments from everyone on the gorgeous gold hardware on this stunning bag.</p>
					<p><b>Dimension(s):</b> 20.5cm × 10cm × 28 cm</p>
					<p class="price">RM45.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-8 col-xm-12">
				<div class="thumbnail">
				<img src="images/bag-4.jpg" alt="...">
					<div class="caption">
					<h3>Handmade Woven Sling Bag</h3>
					<p>This bag designed by Craft Pop House allows you to bring everything with you whenever you need to. Bring this back home, bring it for travelling, shopping or any leisure activities to inspire your friends and family with this casual and nice bag.</p>
					<p><b>Dimension(s):</b> 15.5cm × 14cm × 3cm</p>
					<p class="price">RM35.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
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