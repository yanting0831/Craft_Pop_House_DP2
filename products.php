<?php
	include("function.php");
	include("functions.php");
	//error_reporting(0);
	//ini_set('display_errors', 0);
	
	require_once('includes/component.php');
	
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
    <script src="includes/jquery-3.2.1.min.js"></script>
    <style type="text/css">
    	.alert, #loader {
    	display: none;
		}
		.glyphicon, #itemCount {
    	font-size: 18px;
		}
    }
    </style>
</head>
<body>
	<br>
	<br><br><br><br>
	<?php
		include "includes/nav_header.php";
	?>

	<div class="container">
		<?php 
			require_once('includes/DbConnect.php');
            $db   = new DbConnect();
            $conn = $db->connect();

			require 'classes/users.class.php';
	    	$objUser = new user($conn);
	    	$objUser->setEmail($_SESSION['user']['email']);
	    	$user = $objUser->getUserByEmailId();
	    	$_SESSION['cid'] = $user['id'];
			
			//print_r($cartItems);
		?>
		
		<div id="content">
			<div class='container'>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="alert alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
							<div id="result"></div>
						</div>
						<center><img src="images/loader.gif" id="loader"></center>
					</div>
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="code.php">Home</a></li>
						<li>Products</li>
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
						
							require 'classes/products.class.php';
							
							$objProduct = new product($conn);
							$products = $objProduct->getAllProducts();
							foreach ($products as $key => $product){
								if(!isset($_GET['category'])){
									$test = $product['seller_id'];
									$db = mysqli_connect('localhost', 'root', '', 'cph');
									$query = "SELECT * FROM users where id='$test'";
									$results = mysqli_query($db, $query);
									//define how many results you want per page
									$per_page=6;
									
							?>
							<div class="col-sm-6 col-md-4">
								<div class="thumbnail">
								  <img src="images/<?= $product['product_img']; ?>" alt="" style="width: 200px; height: 200px;">
								  <div class="caption">
									<h3><?= $product['product_title']; ?></h3>
									<?php 
										while ($rows=mysqli_fetch_array($results)){
											$a = $rows['username'];
											echo "<p>Seller UserName: $a</p>";
										} ?>
									<p>
										<div class="row">
											<div class="col-sm-6 col-md-6">
												<strong> <span style="font-size: 18px;">RM</span><?= number_format( $product['product_price'], 2 ); ?></strong>
											</div>
											<div class="col-sm-6 col-md-6">
												<?php
													$disButton = "";
													if( array_search($product['product_id'], array_column($cartItems, 'pid')) !==false ) {
														$disButton = "disabled";
													}
												 ?>

												<button id="cartBtn_<?=$product['product_id'];?>" <?php echo $disButton; ?> class="btn btn-success" onclick="addToCart(<?=$product['product_id'];?>, this.id); check_login(); " role="button">Book Seat</button>
											</div>
										</div>
									</p>
								  </div>
								  
								</div>
					
							  </div>
							  
							  
							<?php }} ?>
						
							
						</div>
						<center>
							<ul class="pagination">
							<?php 
							$per_page=6;
								$conn = mysqli_connect('localhost','root','','cph');
								$query = "SELECT * FROM products";
								$result = mysqli_query($conn,$query);
								$total = mysqli_num_rows($result);
								$num_pages = ceil($total / $per_page);
								
								//determine which page number visitor is currently on
								if(!isset($_GET['page']))
								{
									$page = 1;
								}
								else
								{
									$page = $_GET['page'];
								}
								
								//determine the sql limit starting number for the results on the displaying page
								$this_page_first_result = ($page-1)*$per_page;
								
								//retrieve selected results from database and display them on page
								
								
								echo " 
								<li>
									<a href='products.php?page=1'>".'First Page'."</a>
									
								</li>
								";
								
								//display the links to the pages
								for ($page=1; $page<=$num_pages; $page++){
									echo " 
								<li>
									<a href='products.php?page=" . $page . "'>" . $page . "</a>
									
								</li>
								";
								};
								
								echo " 
								<li>
									<a href='products.php?page=$num_pages'>".'Last Page'."</a>
									
								</li>
								";
								
								
								?>
								</ul>
						</center>
						
						<?php getCategoryCO();?>
						
						
				</div>
				
				
				</div>		
				
			</div>	
			
		</div>
		
	</div>


	<?php
		include "includes/footer.php";
	?>
</body>

<script type="text/javascript">
	function addToCart(pId, btnId) {
		
		$('#loader').show();
		$.ajax({
			url: "action.php",
			data: "pId=" + pId + "&action=add",
			method: "post"
		}).done(function(response) {
			var data = JSON.parse(response);
			$('#loader').hide();
			$('.alert').show();
			if(data.status == 0) {
				$('.alert').addClass('alert-danger');
				$('#result').html(data.msg);
			} else {
				$('.alert').addClass('alert-success');
				$('#result').html(data.msg);
				$('#'+btnId).prop('disabled',true);
				$('#itemCount').text( parseInt( $('#itemCount').text() ) + 1);
			}
			
		})
	}
	
	function check_login()
	{
		var result ="<?php isLoggedIn();?>";
		if(result)
		{
			alert(result);
			window.location.href="login.php";
		}
	}
	
</script>
</html>