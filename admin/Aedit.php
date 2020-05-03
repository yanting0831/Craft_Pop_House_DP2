	
	<?php include('AdminInterface.php') ?>
	
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-3"></div>
			<div class="col-md-8 bg">
				<div class="mb-4">
					<h6>Edit Product</h6>
									
					<?php
					$connection= mysqli_connect('localhost','root','','cph');
						if(isset($_POST['edit_btn']))
						{
							$product_id=$_POST['edit_id'];
							
							$query ="SELECT * FROM products WHERE product_id ='$product_id' ";
							$query_run =mysqli_query($connection,$query);
							
							foreach($query_run as $row)
							{
								?>
									<form action="AProductCode.php" method="POST">
									
										<input type="hidden" name="edit_product_id" value="<?php echo $row['product_id']?>";
										<input type="hidden" name="edit_category_id" value="<?php echo $row['product_category_id']?>";
										<div class="form-group">
											<label>Product Name</label>
											<input type="text" name="edit_product_name" value="<?php echo $row['product_title']?>" placeholder="Enter Product Name" class="form-control">
										  </div>
										  <div class="form-group">
											<label>Product Category</label>
												<select name="edit_product_category" value="<?php echo $row['product_category']?>" class="form-control"><!-- form-control Begin -->
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
										  <div class="form-group">
											<label>Product Image</label>
											<input type="file" name="edit_product_image" value="<?php echo $row['product_img']?>" placeholder="Insert Product Image File" class="form-control">
										  </div>
										  <div class="form-group">
											<label>Product Price</label>
											<input type="text" name="edit_product_price" value="<?php echo $row['product_price']?>" placeholder="Enter Product Price" class="form-control">
										  </div>
										  <div class="form-group">
											<label>Product Description</label>
											<textarea name="edit_description" cols="8" rows="6" class="form-control" placeholder="Enter Product Description" value="<?php echo $row['product_description']?>"></textarea>
											
										  </div>
										  <div class="modal-footer">
											<a href="Aproduct.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></a>
											<button type="submit"  name="updatebtn" class="btn btn-primary">Update</button>
										  </div>
											
									</form>	
								<?php
								
							}
							
						}
					
					?>
					</div>
			</div>
		</div>
		<div class="col-md-1">
	</div>
</div>