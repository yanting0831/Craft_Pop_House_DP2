<?php
	/* ID:100083700 Name: Ricky Su Yong How */
	//start session
	//session_start();
	
	echo '<div class="navbar navbar-default navbar-fixed-top" id="topnav">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="products.php" class="navbar-brand">PCSects</a>
				</div>';
		
			//fetch session for login_id
			if(isset($_SESSION['login_id']))
			{
				$name = $_SESSION["first_name"];
				
				echo '<ul class="nav navbar-nav navbar-right">
					<li><a href="accountsettings.php">Update Account</a></li>
					<li><a href="logout.php">Sign Out</a></li>
				</ul>';
				$price_discount = 0.5;
			}
			else
			{
				$price_discount = 1;
			echo '<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">Sign In</a></li>
					<li><a href="registration.php">Sign Up</a></li>
				</ul>';
			}
		echo '</div>
	</div>'
?>
