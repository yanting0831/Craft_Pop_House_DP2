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
		<li class="breadcrumb-item"><a href="#">Homemade Jar Candles</a></li>
		<li class="breadcrumb-item active" aria-current="page">A Calm & Quiet Place Jar Candle</li>
	  </ol>
	</nav>
	
	<div class="soap">
		<img src="images/candle-4.jpg" alt="handicraft soap" class="charcoal">
		<h2>A Calm & Quiet Place Jar Candle</h2>
		<p>A meditative fragrance with gentle jasmine, patchouli and amber musk.</p>
		<p><b>Top: </b>Mandarin Leaf</p>
		<p><b>Mid: </b> Jasmine, Cedarwood</p>
		<p><b>Base: </b>Patchouli, Sandalwood, Amber Musk</p>
		<p><b>Burn Time:</b>110 to 150 hours</p>
		<p><b>Weight:</b>22oz</p>
		<p><b>Dimension(s):</b> 10cm × 16.7cm</p>
		<p>RM45.00</p>
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
				<img class="card-img-top" src="images/candle-3.jpg" alt="...">
					<div class="caption">
					<h3>All is Bright Large Jar Candle</h3>
					<p>A blend of sparkling citrus scents drifting on warm musk.</p>
					<br></br>
					<p><b>Fragrance Notes:</b></p>
					<p><b>Top: </b> Grapefruit, Orange</p>
					<p><b>Mid: </b> Red Currant</p>
					<p><b>Base: </b> Sweet Musk</p>
					<p><b>Burn Time:</b> 110 to 150 hours</p>
					<p><b>Weight:</b> 22oz</p>
					<p><b>Dimension(s):</b> 10cm × 16.7cm</p>
					<p class="price">RM45.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-8 col-xm-12">
				<div class="thumbnail">
				<img src="images/candle-2.jpg" alt="...">
					<div class="caption">
					<h3>Aloe Water Jar Candle</h3>
					<p>A sophisticated and soothing blend of florals and subtle fruits. </p>
					<br></br>
					<p><b>Fragrance Notes:</b></p>
					<p><b>Top: </b>Sheer Citrus, Aldehydes, Greens</p>
					<p><b>Mid: </b>Mimosa, Ylang, Jasmine, Rose, Tuberose</p>
					<p><b>Base: </b>Sweet Musk, Sandalwood, Tonka Bean</p>
					<p><b>Burn Time:</b>110 to 150 hours</p>
					<p><b>Weight:</b>22oz</p>
					<p><b>Dimension(s):</b> 10cm × 16.7cm</p>
					<p class="price">RM45.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-8 col-xm-12">
				<div class="thumbnail">
				<img src="images/candle-4.jpg" alt="...">
					<div class="caption">
					<h3>Alpine Morning Jar Candle</h3>
					<p>Wake up to a breath of fresh mountain air: flowers and spice, with a zing of citrus. </p>
					<br></br>
					<p><b>Fragrance Notes:</b></p>
					<p><b>Top: </b>Sheer Citrus, Aldehydes, Greens</p>
					<p><b>Mid: </b>Mimosa, Ylang, Jasmine, Rose, Tuberose</p>
					<p><b>Base: </b>Sweet Musk, Sandalwood, Tonka Bean</p>
					<p><b>Burn Time:</b>110 to 150 hours</p>
					<p><b>Weight:</b>22oz</p>
					<p><b>Dimension(s):</b> 10cm × 16.7cm</p>
					<p class="price">RM45.00</p>
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