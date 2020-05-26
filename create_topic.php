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
			<h1> Discussion Site - Create a topic </h1>
		</div>
	
		<div class="row" style="margin-bottom: 20px">
			<ul class="breadcrumb">
			  <li><a href="events.php">Forum</a></li>
			  <li><a href="create_topic.php">Create Topic</a></li>
			</ul>
		</div>
		
		<div class="row">
		
			<?php
				//create_topic.php
				
				$connect_database = mysqli_connect('localhost', 'root', '', 'cph');

				echo '<h3>Create a topic</h3>';
				echo '<br>';
				if(!isLoggedIn())
				{
					//the user is not signed in
					echo '<br><font style="font-size: 14px;">Sorry, you have to be <a href="login.php">signed in</a> to create a topic.</font><br><br>';
				}
				else
				{
					//the user is signed in
					if($_SERVER['REQUEST_METHOD'] != 'POST')
					{	
						//the form hasn't been posted yet, display it
						//retrieve the categories from the database for use in the dropdown
						$sql = "SELECT
									cat_id,
									cat_name,
									cat_description
								FROM
									categories";
						
						$result = mysqli_query($connect_database, $sql);
						
						if(!$result)
						{
							//the query failed, uh-oh :-(
							echo '<br><font style="font-size: 14px;">Error while selecting from database. Please try again later.</font><br><br>';
						}
						else
						{
							if(mysqli_num_rows($result) == 0)
							{
								//there are no categories, so a topic can't be posted
								if($_SESSION['user_level'] == 1)
								{
									echo '<br><font style="font-size: 14px;">You have not created categories yet.</font><br><br>';
								}
								else
								{
									echo '<br><font style="font-size: 14px;">Before you can post a topic, you must wait for an admin to create some categories.</font><br><br>';
								}
							}
							else
							{
						
								echo '<form method="post" action="">
									<br><font style="font-size: 14px;">Subject: </font><input type="text" name="topic_subject" /><br><br>
									<font style="font-size: 14px;">Category: </font>'; 
								
								echo '<select name="topic_cat">';
									while($row = mysqli_fetch_assoc($result))
									{
										echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
									}
								echo '</select><br><br>';	
									
								echo '<font style="font-size: 14px;">Message: </font><br><textarea style="resize:none;" name="post_content" rows="10" cols="70" wrap="hard"></textarea><br /><br />
									<input type="submit" value="Create topic" />
								 </form>';
							}
						}
					}
					else
					{
					
							//the form has been posted, so save it
							//insert the topic into the topics table first, then we'll save the post into the posts table
							$sql = "INSERT INTO 
										topics(topic_subject,
											   topic_date,
											   topic_cat,
											   topic_by)
								   VALUES('" . addslashes($_POST['topic_subject']) . "',
											   NOW(),
											   " . $_POST['topic_cat'] . ",
											   " . $_SESSION['user']['id'] . "
											   )";
									 
							$result = mysqli_query($connect_database, $sql);
							if(!$result)
							{
								//something went wrong, display the error
								echo '<br><font style="font-size: 14px;">An error occured while inserting your data. Please try again later.</font><br><font style="font-size: 14px;">' . mysqli_error($connect_database) . '</font><br>';
							}
							else
							{
								//the first query worked, now start the second, posts query
								//retrieve the id of the freshly created topic for usage in the posts query
								$sql = "SELECT	
											topic_id
										FROM
											topics
										ORDER BY
											topic_date
										DESC
										LIMIT 1";
								$result = mysqli_query($connect_database, $sql);
								while($row = mysqli_fetch_assoc($result))
								{
									$topicid = $row['topic_id'];					
								}
								$sql = "INSERT INTO
											posts(post_content,
												  post_date,
												  post_topic,
												  post_by)
										VALUES
											('" . addslashes($_POST['post_content']) . "',
												  NOW(),
												  " . $topicid . ",
												  " . $_SESSION['user']['id'] . "
											)";
								$result = mysqli_query($connect_database,$sql);
								
								if(!$result)
								{
									//something went wrong, display the error
									echo '<br><font style="font-size: 14px;">An error occured while inserting your post. Please try again later.</font><br><font style="font-size: 14px;">' . mysqli_error($connect_database) . '</font><br>';
								}
								else
								{	
									//after a lot of work, the query succeeded!
									echo '<br><font style="font-size: 14px;">You have succesfully created <a href="topic.php?id='. $topicid . '">your new topic</a>.</font><br><br>';
								}
							}

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

</html>


