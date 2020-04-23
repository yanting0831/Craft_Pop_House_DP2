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
		<li class="breadcrumb-item"><a href="#">Wood Crafting</a></li>
		<li class="breadcrumb-item active" aria-current="page">3-D Miniatures</li>
	  </ol>
	</nav>
	
	<div class="soap">
		<img src="images/wood-1.jpg" alt="handicraft soap" class="lion king">
		<h2>The Lion King</h2>
		<p>The art pieces are all hand assembled with the finest wood veneer.</p>
		<p><b>Material:</b> Wood Veneer</p>
		<p><b>Weight:</b> 5kg(Approx)</p>
		<p><b>Dimension(s):</b> 64.5cm x 42.5cm x 20.0cm</p>
		<p>RM150.00</p>
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
				<img class="card-img-top" src="images/wood-2.jpg" alt="wolves">
					<div class="caption">
					<h3>The Wolves</h3>
					<p>The art pieces are all hand assembled with the finest wood veneer.</p>
					<p><b>Material: </b> Wood Veneer</p>
					<p><b>Weight:</b> 1.7kg(Approx)</p>
					<p><b>Dimension(s):</b>41.0 x 15.5 x 19.0cm</p>
					<p class="price">RM120.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-8 col-xm-12">
				<div class="thumbnail">
				<img src="images/wood-3.jpg" alt="owl">
					<div class="caption">
					<h3>The Owl</h3>
					<p>The art pieces are all hand assembled with the finest wood veneer.</p>			
					<p><b>Material:</b> Wood Veneer</p>
					<p><b>Weight:</b> 1kg(Approx)</p>
					<p><b>Dimension(s):</b> 25.2cm x 22.3cm x 36.5cm</p>
					<p class="price">RM95.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-8 col-xm-12">
				<div class="thumbnail">
				<img src="images/wood-4.jpg" alt="piano">
					<div class="caption">
					<h3>The Grand Piano</h3>
					<p>The art pieces are all hand assembled with the finest wood veneer.</p>
					<p><b>Material:</b> Wood Veneer</p>
					<p><b>Weight:</b> 200gm(Approx)</p>
					<p><b>Dimension(s):</b> 8.5cm x 8.5cm x 10cm</p>
					<p class="price">RM85.00</p>
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