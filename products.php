<?php
	include("function.php");
	
	session_start();
	
	require_once('includes/component.php');
	
	if (isset($_POST['add']))
	{
		//print_r($_POST['product_id']);
		if(isset($_SESSION['cart'])){

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
	else{

        $item_array = array(
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
							$per_page=6;
							
							if(isset($_GET['page']))
							{
								$page = $_GET['page'];
							}
								else{
									$page=1;
								$start_form =($page-1) * $per_page;
								$get_product= "select * from products order by 1 DESC LIMIT $start_form,$per_page";
								$run_products= mysqli_query($connection,$get_product);
								
								while($row_products = mysqli_fetch_assoc($run_products))
									
								{
									
									$product_id = $row_products['product_id'];
									$product_title = $row_products['product_title'];
									$product_price = $row_products['product_price'];
									$product_image = $row_products['product_img'];
									
									component($row_products['product_title'], $row_products['product_price'], $row_products['product_img'], $row_products['product_id']);
										
								}
							}
						}
					?>
					</div>	
					<?php getCategoryCO();?>
			</div>
					
		</div>	
	</div>
	
	<?php
		include "includes/footer.php";
	?>
</body>
</html>