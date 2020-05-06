<?php
	include("function.php");
	
	session_start();
	
	require_once('includes/component.php');
	
	$conn = new mysqli('localhost','root','','cph');
	
	if($conn === false)
	{
		die ("Error: Could not connect. " . mysqli_connect_error());
	}
	
	//select database
	mysqli_select_db ($conn , 'cph') or die (mysqli_connect_error);
	
	$status_msg="";
	$input_valid_flag = true;
	//when add button is pressed
	if (isset($_POST['add']))
	{	
		if($input_valid_flag == true)
		{
			//sanitize the input data
			$quantity = mysqli_escape_string($conn, $_POST["quantity"]);
			$product_id = mysqli_escape_string($conn, $_POST['product_id']);

			//update the database table content
			$sql = "UPDATE products SET product_quantity='$quantity' WHERE product_id='$product_id'";
			
			$result = mysqli_query($conn, $sql);
			
			if($result)
			{
				$status_msg = '<h3 style="color:green">Quantity Added!.</h3>';
			}
			else
			{
				$status_msg = "Error: " . mysql_error();
			}
		
		}
		
		if(isset($_SESSION['cart'])){

			$item_array_id = array_column($_SESSION['cart'], "product_id");

			//check if product_id is already in the array
			if(in_array($_POST['product_id'], $item_array_id))
			{
				echo "<script>alert('Product is already added in the cart..!')</script>";
				echo "<script>window.location = 'products.php'</script>";
				
			}
			else
			{
				$count = count($_SESSION['cart']);
				$item_array = array(
					'product_id' => $_POST['product_id'],
					'item_name' => $_POST["hidden_name"],
					'item_quantity' => $_POST['quantity'],
					'product_price' => $_POST['hidden_price']
				);
					
				$_SESSION['cart'][$count] = $item_array;
			}
    }
	else{		
       $item_array = array(
			'product_id' => $_POST['product_id'],
			'item_name' => $_POST["hidden_name"],
			'item_quantity' => $_POST['quantity'],
			'product_price' => $_POST['hidden_price']
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
	<link href="styles/cart.css" rel="stylesheet" type="text/css">
	<!--Bootstrap CDN-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
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
			
			<div class="col-md-9">
				<?php
					
					if(!isset($_GET['category'])){
					
					echo "
					
					<div class='box'>
						<h1>Our Products</h1>
					</div>
					";
					}
				?>
					<div class="row">
					
					<?php
						if(!isset($_GET['category'])){
							
								$get_product= "select * from products ";
								$run_products= mysqli_query($connection,$get_product);
								
								while($row_products = mysqli_fetch_assoc($run_products))
									
								{
									$product_id = $row_products['product_id'];
									$product_title = $row_products['product_title'];
									$product_price = $row_products['product_price'];
									$product_image = $row_products['product_img'];
									
									echo "
										<div class='col-md-4 col-sm-6 center-responsive'>
											<form action='products.php' method='post'>
												<div class='product'>
													<a href = '#?id=<?php echo $product_id ?>'>
														<img class='img-responsive' src='images/$product_image'>
													</a>
													<div class='text'>
														<h3> 
															<a href='#?id=<?php echo $product_id ?>'>
																$product_title
															</a>
														<h3>
														<p class='price'>
															$$product_price
														</p>
														<p class='button'>
															<input name=\"quantity\" type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">

															<!--a class='btn btn-default' href='details.php?id=<?php echo $product_id ?-->

															<a class='btn btn-default' href='#'>
															View Details
															</a>
															<button type='submit' class='btn btn-primary' name='add'>Add to Cart <i class='fas fa-shopping-cart'></i></button>
															<input type='hidden' name='product_id' value='$product_id'>
															<input type='hidden' name='hidden_price' value='$product_price'>
															<input type='hidden' name='hidden_name' value='$product_title'>
														</p>
														
													</div>
												</div>
											</form>
										
									</div>";
										
								}
							}
						
						
					?>
					</div>	
					<?php getCategoryCO();?>
			</div>
					
		</div>	
	</div>
	<p><?php echo $status_msg; ?></p>
	<?php
		include "includes/footer.php";
	?>
</body>
</html>