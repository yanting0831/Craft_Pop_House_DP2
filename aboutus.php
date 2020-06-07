<?php 
	include('functions.php');
	include("function.php");
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
	<link href="styles/AboutUs.css" rel="stylesheet" type="text/css">

	

	
	<!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
</head>
<body >

	<?php
		include "includes/nav_header.php";
	?>
	<img src="images/Team.jpg" alt="Team"/>
	<div class="about">
	<h1 style="font-family: fantasy">About Us</h1>
	<p style="font-size:16px">Craft Pop House is a local boutique shop selling the best homemade crafts and arts in Kuching. This boutique shop is selling local homemade products such as clothing, jewellery, soft toys, handmade items, room décor, vintage goods and craft supplies. They partner with creative local entrepreneurs who use Craft Pop House as a platform to sell what they make or curate. In Craft Pop House, creative entrepreneurs can find meaningful work selling their goods in the local markets. It has become a marketplace which helps the local entrepreneurs to grow.</p>
	</div>
	
	</body>
	<?php
		include "includes/footer.php";
		subscribe();
	?>

</html>