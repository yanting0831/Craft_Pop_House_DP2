<?php 
  error_reporting(0);
  $active='Cart';
  include('functions.php');
  include("function.php");
  include "includes/nav_header.php";
  session_start();  
  
	if (!isLoggedIn()) {
		display_error();
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
   <br><br><br>

 

   <div id="content"><!-- #content Begin -->
       
            <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <h1>Shopping Cart</h1>
                       
                       <?php 
                       
                         // $ip_add = getRealIpUser();
                         
                         $select_cart = "select * from carts";
                         
                         $run_cart = mysqli_query($connection, $select_cart);
                         
                         $count = mysqli_num_rows($run_cart);
                       
                       ?>
                       
                       <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                       
                       <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               
                               <thead><!-- thead Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th>Product Name</th>
									   <th>Seller ID</th>
                                       <th>Quantity</th>
                                       <th>Unit Price</th>
                                       <th>Delete</th>
                                       <th>Sub-Total</th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </thead><!-- thead Finish -->
                               
                               <tbody><!-- tbody Begin -->
                                  
                                  <?php 
                                   
                                   $total_with_tax = 0;
                                   $total_without_tax = 0;
                                   $tax = 0.05;
                                   
                                   while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                     $pro_id = $row_cart['p_id'];
                                       
                                     $pro_qty = $row_cart['qty'];
                                       
                                       $get_products = "select * from products where product_id='$pro_id'";
                                       
                                       $run_products = mysqli_query($connection, $get_products);
                                       
                                       while($row_products = mysqli_fetch_array($run_products)){
                                           
                                           $product_title = $row_products['product_title'];
                                           
                                           $product_image = $row_products['product_img'];
                                           
                                           $unit_price = $row_products['product_price'];
										   $seller_id = $row_products['seller_id'];

                                           $unitPriceToFloat = number_format((float)$unit_price, 2, '.', '');
                                           
                                           $sub_total = $unitPriceToFloat*$pro_qty;

                                           $subTotalToFloat = number_format((float)$sub_total, 2, '.', '');

                                           $sub_total_tax = $total_without_tax*$tax;

                                           $subTotalTaxToFloat = $subTotalToFloat*$tax;
                              
                                           $total_without_tax += $sub_total;

                                           $totalWithoutTaxToFloat = number_format((float)$total_without_tax, 2, '.', '');

                                           $total_with_tax = $total_with_tax + $subTotalTaxToFloat + $subTotalToFloat;

                                           $_SESSION['total']  = $total_with_tax;

                                      ?>

                                   <tr><!-- tr Begin -->
										<td>
                                           
                                         <?php echo $product_title; ?>

										</td>
										<td>
											<?php echo $seller_id;?>
										</td>
                                       
										<td>
                                          
                                           <?php echo $pro_qty; ?>
                                           
										</td>
                                       
										<td>
                                           
                                            RM <?php echo $unitPriceToFloat; ?>
                                           
										</td>

										<td>
                                           
                                           <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                           
										</td>
                                       
										<td>
                                           
                                          RM <?php echo $subTotalToFloat; ?>
                                           
										</td>
                                       
									</tr><!-- tr Finish -->
                                   
                                   <?php } 

                                 } ?>
                                   
                               </tbody><!-- tbody Finish -->
                               
                               <tfoot><!-- tfoot Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="5">Total</th>
                                       <th colspan="2">RM <?php echo $totalWithoutTaxToFloat; ?></th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </tfoot><!-- tfoot Finish -->
                               
                           </table><!-- table Finish -->
                           
                       </div><!-- table-responsive Finish -->
                       
                       <div class="box-footer"><!-- box-footer Begin -->
                           
                           <div class="pull-left"><!-- pull-left Begin -->
                               
                               <a href="products.php" class="btn btn-default"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-chevron-left"></i> Continue Shopping
                                   
                               </a><!-- btn btn-default Finish -->
                               
                           </div><!-- pull-left Finish -->
                           
                           <div class="pull-right"><!-- pull-right Begin -->
                               
                               <button type="submit" name="update" value="Update Cart" class="btn btn-default"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-refresh"></i> Update Cart
                                   
                               </button><!-- btn btn-default Finish -->
                                   
                               <a href="order.php" class="btn btn-primary">
                                   
                                   Proceed Checkout <i class="fa fa-chevron-right"></i>
                                   
                               </a>
                               
                           </div><!-- pull-right Finish -->
                           
                       </div><!-- box-footer Finish -->
                       
                   </form><!-- form Finish -->
                   
               </div><!-- box Finish -->
               
               <?php 
               
                function update_cart(){
                    
                    global $connection;
                    
                    if(isset($_POST['update'])){
                        
                        foreach($_POST['remove'] as $remove_id){
                            
                            $delete_product = "delete from carts where p_id='$remove_id'";
                            
                            $run_delete = mysqli_query($connection, $delete_product);
                            
                            if($run_delete){
                                
                                echo "<script>window.open('cart.php','_self')</script>";
                                
                            }
                            
                        }
                        
                    }
                    
                }
               
               echo @$up_cart = update_cart();
               
               ?>
                              
           </div><!-- col-md-9 Finish -->
           
		   
		   
           <div class="col-md-3"><!-- col-md-3 Begin -->
               
               <div id="order-summary" class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <h3>Order Summary</h3>
                       
                   </div><!-- box-header Finish -->
                   
                   <p class="text-muted"><!-- text-muted Begin -->
                       
                       Shipping and additional costs are calculated based on value you have entered
                       
                   </p><!-- text-muted Finish -->
                   
                   <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
                           <tbody><!-- tbody Begin -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Order All Sub-Total </td>
                                   <th> RM <?php echo $totalWithoutTaxToFloat; ?> </th> </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Tax (5%) </td>
                                   <th> RM <?php echo number_format((float)$total_without_tax*0.05, 2, ".", '') ?> </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr class="total"><!-- tr Begin -->
                                   
                                   <td> Total </td>
                                   <th> RM <?php echo number_format((float)$total_with_tax, 2, ".", '') ?> </th>
                                   
                               </tr><!-- tr Finish -->
                               
                           </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       
                   </div><!-- table-responsive Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-3 Finish -->  
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
    
</body>
</html>