<?php
	session_start();
?>
<?php include('sellerInterface.php') ?>

	<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div> 

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
			<div class="col-md-10 bg">
				<div class="card shadow mb-4 ">
					
					<div class="card-body">
					
					<?php
					if(isset($_SESSION['success']) && $_SESSION['success']!='')
					{
						echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
						unset($_SESSION['success']);
					}
					if(isset($_SESSION['status']) && $_SESSION['status']!='')
					{
						echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].' </h2>';
						unset($_SESSION['status']);
					}
					?>
					
						<div class="table-responsive">
						
						<?php
							
							$connection = mysqli_connect('localhost','root','','cph');
							
							$query="SELECT * FROM products";
							$query_run=mysqli_query($connection,$query);
						
						?>
							<table class="table table-bordered">
							  <thead>
								<tr>
									<th>ID</th>
									<th>Product Name</th>
									<th>Product Category</th>
									<th>Product Image</th>
									<th>Product Price</th>
									<th>Product Description</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							  </thead>
							  <tbody>
							  <?php
							  if(mysqli_num_rows($query_run)>0)
							  {
								  while($row = mysqli_fetch_assoc($query_run))
								  {
									?>
									
								<tr>
									<td><?php echo $row['product_id']; ?></td>
									<td><?php echo $row['product_title']; ?></td>
									<td><?php echo $row['product_category_id']; ?></td>		
									<td><?php echo $row['product_img']; ?></td>
									<td><?php echo $row['product_price']; ?></td>
									<td><?php echo $row['product_description']; ?></td>
									<td>
										<form action="SellerEdit.php" method="post">
											<input type="hidden" name="edit_id" value="<?php echo $row['product_id'];?>">
											<button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
										</form>
									</td>
									<td>
										<form action="SellerProductCode.php" method="post">
											<input type="hidden" name="delete_id" value="<?php echo $row['product_id']; ?>">
											<button type="button" name="delete_btn" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">DELETE</button>
											<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Confirm to DELETE</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
													ARE U SURE U WANT TO DELETE.
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

													<input type="hidden" name="delete_id" value="<?php echo $row['product_id']; ?>">
													<button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
											
													</div>
												</div>
											  </div>
											</div>
										</form>
									</td>
								</tr>
								<?php
								  }
								  
							  }
							  else 
							  {
								  echo "No record found";
							  }
							  
							  ?>
							  </tbody>
							</table>
							</div>
						</div>
					</div>
			</div>	