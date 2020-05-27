<?php 
	include('db.php');
	include "includes/nav_header.php";
?>

<?php 
	
	function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// begin add_cart functions ///

function add_cart(){
    
	
    global $connection;
    
    if(isset($_GET['add_cart'])){
		// print_r("Hekko");
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_quantity = $_POST['product_qty'];
     
        
        $check_product = "select * from carts where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($connection,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?product_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into carts (p_id,ip_add,qty) values ('$p_id','$ip_add','$product_quantity')";
            
            $run_query = mysqli_query($connection,$query);
            
            echo "<script>window.open('details.php?product_id=$p_id','_self')</script>";
            
        }
        
    }
    
}
	
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
					<a href='detail.php?product_id=$product_id'>
						<img class='img-responsive' src='images/$product_image/$product_image'>
					</a>
					
					<div class='text'>
						
						<h3> 
							<a href='detail.php?product_id=$product_id'>
								$product_title
								
							</a>
						
						<h3>
						<p class='price'>
							$product_price
							
						</p>
						
						<p class='button'>
							<a class='btn btn-primary' href='detail.php?product_id=$product_id'>
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
		
		if(isset($_GET['category']))
		{
			$category_id=$_GET['category'];
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
										$seller_id= $row_products['seller_id'];
										$product_image = $row_products['product_img'];
										
										 echo "
										<div class='col-md-4 col-sm-6 center-responsive'>
											<div class='product'>
												<a href='details.php?product_id=$product_id'>
													<img class='img-responsive' src='images/$product_image'>
												</a>
												<div class='text'>
													<h3> 
														<a href='details.php?product_id=$product_id'> $product_title
															
														</a>
													<h3>
													<p>Seller id :
													$seller_id
													<p>
													<p >
														RM$product_price
													</p>
													<p class='button'>
														<a class='btn btn-default' href='details.php?product_id=$product_id'>
														View Details
														</a>
														<a class='btn btn-primary' href='details.php?product_id=$product_id'>
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
	
	function subscribe(){

	global $connection;

	if(isset($_POST['subscribe'])){	 
		 $firstname = $_POST['f_name'];
		 $mailto = $_POST['mail'];
		 $sql = "INSERT INTO subscribers (fname, email)
		 VALUES ('$firstname', '$mailto')";
		 if (mysqli_query($connection, $sql)) {
			echo "<script>alert('Subscibe successfully! Thanks for supporting us!');</script>";
		 } else {
			// echo "Error: " . $sql . " " . mysqli_error($connection);
		 }
		 mysqli_close($connection);
	}
}
	

?>	
	
	