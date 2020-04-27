<?php
	//start session
	session_start();

	require_once("includes/productDB.php");
	require_once("includes/component.php");
	
	//create instance of productDB class
	$database = new productDB("Productdb", "Producttb");
	
	if(isset($_POST['add']))
	{
		//print_r($_POST['product_id']);
		if(isset($_SESSION['cart']))
		{
			//print_r($_SESSION['cart']);
			$item_array_id = array_column($_SESSION['cart'], "product_id");
			
			if(in_array($_POST['product_id'], $item_array_id)){
				echo "<script>alert('Product is already added in the cart..!')</script>";
				echo "<script>window.location = 'products.php'</script>";
			}
			else{

				$count = count($_SESSION['cart']);
				$item_array = array(
					'product_id' => $_POST['product_id']
				);

				$_SESSION['cart'][$count] = $item_array;
			}
		}
		else
		{
			$item_array = array(
				//pass the product id
                'product_id' => $_POST['product_id']
			);

			// Create new session variable
			$_SESSION['cart'][0] = $item_array;
			print_r($_SESSION['cart']);
		}
	}
	
?>

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
	
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Our products</li>
	  </ol>
	</nav>
	
	<div class="container"> 
		<h2>Our Products</h2>
			<div class="row text-center py-5">
				<?php
					$result = $database->getData();
					while ($row = mysqli_fetch_assoc($result)){
						component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
					}
				?>
			</div>
			
			
		<!--	<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<form action="products.php" method="post">
					<div class="thumbnail">
					<a href="bag1.php"  data-toggle="tooltip" title="Click to see details">
					<img class="card-img-top" src="images/bag-1.jpg" alt="rattan bag"></a>
						<div class="caption">
							<a href="bag1.php" <h4 data-toggle="tooltip" title="Click to see details">Handmade Rattan Handbag</h4></a>
							<p class="price">RM50.00</p>
							<button type="submit" class="btn btn-primary my-3" name="add">Add to Cart</button>
						</div>
				</form>
			</div>
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="bag2.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/bag-2.jpg" alt="rattan crossbody bag"></a>
					<div class="caption">
					<a href="bag2.php" <h4 data-toggle="tooltip" title="Click to see details">Handmade Rattan Crossbody Bag</h4></a>
					<p class="price">RM45.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="bag3.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/bag-3.jpg" alt=""></a>
					<div class="caption">
					<a href="bag3.php" <h4 data-toggle="tooltip" title="Click to see details">Handmade Top-Handle Bag</h4></a>
					<p class="price">RM40.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="bag4.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/bag-4.jpg" alt="..."></a>
					<div class="caption">
					<a href="bag4.php" <h4 data-toggle="tooltip" title="Click to see details">Handmade Woven Sling Bag</h4></a>
					<p class="price">RM35.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="candle1.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/candle-1.jpg" alt="..."></a>
					<div class="caption">
					<a href="candle1.php" <h4 data-toggle="tooltip" title="Click to see details">All is Bright Jar Candle</h4></a>
					<p class="price">RM45.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
					
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="candle2.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/candle-2.jpg" alt="..."></a>
					<div class="caption">
					<a href="candle2.php" <h4 data-toggle="tooltip" title="Click to see details">Aloe Water Jar Candle</h4></a>
					<p class="price">RM45.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="candle3.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/candle-3.jpg" alt="..."></a>
					<div class="caption">
					<a href="candle3.php" <h4 data-toggle="tooltip" title="Click to see details">Alpine Morning Jar Candle</h4></a>
					<p class="price">RM45.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="candle4.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/candle-4.jpg" alt="..."></a>
					<div class="caption">
					<a href="candle4.php" <h4 data-toggle="tooltip" title="Click to see details">A Calm & Quiet Place Jar Candle</h4></a>
					<p class="price">RM45.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>	
			
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="soap1.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/soap-1.jpg" alt="..."></a>
					<div class="caption">
					<a href="soap1.php" <h4 data-toggle="tooltip" title="Click to see details">Deep Clean Charcoal Soap</h4></a>
					<p class="price">RM15.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="soap2.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/soap-2.jpg" alt="..."></a>
					<div class="caption">
					<a href="soap2.php" <h4 data-toggle="tooltip" title="Click to see details">Apricot Kernel Scrub Soap</h4></a>
					<p class="price">RM25.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="soap3.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/soap-3.jpg" alt="..."></a>
					<div class="caption">
					<a href="soap3.php" <h4 data-toggle="tooltip" title="Click to see details">Chamomile Soap</h4></a>
					<p class="price">RM22.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="soap4.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/soap-4.jpg" alt="..."></a>
					<div class="caption">
					<a href="soap4.php" <h4 data-toggle="tooltip" title="Click to see details">Lavender Oil Soap</h4></a>
					<p class="price">RM20.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="wood1.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/wood-1.jpg" alt="..."></a>
					<div class="caption">
					<a href="wood1.php" <h4 data-toggle="tooltip" title="Click to see details">The Lion King</h4></a>
					<p class="price">RM150.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
				
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="wood2.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/wood-2.jpg" alt="..."></a>
					<div class="caption">
					<a href="wood2.php" <h4 data-toggle="tooltip" title="Click to see details">The Wolves</h4></a>
					<p class="price">RM120.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="wood3.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/wood-3.jpg" alt="..."></a>
					<div class="caption">
					<a href="wood3.php" <h4 data-toggle="tooltip" title="Click to see details">The Owl</h4></a>
					<p class="price">RM95.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-5 col-sm-7 col-xm-11">
				<div class="thumbnail">
				<a href="wood4.php"  data-toggle="tooltip" title="Click to see details">
				<img class="card-img-top" src="images/wood-4.jpg" alt="..."></a>
					<div class="caption">
					<a href="wood4.php" <h4 data-toggle="tooltip" title="Click to see details">The Grand Piano</h4></a>
					<p class="price">RM85.00</p>
					<p><a href="#" class="btn btn-primary" role="button">Add to Basket</a></p>
					</div>
				</div>
			</div>			
		</div> -->
	</div>
	
	<?php
		include "includes/footer.php";
	?>

</body>
</html>