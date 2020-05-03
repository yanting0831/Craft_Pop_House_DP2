<?php
	//start session
	include("function.php");

	require_once("includes/component.php");
	
	//create instance of productDB class
	$database = new product("cph", "products");
	
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
	<meta name="author" content="Eric Kong, Yan Ting">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="description" content="category page">
	<meta name="keywords" content="handicrafts">
	<link rel="stylesheet" type="text/css" href="styles/category.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<br>
	<?php
		include "includes/nav_header.php";
	?>
	<div id="content">
		<div class='container'>
			
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="code.php">Home</a></li>
					<li>Product</li>
				</ul>
			</div>
			
			<div class="col-md-3">
				<?php 
				
				include("includes/sidebar.php");
				
				?>
			</div>
			
			<div class="col-sm-9" padding-rght>
				<div class="sfeatures-items">
					<h2 class="title text-center">Features Items</h2>

					<?php 
					$res=mysqli_query($connection, "select * from products");
					while($row=mysql_fetch_array($res))
					?>

					<div class="col-sm-4"></div>
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/bag-1.jpg" alt=""/>
								<h2>product price</h2>
								<p>Product info</p>
								<a href="#" class="btn btn-default add-tot-cart">Add to Basket</a>
							</div>

							<div class="product-overlay">
								<div class="overlay-content">
									<h2>product price</h2>
									<p>Product info</p>
									<a href="#" class="btn btn-default add-tot-cart">Add to Basket</a>		
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