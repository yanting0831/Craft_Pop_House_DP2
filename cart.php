<?php

	//start session
	session_start();

	
	require_once("includes/component.php");
	require_once("function.php");

	if (isset($_POST['remove'])){
		if ($_GET['action'] == 'remove'){
			foreach ($_SESSION['cart'] as $key => $value)
			{
				if($value["product_id"] == $_GET['id']){
					unset($_SESSION['cart'][$key]);
					echo "<script>alert('Product has been Removed...!')</script>";
					echo "<script>window.location = 'cart.php'</script>";
				}
			}
		}
	}
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title> Cart </title>
	<meta charset="utf-8">
	<meta name="author" content="Ricky Su">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="description" content="category page">
	<meta name="keywords" content="handicrafts">
	<link rel="stylesheet" type="text/css" href="styles/cart.css">
	
	<!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
</head>

<body class="bg-light">
	<?php
		include "includes/nav_header.php";
	?>
	
	<div class="container-fluid">
		<div class="row px-5">
			<div class="col-md-7">
				<div class="shopping-cart">
					<h3>My Item Basket</h3>
					<hr>

					<?php
					$total = 0;
					if (isset($_SESSION['cart'])){
						$product_id = array_column($_SESSION['cart'], 'product_id');
						$item_quantity = array_column($_SESSION['cart'], 'item_quantity');
						$product_price = array_column($_SESSION['cart'], 'product_price');

						$get_product= "select * from products";
						$run_products= mysqli_query($connection,$get_product);
						
						while($row_products = mysqli_fetch_assoc($run_products))
						{
							foreach ($product_id as $id){
								if ($row_products['product_id'] == $id){
									cartElement($row_products['product_img'], $row_products['product_title'],$row_products['product_price'], $row_products['product_id']);
									
								}
							}
						}
						//print_r ($item_quantity[0]);
						//print_r ($item_quantity[1]);
						//print_r ($item_quantity[2]);
						
						foreach($_SESSION["cart"] as $key => $value)
						{
							$total = $total + ($value["item_quantity"] * $value["product_price"]);
							//echo $value['item_quantity'];
							
						}
						
					}
					else{
						echo "<h5>Cart is Empty</h5>";
					}
					?>

				</div>
			</div>
			
			<div class="details col-md-4 offset-md-1 table-bordered mt-5 bg-white h-25">

				<div class="pt-4">
					<h6>PRICE DETAILS</h6>
					<hr>
					<div class="row price-details">
						<div class="col-md-6">
							<?php
								if (isset($_SESSION['cart'])){
									//keep track of how many products in the shopping cart
									$count  = count($_SESSION['cart']);
									echo "<h6>Price ($count items)</h6>";
								}else{
									echo "<h6>Price (0 items)</h6>";
								}
							?>
							<h6>Delivery Charges</h6>
							<hr>
							<h6>Amount Payable</h6>
							<hr>
							<a href="checkout-form.php" class="btn btn-info <?=($total>1)?"":"disabled"; ?>"><i class="far fa-credit-card"></i>Check Out</a>
						</div>
						
						<div class="col-md-6">
							<h6>$<?php echo $total; ?></h6>
							<h6 class="text-success">FREE</h6>
							<hr>
							<h6>$<?php echo $total;?></h6>
							<hr>
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