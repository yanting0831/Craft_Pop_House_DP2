<?php
	include("function.php");
	include("functions.php");
	include "includes/nav_header.php";
	error_reporting(0);
	ini_set('display_errors', 0);
	

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

  <div id="content">
    <div class='container'>
      
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a></li>
            <li>Product</li>
        </ul>
      </div>
      
      <div class="col-md-3">
        <?php 
        
          include("includes/sidebar.php");
        
        ?>
      </div>
      
      <div class="col-md-9">

        <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->  
                             <div class="item active">
                                <img class="img-responsive" src="images/<?php echo $product_img; ?>" alt="#">
                             </div>
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box" id ="details"><!-- box Begin -->

                          <!-- Product Title -->
                           <h1 class="text-center"> <?php echo $product_title; ?> </h1>
                           <?php add_cart(); ?>
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->


                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                             <option>1</option>
                                             <option>2</option>
                                             <option>3</option>
                                             <option>4</option>
                                             <option>5</option>
                                          </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               
                               <p class="price">RM <?php echo $product_price; ?></p>
                               
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart" onclick="check_login();"> Add to cart</button></p>

                                                           
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                                             
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->
               


               <div class="box" id="details"><!-- box Begin -->
                       
                       <h4>Product Details</h4>
                   
                   <p>
                       
                       <?php echo $product_description; ?>
                       
                   </p>
                                      
               </div><!-- box Finish -->
                              
           </div><!-- col-md-9 Finish -->
          
      <div class="row">
      
        <?php

          if(!isset($_GET['category']))
          {

            $per_page=6;
            
            if(isset($_GET['page']))
            {
              $page = $_GET['page'];
            }
            else
            {
              
              $page=1;
              $start_form = ($page-1) * $per_page;
              $get_product= "select * from products order by 1 DESC LIMIT $start_form, $per_page";
              $run_products= mysqli_query($connection,$get_product);
              
              while($row_products = mysqli_fetch_assoc($run_products))
                
              {
                $product_id = $row_products['product_id'];
                $product_title = $row_products['product_title'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_img'];                               
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
		subscribe();
	?>
</body>

<script type="text/javascript">
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