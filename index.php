<?php 
	include('functions.php');
	
	error_reporting(0);
	ini_set('display_errors', 0);
?>
<?php
	$connection = mysqli_connect('localhost','root','','cph');	
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>Craft Pop House</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Web Development"/>
	<meta name="keywords" content=""/>
	<meta name="author" content="Ricky Su"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="styles/homepagestyle.css" rel="stylesheet" type="text/css">
	<link href="styles/cart.css" rel="stylesheet" type="text/css">
	
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
	
	<!-- notification message -->
	<?php if (isset($_SESSION['success'])) : ?>
		<br/>
		<br/>
		<br/>
		<div class="error success" >
			
			<h3>
				<?php 
					echo $_SESSION['success']; 
					unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>
	<div class="container" id="slider"><!-- container Begin -->
       
       <div class="col-md-12"><!-- col-md-12 Begin -->
           
           <div class="carousel slide bg" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol><!-- carousel-indicators Finish -->
               
               <div class="carousel-inner"><!-- carousel-inner Begin -->
                  
                  <?php 
                   
                   $get_slides = "select * from slide LIMIT 0,1";
                   
                   $run_slides = mysqli_query($connection,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item active'>

                                <img src='images/$slide_image'>

                       </div>
                       
                       ";
                   }
                   
                   $get_slides = "select * from slide LIMIT 1,3";
                   
                   $run_slides = mysqli_query($connection,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item'>
                          <img src='images/$slide_image'>
                       </div>
                       
                       ";
                       
                   }
                   
                   ?>
                   
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
   </div><!-- container Finish -->
		
	

	<!-- This is a seperator
	<div class="seperator">
		<section class="sec">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						
					</div>
				</div>
			</div>
		</section>
	</div>-->
	
	
	<div class="body_container">
		<hr class="line1">
		<h2>Welcome <h3>
		<p>This is the online shop for handicrafts from all over Malaysia.</p>
		
		<hr class="line2">
		<h3>Featured Products</h3>
		<div class="container">
			<div id="firstcol" class="row">
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/bag1.jpg" style="width: 100%">
							<h4 class="card title">Handmade Rattan Handbag</h4>
							<p> RM50.00 </p>
							
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">					
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/bag2.jpg" style="width: 100%">
							<h4 class="card title">Handmade Rattan Crossbody Bag</h4>
							<p> RM45.00 </p>
							
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/candle3.jpg" style="width: 100%">
							<h4 class="card title">Alpine Wooden Jar Candle</h4>
							<p> RM45.00 </p>
							
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/candle4.jpg" style="width: 100%">
							<h4 class="card title">A Calm & Quiet Place Jar Candle</h4>
							<p> RM45.00 </p>
							
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div id="secondcol" class="row">
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/soap1.jpg" style="width: 100%">
							<h4 class="card title">Wood Coal Soap</h4>
							<p> RM15.00 </p>
							
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/soap4.jpg" style="width: 100%">
							<h4 class="card title">Lavender Olive Soap</h4>
							<p> RM20.00 </p>
							
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/wood3.jpg" style="width: 100%">
							<h4 class="card title">The Owl</h4>
							<p> RM95.00 </p>
							
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-8 col-xm-12">
					<div class="card-body">
						<div class="item">
						<img class="card-img" src="images/wood4.jpg" style="width: 100%">
							<h4 class="card title">The Grand Piano</h4>
							<p> RM85.00 </p>
							
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
		
	</div>
	
	
	<?php
		include "includes/footer.php";
		subscribe();
	?>
</body>

</html>