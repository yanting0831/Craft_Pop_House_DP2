<?php
	
	
	echo '<nav class="navbar navbar-fixed-top navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Craft Pop House</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="products.php">Products</a></li>
					<li><a href="aboutus.php">About Us</a></li>
					<li><a href="contacts.php">Contacts</a></li>
					<li><a href="events.php">Events</a></li>
				</ul>';
				
				//fetch session for login_id
				if(isset($_SESSION['user']))
				{
					echo '<ul class="nav navbar-nav navbar-right">
							  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">'; echo $_SESSION["user"]["username"]; echo' <span class="caret"></span></a>
								<ul class="dropdown-menu">
								  <li><a href="#">Update Account</a></li>
								</ul>
							  </li>
							  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
						</ul>';
				}
				else
				{
					echo '<ul class="nav navbar-nav navbar-right">
							  <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						</ul>';
				}
				
				echo '<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="cart.php" class="nav-item nav-link active">
							<i class="fas fa-shopping-cart"></i> Cart';
							
							if (isset($_SESSION['cart'])){
								$count = count($_SESSION['cart']);
								echo "<span id=\"cart_count\" class=\"text-white\">$count</span>";
							}
							else
							{
								echo "<span id=\"cart_count\" class=\"text-white\">0</span>";
							}
							
					echo '</a>
						</li>
					</ul>';
				
				echo '<form class="navbar-form navbar-right" action="/action_page.php">
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Search" name="search">
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
					</form>';
				
				
			echo '</div>
		</nav>';
?>
