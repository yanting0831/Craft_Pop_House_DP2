<?php
	include("function.php");
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
								while($row_products=mysqli_fetch_array($run_products))
									
									{
										$product_id = $row_products['product_id'];
										$product_title = $row_products['product_title'];
										$product_price = $row_products['product_price'];
										$product_image = $row_products['product_img'];
										
										 echo "
										<div class='col-md-4 col-sm-6 center-responsive'>
											<div class='product'>
												<a href = '#'>
													<img class='img-responsive' src='images/$product_image'>
												</a>
												<div class='text'>
													<h3> 
														<a href='#'>
															$product_title
														</a>
													<h3>
													<p class='price'>
														$product_price
													</p>
													<p class='button'>
														<a class='btn btn-default' href=''>
														View Details
														</a>
														<a class='btn btn-primary' href='#'>
															<i class='fa fa-shopping-cart'></i>Add to Cart
														</a>
													</p>
													
												</div>
											</div>
										</div>
									";
										
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