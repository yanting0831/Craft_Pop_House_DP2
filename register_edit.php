

	<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit User Profile</h6>
		</div>
		<div class="card-body">
		<?php
		$connection= mysqli_connect('localhost','root','','cph');
			if(isset($_POST['edit_btn']))
			{
				$id=$_POST['edit_id'];
				
				$query ="SELECT * FROM users WHERE id='$id' ";
				$query_run =mysqli_query($connection,$query);
				
				foreach($query_run as $row)
				{
					?>
						<form action="code.php" method="POST">
						
							<input type="hidden" name="edit_id" value="<?php echo $row['id']?>";
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="edit_username" value="<?php echo $row['username']?>" placeholder="Enter Username" class="form-control">
							  </div>
							  <div class="form-group">
								<label>Email address</label>
								<input type="email" name="edit_email" value="<?php echo $row['email']?>" placeholder="Enter Email-Address" class="form-control">
							  </div>
							  <div class="form-group">
								<label>Password</label>
								<input type="password" name="edit_password" value="<?php echo $row['password']?>" placeholder="Enter Password" class="form-control">
							  </div>
								<a href="users.php" class="btn btn-danger">CANCEL</a>
								<button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
						</form>	
					<?php
					
				}
				
			}
		
		?>
			
		  
		
		
		</div>
		</div>
	</div>
	</div>