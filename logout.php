<?php 
	/* ID:100083700 Name: Ricky Su Yong How */
	session_start();

	//destroy the session and revert back to the main page(products.php)
	session_destroy();
	header('location:index.php');
?>