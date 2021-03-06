<?php
	$connection = mysqli_connect('localhost','root','','cph');	
	include("../functions.php");
?>
<?php include('sellerInterface.php') ?>
	<div class="row">
    
    <div class="col-md-4"></div>
	<div class="col-md-8 bg">
		 <?php 
				
				require_once('../includes/DbConnect.php');
				$db   = new DbConnect();
				$conn = $db->connect();

				require '../classes/users.class.php';
				$objUser = new user($conn);
				$objUser->setEmail($_SESSION['user']['email']);
				$user = $objUser->getUserByEmailId();
				$_SESSION['sid'] = $user['id'];
				//print_r ($_SESSION['sid']);
				//print_r($cartItems);
				
			?>
        
        <div class="panel panel-default">     
           <div class="panel-heading"> 
               <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Insert Product </h3>
           </div>
           
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   <div class="form-group">
				   <input type="hidden" name="seller_id" value="<?= $_SESSION['sid']?>">
                      <label class="col-md-3 control-label"> Product Title </label>
                      <div class="col-md-6">
                          <input name="product_title" type="text" class="form-control" required>
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Product Category </label>
                      <div class="col-md-6">
                          <select name="product_category" class="form-control"><!-- form-control Begin --> 
                              <option> Select a Category Product </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * FROM products_categories";
                              $run_p_cats = mysqli_query($connection,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $product_category_id = $row_p_cats['product_category_id'];
                                  $product_category_title = $row_p_cats['product_category_title'];
                                  
                                  echo "<option value='$product_category_id'> $product_category_title </option>";
                                  
                              }
                              ?>
                              
                          </select>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Product Image </label>    
                      <div class="col-md-6">   
                          <input name="product_image" type="file" class="form-control" required>      
                      </div>
                       
                   </div>
                                    
                   
                   <div class="form-group">       
                      <label class="col-md-3 control-label"> Product Price </label> 
                      <div class="col-md-6"> 
                          <input name="product_price" type="text" class="form-control" required>      
                      </div>
                   </div>
                                     
                   <div class="form-group"> 
                      <label class="col-md-3 control-label"> Product Desc </label> 
                      <div class="col-md-6">   
                          <textarea name="product_description" cols="19" rows="6" class="form-control"></textarea>  
                      </div>  
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label> 
                      <div class="col-md-6">
					  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							  Insert Product
							</button>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Confirm to Insert Product</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									ARE U SURE U WANT TO ADD NEW PRODUCT.
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-primary " data-dismiss="modal">Close</button>
									<input name="submit" value="Insert Product" type="submit" class="btn btn-primary "> 
								  </div>
								</div>
							  </div>
							</div>
                         
                      </div>   
                   </div>
               </form>  
           </div>  
        </div>
    </div>
	</div>


<?php
	if(isset($_POST['submit']))
	{
		$seller_id = $_POST['seller_id'];
		$product_title=$_POST['product_title'];
		$product_category=$_POST['product_category'];
		$product_price=$_POST['product_price'];
		$product_description=$_POST['product_description'];
		$product_image=$_FILES['product_image']['name'];
		$temp_name=$_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($temp_name,"images/$product_image");
		$insert_product = "insert into products
		(seller_id, product_category_id,product_title,product_img,product_price,product_description) values
		('$seller_id','$product_category','$product_title','$product_image','$product_price','$product_description')";
		
		$run_product= mysqli_query($connection,$insert_product);
		
		if($run_product)
		{
			echo "<script>alert('Product has been inserted successfully')</script>";
			echo "<script>window.open('insertproduct.php','_self')</script>";
		}
	}