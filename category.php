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
	
	<div class="container content" style="margin-top:50px;">
		<div class="row">
			<h1> Discussion Site </h1>
		</div>
	
		<div class="row" style="margin-bottom: 20px">
			<a class="item" href="create_topic.php">Create a topic</a>
			<a class="item" href="create_cat.php">Create a category</a>
		</div>
		
		<div class="row">
		
			<?php
				//create_cat.php

				$conn = new mysqli('localhost', 'root', '', 'cph');
				 
				//first select the category based on $_GET['cat_id']
				$sql = "SELECT * FROM categories WHERE cat_id = " . $_GET['id'];
				 
				$result = mysqli_query($conn, $sql);
				 
				if(!$result)
				{
					echo 'The category could not be displayed, please try again later.' . mysqli_error($conn);
				}
				else
				{
					if(mysqli_num_rows($result) == 0)
					{
						echo 'This category does not exist.';
					}
					else
					{
						//display category data
						while($row = mysqli_fetch_assoc($result))
						{
							echo '<h2>Topics in ′' . $row['cat_name'] . '′ category</h2>';
						}
					 
						//do a query for the topics
						$sql = "SELECT  
									topic_id,
									topic_subject,
									topic_date,
									topic_cat
								FROM
									topics
								WHERE
									topic_cat = " . mysqli_real_escape_string($conn, $_GET['id']);
						 
						$result = mysqli_query($conn, $sql);
						 
						if(!$result)
						{
							echo 'The topics could not be displayed, please try again later.';
						}
						else
						{
							if(mysqli_num_rows($result) == 0)
							{
								echo 'There are no topics in this category yet.';
							}
							else
							{
								//prepare the table
								echo '<table border="1">
									  <tr>
										<th>Topic</th>
										<th>Created at</th>
									  </tr>'; 
									 
								while($row = mysqli_fetch_assoc($result))
								{               
									echo '<tr>';
										echo '<td class="leftpart">';
											echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
										echo '</td>';
										echo '<td class="rightpart">';
											echo date('d-m-Y', strtotime($row['topic_date']));
										echo '</td>';
									echo '</tr>';
								}
							}
							echo '</table>';
						}
					}
				}
				 
				?>

			
		</div>
	</div>
		
		

	<?php
		include "includes/footer.php";
		subscribe();
	?>
	
	
	
	
</body>

</html>
