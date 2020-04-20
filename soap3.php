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
		<li class="breadcrumb-item"><a href="#">Hand Crafted Soap</a></li>
		<li class="breadcrumb-item active" aria-current="page">Chamomile Soap</li>
	  </ol>
	</nav>
	
	<div class="soap">
		<img src="images/soap-3.jpg" alt="handicraft soap" class="chamomile">
		<h2>Chamomile Soap</h2>
		<p>Chamomile is traditionally used to relieve skin irritations such as acne, insect bites and itching. To fully distill the benefits of the chamomile flower, we have infused chamomile flowers in olive oil for 2 months before using the oil for soap making.  Suitable for sensitive dry skin.</p>
		<p><b>Ingredients</b>: 2 months infusion of chamomile in olive oil and wheatgerm oil, coconut oil, water, evening primrose oil, palm oil and sodium hydroxide. Adding chamomile powder and essential oils of lavender, tea tree and eucalyptus</p>
		<p><b>Dimension(s):</b> 10cm x 5cm x 1.5cm</p>
		<p>RM22.00</p>
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
				<img class="card-img-top" src="images/soap-1.jpg" alt="...">
					<div class="caption">
					<h3>Deep Clean Charcoal Soap</h3>
					<p>Charcoal detoxifies skin by absorbing oil and impurities that cause acne and blackheads. Shea butter, castor oil & wheat germ oil help to soothen skin and promote scar healing especially for acne.</p>
					<p class="price">RM15.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-8 col-xm-12">
				<div class="thumbnail">
				<img class="card-img-top" src="images/soap-2.jpg" alt="...">
					<div class="caption">
					<h3>Apricot Kernel Scrub Soap</h3>
					<p>A soap which gently exfoliates with apricot kernel powder and is not stripping on the skin. Enjoy it daily with the warm and relaxing scent of lemongrass and rosemary essential oils.</p>
					<p class="price">RM25.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-8 col-xm-12">
				<div class="thumbnail">
				<img src="images/soap-4.jpg" alt="...">
					<div class="caption">
					<h3>Lavender Oil Soap</h3>
					<p>This soap is also superfatted with evening primrose oil to help with skin inflammations, acne and itching.This soap is suitable for normal, sentisive and dry skin types.</p>
					<p class="price">RM20.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>