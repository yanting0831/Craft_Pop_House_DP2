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
			<ul class="breadcrumb">
			  <li><a href="events.php">Forum</a></li>
			  <li><a href="#">Topic Page</a></li>
			</ul>
		</div>
		
		<div class="row">
		
			<?php
				//create_cat.php
				$connect_database = mysqli_connect('localhost', 'root', '', 'cph');

				$sql = "SELECT
							topic_id,
							topic_subject
						FROM
							topics
						WHERE
							topics.topic_id = " . $_GET['id'];
							
				$result = mysqli_query($connect_database, $sql);

				if(!$result)
				{
					echo '<br><font style="font-size: 14px;">The topic could not be displayed, please try again later.</font><br><br>';
				}
				else
				{
					if(mysqli_num_rows($result) == 0)
					{
						echo '<br><font style="font-size: 14px;">This topic doesn&prime;t exist.</font><br><br>';
					}
					else
					{
						while($row = mysqli_fetch_assoc($result))
						{
							//display post data
							echo '<table class="topic" border="1">
									<tr>
										<th colspan="2">' . $row['topic_subject'] . '</th>
									</tr>';
						
							//fetch the posts from the database
							$posts_sql = "SELECT
										posts.post_topic,
										posts.post_content,
										posts.post_date,
										posts.post_by,
										users.id,
										users.username
									FROM
										posts
									LEFT JOIN
										users
									ON
										posts.post_by = users.id
									WHERE
										posts.post_topic = " . $_GET['id'];
										
							$posts_result = mysqli_query($connect_database, $posts_sql);
							
							if(!$posts_result)
							{
								echo '<tr><td>The posts could not be displayed, please try again later.</tr></td></table>';
							}
							else
							{
							
								while($posts_row = mysqli_fetch_assoc($posts_result))
								{
									echo '<tr class="topic-post">
											<td class="user-post"><font style="font-size: 14px;">' . $posts_row['username'] . '<br>' . date('d-m-Y H:i', strtotime($posts_row['post_date'])) . '</font></td>
											<td class="post-content"><pre style="font-size: 14px;">' . stripslashes(htmlentities($posts_row['post_content'])) . '</pre></td>
										  </tr>';
								}
							}
							
							if(!isLoggedIn())
							{
								echo '<tr><td colspan=2>You must be <a href="login.php">signed in</a> to reply. You can also <a href="registration.php">sign up</a> for an account.';
							}
							else
							{
								//show reply box
								echo '<tr><td colspan="2"><font style="font-size: 18px;">Reply:</font><br>';
								echo '<form method="post" action="reply.php?id=' . $row['topic_id'] . '">';
								echo '<textarea style="resize:none;" name="reply-content" rows="10" cols="70" wrap="pyhsical"></textarea><br /><br />';
								echo '<input type="submit" value="Submit reply" />';
								echo '</form></td></tr>';
							}
							
							//finish the table
							echo '</table>';
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


