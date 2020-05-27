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
    </div>
  </div>
</div> 

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
			<div class="col-md-10 bg">
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
									<th>The Amount of the Product Buyer Bought </th>
									<th>Tax Earned of Craft Pop House</th>
								</tr>
							  </thead>
							  <tbody>
							  <!--Show the Data from database when the user_type is Usser-->
							  <!--check if data is present in the database or not-->
							  <?php
							  if(mysqli_num_rows($query_run)>0)
							  {
								  while($row = mysqli_fetch_assoc($query_run))
									  
								  {
									?>
								<tr>
									<td><?php echo $row['due_amount']; ?></td>
									<td><?php echo $row['due_amount']*0.05; ?></td>
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