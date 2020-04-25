<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8"/>
	<title> Login Account</title>
	<!--<link rel="stylesheet" type="text/css" href="styles/Login.css">-->
	<meta name="description" content="Web Development">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="author" content="Eric Kong">
	<link rel="stylesheet" type="text/css" href="styles/adminHome.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<!--Bootstrap--> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body> 
	<nav class="navbar navbar-expand-md navbar-light">
		<button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="mynavbar">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
						<a href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">Craft Pop Houses</a>
					<div class="bottom-border pb-3">
						<img src="images/admin.jpg" width="50" class="rounded-circle mr-3">
						<a href="#" class="text-white">Admin</a>
						</div>
					<ul class="navbar-nav flex-column mt-4">
						<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 current"><i class="fa fa-home text-light fa-lg mr-3"></i>Home</a></li>
						<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-user text-light fa-lg mr-3"></i>Profile</a></li>
						<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-book text-light fa-lg mr-3"></i>Category</a></li>
						<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-gift text-light fa-lg mr-3"></i>Product</a></li>
						<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-child text-light fa-lg mr-3"></i>Buyer</a></li>
						<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-child text-light fa-lg mr-3"></i>Seller</a></li>						
						<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-institution text-light fa-lg mr-3"></i>Transcation List</a></li>						
						<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-bar-chart text-light fa-lg mr-3"></i>Sales</a></li>
						<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-bell text-light fa-lg mr-3"></i>Announcement</a></li>
					</ul>
					<div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
						<div class="row align-items-center">
							<div class="col-md-4">
								<h4 class="text-light text-uppercase mb-0">Home</h4>
							</div>
							<div class="col-md-5">
								<form>
								<div class="input-group">
									<input type="text" class="form-control " placeholder="Search">
									<button type="button" class="btn btn-white "><i class="fa fa-search text-danger"></i></button>
								</div>
								</form>
								</div>
								<div class="col-md-3">
									<ul class="navbar-nav">
										<li class="nav-item ml-auto"><a href="#" class="nav-link"><i class="fa fa-sign-out text-danger fa-lg"></i></a></li>
									</ul>
								</div>
							</div>
					</div>
					
					<div class="container-fluid bg">
						<div class="row">
							<div class="col-md-4">
							
				</div>
			</div>
		</div>
	</div>
	</nav>
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
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">User Profile
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
			Add User Profile
			</button>
		</h6>
	</div>
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


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>