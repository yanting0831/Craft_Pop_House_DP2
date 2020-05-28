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
			 <?php 
				
				require_once('../includes/DbConnect.php');
				$db   = new DbConnect();
				$conn = $db->connect();

				require '../classes/users.class.php';
				$objUser = new user($conn);
				$objUser->setEmail($_SESSION['user']['email']);
				$user = $objUser->getUserByEmailId();
				$_SESSION['sid'] = $user['id'];
				
				
			?>
				<div class="card shadow mb-4 ">
					<div class="card-body">
						<div class="table-responsive">
						
						<!--Retreive data from database-->
						<?php
							
							$connection = mysqli_connect('localhost','root','','cph');
							
							$query="SELECT * FROM orders";
							
							$query_run=mysqli_query($connection,$query);
						
						?>
						
							<table class="table table-bordered">
							  <thead>
								<tr>
								
									<th>Seller ID </th>
									<th>Due_amout </th>
									<th>Invoice</th>
									<th>Quantity</th>
									<th>Order Date</th>
									<th>Delete</th>
									
								</tr>
							  </thead>
							  <tbody>
							  <!--Show the Data from database when the user_type is Usser-->
							  <!--check if data is present in the database or not-->
							  <?php
							  if(mysqli_num_rows($query_run)>0)
							  {
								  while($row = mysqli_fetch_assoc($query_run))
										if( $row['seller_id']==$_SESSION['sid'])
								  {
									?>
									
								<tr>
	
									<td><?php echo $row['seller_id']; ?></td>
									<td><?php echo $row['due_amount']; ?></td>
									<td><?php echo $row['invoice_no']; ?></td>
									<td><?php echo $row['qty']; ?></td>
									<td><?php echo $row['order_date']; ?></td>
									<td>
										<form action="IncomeCode.php" method="post">
											<input type="hidden" name="delete_id" value="<?php echo $row['invoice_no']; ?>">
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

													<input type="hidden" name="delete_id" value="<?php echo $row['invoice_no']; ?>">
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