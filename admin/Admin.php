<?php
	session_start();
?>
<?php include('AdminInterface.php') ?>
	<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="register_edit.php" method="POST">
		<div class="modal-body">
		  <div class="form-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Enter Username" class="form-control">
		  </div>
		  <div class="form-group">
			<label>Email address</label>
			<input type="email" name="email" placeholder="Enter Email-Address" class="form-control">
		  </div>
		  <div class="form-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Enter Password" class="form-control">
		  </div>
		  <div class="form-group">
			<label>Confirm_Password</label>
			<input type="password" name="confirmpassword" placeholder="Enter Confirm Password" class="form-control">
		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  name="registerbtn" class="btn btn-primary">Save</button>
      </div>
	  </form>
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
							
							$query="SELECT * FROM users";
							
							$query_run=mysqli_query($connection,$query);
						
						?>
						
							<table class="table table-bordered">
							  <thead>
								<tr>
									<th>ID</th>
									<th>Username</th>
									<th>Email-Address</th>
									<th>Password</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							  </thead>
							  <tbody>
							  <?php
							  if(mysqli_num_rows($query_run)>0)
							  {
								  while($row = mysqli_fetch_assoc($query_run))
									  if($row['user_type']=='user')
								  {
									?>
									
								<tr>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['password']; ?></td>
									<td>
										<form action="register_edit.php" method="post">
											<input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
											<button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
										</form>
									</td>
									<td>
										<form action="code.php" method="post">
											<input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
											<button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
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