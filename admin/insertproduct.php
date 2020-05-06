<?php
	$connection = mysqli_connect('localhost','root','','cph');	
?>
<?php include('AdminInterface.php') ?>
	<div class="row">
    <div class="col-md-4"></div>
	<div class="col-md-8 bg">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Insert Product </h3>
           </div>
		   
          <!--Seller write the deatil about the product they wish to add in--> 
		  
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   <div class="form-group">
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
							<!--The system will direct drop down the list of category to the seller-->			
							<!--The category list create by admin in the database-->
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
                          <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control"> 
                      </div>   
                   </div>
               </form>  
           </div>  
        </div>
    </div>
	</div>

<!--When the seller press the submit button, the product will add in to the database and display at the buyer side-->
<?php
	if(isset($_POST['submit']))
	{
		$product_title=$_POST['product_title'];
		$product_category=$_POST['product_category'];
		$product_price=$_POST['product_price'];
		$product_description=$_POST['product_description'];
		$product_image=$_FILES['product_image']['name'];
		$temp_name=$_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($temp_name,"images/$product_image");
		$insert_product = "insert into products
		(product_category_id,product_title,product_img,product_price,product_description) values
		('$product_category','$product_title','$product_image','$product_price','$product_description')";
		
		$run_product= mysqli_query($connection,$insert_product);
		
		if($run_product)
		{
			echo "<script>alert('Product has been inserted successfully')</script>";
			echo "<script>window.open('insertproduct.php','_self')</script>";
		}
	}