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
				$sql = "SELECT
							categories.cat_id,
							categories.cat_name,
							categories.cat_description,
							COUNT(topics.topic_id) AS topics
						FROM
							categories
						LEFT JOIN
							topics
						ON
							topics.topic_id = categories.cat_id
						GROUP BY
							categories.cat_id, categories.cat_name, categories.cat_description";

				$result = mysqli_query($connect_database, $sql);


				if(!$result)
				{
					echo '<br><font style="font-size: 14px;">The categories could not be displayed, please try again later.</font><br><br>';
				}
				else
				{
					if(mysqli_num_rows($result) == 0)
					{
						echo '<br><font style="font-size: 14px;">No categories defined yet.</font><br><br>';
					}
					else
					{
						//prepare the table
						echo '<table border="1">
							  <tr>
								<th>Category</th>
								<th>Last topic</th>
							  </tr>';	
							
						while($row = mysqli_fetch_assoc($result))
						{				
							echo '<tr>';
								echo '<td class="leftpart">';
									echo '<font style="font-size: 18px;"><a href="category.php?id=' . $row['cat_id'] . '">' . stripslashes($row['cat_name']) . '</a></font><br><font style="font-size: 14px;">' . stripslashes($row['cat_description']) . '</font>';
								echo '</td>';
								echo '<td class="rightpart">';
								
								//fetch last topic for each cat
									$topicsql = "SELECT
													topic_id,
													topic_subject,
													topic_date,
													topic_cat
												FROM
													topics
												WHERE
													topic_cat = " . $row['cat_id'] . "
												ORDER BY
													topic_date
												DESC
												LIMIT
													1";
												
									$topicsresult = mysqli_query($connect_database, $topicsql);
								
									if(!$topicsresult)
									{
										echo '<br><font style="font-size: 14px;">Last topic could not be displayed.</font><br><br>';
									}
									else
									{
										if(mysqli_num_rows($topicsresult) == 0)
										{
											echo '<font style="font-size: 14px;">no topics</fonts>';
										}
										else
										{
											while($topicrow = mysqli_fetch_assoc($topicsresult))
											echo '<font style="font-size: 14px;"><a href="topic.php?id=' . $topicrow['topic_id'] . '">' . $topicrow['topic_subject'] . '</a><br> at ' . date('d-m-Y H:i', strtotime($topicrow['topic_date'])) . '</font>';
										}
									}
								echo '</td>';
							echo '</tr>';
						}
						echo '</table>';
					}
				}

				mysqli_close($connect_database);
				?>

			
		</div>
	</div>
		
	<?php
		include "includes/footer.php";
	?>
</body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/7.14.5/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/7.14.5/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
</html>