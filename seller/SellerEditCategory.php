<?php include('sellerInterface.php') ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
				<div class="col-md-8 bg">
					<div class="mb-4">
						<h6>Edit Category</h6>
		
							<?php
							$connection= mysqli_connect('localhost','root','','cph');
								if(isset($_POST['edit_btn']))
								{
									$product_id=$_POST['edit_id'];
									
									$query ="SELECT * FROM products_categories WHERE product_category_id ='$product_id' ";
									$query_run =mysqli_query($connection,$query);
									
									foreach($query_run as $row)
									{
										?>
											<form action="SellerCategoryCode.php" method="POST">
											
												<input type="hidden" name="edit_category_id" value="<?php echo $row['product_category_id']?>";
												<div class="form-group">
													<label>Category Name</label>
													<input type="text" name="edit_category_name" value="<?php echo $row['product_category_title']?>" placeholder="Enter Category Name" class="form-control">
												  </div>
												 <div class="form-group">
													<label>Category Description</label>
													<textarea name="edit_category_desc"cols="8" rows="6" value="<?php echo $row['product_category_desc']?>" placeholder="Enter Category desc" class="form-control"></textarea>
												</div>
													
												<div class="modal-footer">
													<a href="Category.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></a>
													<button type="submit"  name="updatebtn1" class="btn btn-primary">Update</button>
												</div>
											
											</form>	
										<?php
										
									}
									
								}
							
							?>
					</div>
				</div>
			<div class="col-md-1">
			</div>
	</div>