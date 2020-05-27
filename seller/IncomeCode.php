<?php
	session_start();

	$connection = mysqli_connect('localhost','root','','cph');	

	
	if(isset($_POST['delete_btn']))
		
		{
			$id=$_POST['delete_id'];
			
			$query = "DELETE FROM orders WHERE invoice_no='$id'";
			$query_run = mysqli_query($connection, $query);
			
			if($query_run)
			{
				$_SESSION['success']="Your Data is Deleted";
				header('Location:Income.php');
			}
			else{
				$_SESSION['status']="Your Data is Not Deleted";
				header('Location:Income.php');
			}
		}

?>