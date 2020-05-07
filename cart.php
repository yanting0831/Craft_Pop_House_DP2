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
	
	//create database connection object
	$conn = new mysqli('localhost','root','','cph');
	
	if($conn === false)
	{
		die ("Error: Could not connect. " . mysqli_connect_error());
	}
	
	//select database
	mysqli_select_db ($conn , 'cph') or die (mysqli_connect_error);
	
	//print_r ($_SESSION['cart']);
	
	$status_msg="";
	$input_valid_flag = true;
	//when add button is pressed
	if (isset($_POST['update']))
	{	
		/*foreach($_SESSION['cart'] as $key => $values)
		{
			if($values['item_name'] == $product_name)
			{	
				$_SESSION['cart'][$key]['item_quantity'] = $_SESSION['cart'][$key]['item_quantity'] + $values['item_quantity'];
			}
			//echo $_SESSION['cart'][$key]['product_id'];
			echo $_SESSION['cart'][$key]['item_quantity'];
			//echo $values['item_quantity'];
		}*/
		
		if($input_valid_flag == true)
		{	
			//sanitize the input data
			$updateQty = mysqli_escape_string($conn, $_POST["updateQty"]);
			
			//Return the values from a single column in the input array
			$product_id = array_column($_SESSION['cart'], 'product_id');
			$item_quantity = array_column($_SESSION['cart'], 'item_quantity');
			
			//implode to convert array to string
			$string_id = implode("", $product_id);
			
			//select data from database
			$get_product= "select * from products";
			$run_products= mysqli_query($conn,$get_product);
			
			if($row_products = mysqli_fetch_assoc($run_products))
			{
				foreach ($product_id as $id)
				{
					//echo $id."<br>";
					echo ($row_products['product_id']."<br>");
					
					if ($row_products['product_id'] == $id)
					{
						//echo $id."<br>";
						//echo $row_products['product_id'];
						//echo $product_id;
						
						//update the database table content
						$sql = "UPDATE products SET product_quantity='$updateQty' WHERE product_id='$id'";
						
						$result = mysqli_query($conn, $sql);
			
						if($result)
						{
							$status_msg = '<h3 style="color:green">Quantity Updated!.</h3>';
						}
						else
						{
							$status_msg = "Error: " . mysql_error();
						}	
					}
				}
			}
			//update the database table content
			//$sql = "UPDATE products SET product_quantity='$quantity' WHERE product_id='$string_id'";
			
			//echo $string_id."<br>";
			//echo $updateQty;
			
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
						//Return the values from a single column in the input array
						$product_id = array_column($_SESSION['cart'], 'product_id');
						$item_quantity = array_column($_SESSION['cart'], 'item_quantity');
						$product_price = array_column($_SESSION['cart'], 'product_price');
						$product_name = array_column($_SESSION['cart'], 'item_name');
						
						//select data from database
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
						
						foreach($_SESSION["cart"] as $key => $value)
						{
							$total = $total + ($value["item_quantity"] * $value["product_price"]);
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
							<br>

							<!-- Payment -->
							<div id="paypal-button-container"></div>

							<!-- Include the PayPal JavaScript SDK -->
							<script src="https://www.paypal.com/sdk/js?client-id=AVJ4ZM21sgUqwIJ75Dc8t1-9RBATky7G59n_XlBKu_vJAtYM9lZNYIN2kajResP-8Hf7fJDZLJ7D_OuC&currency=MYR"></script>

							<script type="text/javascript">
								var total = <?php echo json_encode($total); ?>;					    		
							</script>

							<script>
								// Render the PayPal button into #paypal-button-container
								paypal.Buttons({
									style: {
										layout: 'horizontal'
									},
									
									// Set up the transaction
									createOrder: function(data, actions) {
										return actions.order.create({
											purchase_units: [{
												amount: {
													value: total
												}
											}]
										});
									},

									// Finalize the transaction
									onApprove: function(data, actions) {
										return actions.order.capture().then(function(details) {
											// Show a success message to the buyer
											alert('Transaction completed by ' + details.payer.name.given_name + '!');
										});
									}
									
								}).render('#paypal-button-container');
							</script>

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
			<div class="details col-md-5 offset-md-1 table-bordered mt-5 bg-white h-25">
				<p> Quantity </p>
				<div class="pt-4">
				<form action="cart.php" method="POST">
					
					<div class="col-md-12">
						<?php
							$connection = mysqli_connect('localhost','root','','cph');
							
							$get_products = "select * from products";
		
							$run_products = mysqli_query($connection,$get_products);
							
							while($row_products = mysqli_fetch_array($run_products))
							{
								$product_quantity = $row_products['product_quantity'];
								$product_name = $row_products['product_title'];
								echo $product_name;
								echo "<input class='form-control w-25 d-inline' type='text' name='updateQty' value='$product_quantity'>";
							}
							
							/*foreach($_SESSION['cart'] as $key => $value)
							{
								echo "<p> Product Name: ".$value['item_name']."</p>";
								echo "<input class='form-control w-25 d-inline' type='text' name='updateQty' value='".$value['item_quantity']."'>";
								
							}*/
							
						?>
						<input type='submit' name='update' value='Update' class='btn btn-warning'>
					</div>
					
				</form>
				
				</div>
				
			</div>
			
		</div>
	</div>
	<p><?php echo $status_msg; ?></p>
	<?php
		include "includes/footer.php";
	?>

</body>
</html>