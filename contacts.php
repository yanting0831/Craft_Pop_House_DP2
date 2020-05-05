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
	<link href="styles/contact.css" rel="stylesheet" type="text/css">
	<link href="styles/cart.css" rel="stylesheet" type="text/css">
	
	<!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the pae via file://-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respons.min.js"></script>
    <![endif]-->
</head>
<body>

	<?php
		include "includes/nav_header.php";
	?>
	
	<div class="box">
		<img src="images/contact.png" alt="image" style="width:100%;">
		<div class="contact">Contact Us</div>
	</div>
	
	<div class="content">
		<h3>Malaysia Craft Council (Malaysia Handicraft Centre)</h3>
		<hr/>
		<h4>Address:</h4>
		<p>No. 17, Tingkat 1, Jalan Court House, 93000 Kuching, Sarawak, Malaysia.
		<h4>Contact No.</h4>
		<p>Tel: +6082- 245652 / +6082-426042</p>
		<p>Fax: +6082-420253</p>
		
		<h4>Email:</h4>
		<p>INFO (<a href="mailto:info@sarawakhandicraft.com.my">info@sarawakhandicraft.com.my</a>)</p>
		<p>VENDOR (<a href="mailto:vendor@sarawakhandicraft.com.my">vendor@sarawakhandicraft.com.my</a>)</p>
		<p>MEDIA (<a href="mailto:media@sarawakhandicraft.com.my">media@sarawakhandicraft.com.my</a>)</p>
		<p>ACCOUNTS (<a href="mailto:accounts@sarawakhandicraft.com.my">accounts@sarawakhandicraft.com.my</a>)</p>
	</div>
	
	
	<?php
		include "includes/footer.php";
	?>
</body>

</html>