<?php 
	include('functions.php');
	
	error_reporting(0);
	ini_set('display_errors', 0);
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>Craft Pop House</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Web Development"/>
	<meta name="keywords" content=""/>
	<meta name="author" content="Ricky Su"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="styles/event.css" rel="stylesheet" type="text/css">
	<link href="styles/cart.css" rel="stylesheet" type="text/css">
	
	<!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
	
	<style type="text/css">
		
    </style>
</head>
<body>

	<?php
		include "includes/nav_header.php";
	?>
	
	<div class="container content" style="margin-top:70px;">
		<div class="row">
			<h1> Discussion Site - Create Category</h1>
		</div>
	
		<div class="row" style="margin-bottom: 20px">
			<ul class="breadcrumb">
			  <li><a href="events.php">Forum</a></li>
			  <li><a href="create_cat.php">Create Category</a></li>
			</ul>
		</div>
		
		<div class="row">
		
			<?php
				//create_cat.php
				
				$connect_database = mysqli_connect('localhost', 'root', '', 'cph');

				echo '<h3>Create a category</h3>';
				echo '<br>';
				if(!isLoggedIn() | $_SESSION['user']['user_type'] != 'admin' )
				{
					//the user is not an admin
					echo '<br><h4>Sorry, you do not have sufficient rights to access this page. Please inform the admin to add the category.<h4><br><br>';
				}
				else
				{
					//the user has admin rights
					if($_SERVER['REQUEST_METHOD'] != 'POST')
					{
						//the form hasn't been posted yet, display it
						echo '<form method="post" action="">
							<br><font style="font-size: 14px;">Category name: </font><input type="text" name="cat_name" /><br><br>
							<font style="font-size: 14px;">Category description:</font><br><textarea style="resize:none;" name="cat_description" rows="10" cols="70" wrap="hard"></textarea><br /><br />
							<input type="submit" value="Add category" />
						 </form>';
					}
					else
					{
						//the form has been posted, so save it
						$sql = "INSERT INTO categories(cat_name, cat_description)
						   VALUES('" . addslashes($_POST['cat_name']) . "',
								 '" . addslashes($_POST['cat_description']) . "')";
						$result = mysqli_query($connect_database, $sql);
						if(!$result)
						{
							//something went wrong, display the error
							echo '<br><font style="font-size: 14px;">Error: ' . mysql_error() . '</font><br><br>';
						}
						else
						{
							echo '<br><font style="font-size: 14px;">New category succesfully added.</font><br><br>';
						}
					}
				}

				mysqli_close($connect_database);
			?>

			
		</div>
	</div>
		
		

	<?php
		include "includes/footer.php";
		subscribe();
	?>
	
	
	
	
</body>

</html>


