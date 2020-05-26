<?php 

	$connection=mysqli_connect('localhost','root','','cph');	
	
	function getPro()
	{
		global $connection;
		
		$get_products = "select * from products order by 1 DESC LIMIT 0,8";
		
		$run_products =mysqli_query($connection,$get_products);
		
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
							<a class='btn btn-default' href='#'>
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
	
	function getCategory()
	{
		global $connection;
		
		$get_category = "select * from products_categories";
		
		$run_category =mysqli_query($connection,$get_category);
		
		while($row_category=mysqli_fetch_array($run_category))
		{
			
			$category_id = $row_category['product_category_id'];
			$category_title = $row_category['product_category_title'];
			
			echo " 
				
				<li> 
					<a href='products.php?category=$category_id'>$category_title</a>
					
				</li>
			";
		}
	}
	
	function getCategoryCO()
	{
		global $connection;
		require_once('includes/DbConnect.php');
		$db   = new DbConnect();
		$conn = $db->connect();
		
		if(isset($_GET['category']))
		{
			$category_id = $_GET['category'];
			$get_category_id ="select * from products_categories where product_category_id='$category_id'";
			$run_category=mysqli_query($connection,$get_category_id);
			$row_category=mysqli_fetch_array($run_category);
			$category_title = $row_category['product_category_title'];
			$category_desc = $row_category['product_category_desc'];
			
			$get_products="select * from products where product_category_id='$category_id'";
			$run_products= mysqli_query($connection,$get_products);
			$count=mysqli_num_rows($run_products);
			
			if($count==0)
			{
				echo " 
					<div class='box'>
						<h1> No Product In This Category</h1>
					</div>
					";
			}
			else
			{
				echo "
					<div class='box'>
						<h1>$category_title</h1>
						<p>$category_desc</p>
						
					</div>
					";
			}
			while($row_products=mysqli_fetch_array($run_products))
			{
				$product_id = $row_products['product_id'];
				$product_title = $row_products['product_title'];
				$product_price = $row_products['product_price'];
				$product_image = $row_products['product_img'];
				
			?>
				
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
						  <img src="images/<?= $row_products['product_img']; ?>" alt="" style="width: 200px; height: 200px;">
						  <div class="caption">
							<h3><?= $row_products['product_title']; ?></h3>
							
							<?php
							$db = mysqli_connect('localhost', 'root', '', 'cph');
							$test = $row_products['seller_id'];
							$query = "SELECT * FROM users where id='$test'";
							$results = mysqli_query($db, $query);
							while ($rows=mysqli_fetch_array($results)){
								$a = $rows['username'];
								echo "<p>Seller UserName: $a</p>";
							} ?>
							
							<p>
								<div class="row">
									<div class="col-sm-6 col-md-6">
										<strong> <span style="font-size: 18px;">RM</span><?= number_format( $row_products['product_price'], 2 ); ?></strong>
									</div>
									<div class="col-sm-6 col-md-6">
										<?php	
										
											$disButton = "";
											
										 ?>

										<button id="cartBtn_<?=$row_products['product_id'];?>" <?php echo $disButton; ?> class="btn btn-success" onclick="addToCart(<?=$row_products['product_id'];?>, this.id); check_login(); " role="button">Add To Cart</button>
									</div>
								</div>
							</p>
						  </div>
						</div>
					</div>
		<?php	}
		}
	}	
?>	
	