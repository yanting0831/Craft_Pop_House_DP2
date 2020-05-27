<?php 
	include('functions.php');
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
			<h1> Forum Discussion Site </h1>
		</div>
	
		<div class="row" style="margin-bottom: 20px">
			<ul class="breadcrumb">
			  <li><a class="item" href="#">Forum</a></a></li>
			  <li><a class="item" href="create_topic.php">Create a topic</a></a></li>
			  <li><a class="item" href="create_cat.php">Create a category</a></li>
			</ul>
			
			
		</div>
		
		<div class="row">
		
			<?php
				//create_cat.php
				
				$connect_database = mysqli_connect('localhost', 'root', '', 'cph');

				if($_SERVER['REQUEST_METHOD'] != 'POST')
				{
					//someone is calling the file directly, which we don't want
					echo '<br><font style="font-size: 14px;">This file cannot be called directly.</font><br><br>';
				}
				else
				{
					//check for sign in status
					if(!isLoggedIn())
					{
						echo '<br><font style="font-size: 14px;">You must be signed in to post a reply.</font><br><br>';
					}
					else
					{
						//a real user posted a real reply
						$sql = "INSERT INTO 
									posts(post_content,
										  post_date,
										  post_topic,
										  post_by) 
								VALUES ('" . addslashes($_POST['reply-content']) . "',
										NOW(),
										" . $_GET['id'] . ",
										" . $_SESSION['user']['id'] . ")";
										
						$result = mysqli_query($connect_database, $sql);
										
						if(!$result)
						{
							echo '<br><font style="font-size: 14px;">Your reply has not been saved, please try again later.</font><br><br>';
						}
						else
						{
							echo '<br><font style="font-size: 14px;">Your reply has been saved, check out <a href="topic.php?id=' . $_GET['id'] . '">the topic</a>.</font><br><br>';
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

