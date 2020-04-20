<?php
	/* ID:100083700 Name: Ricky Su Yong How */
	//start session
	//session_start();
	
	echo '<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
			<a class="navbar-brand" href="index.php">CraftPopHouse</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="contacts.php">Contacts</a></li>
				<li><a href="events.php">Events</a></li>
			</ul>
    
	
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
			<form class="navbar-form navbar-right" action="/action_page.php">
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="Search" name="search">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
</nav>';

?>
