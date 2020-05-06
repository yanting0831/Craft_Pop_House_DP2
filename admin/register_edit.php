<?php include('AdminInterface.php') ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
				<div class="col-md-8 bg">
					<div class="mb-4">
						<h6>Edit User Profile</h6>
						
					<!--When the admin press edit button will direct come to this page to edit the profile -->	
					
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
											<label>User_type</label>
											<input type="text" name="edit_user_type" value="<?php echo $row['user_type']?>" placeholder="Enter User_Type" class="form-control">
										  </div>
										  <div class="form-group">
											<label>Password</label>
											<input type="password" name="edit_password" value="<?php echo $row['password']?>" placeholder="Enter Password" class="form-control">
										  </div>
											<div class="modal-footer">
													<a href="Admin.php" class="btn btn-secondary">Cancel</button></a>
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
	</div>