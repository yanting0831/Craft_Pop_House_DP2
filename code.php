<?php

	session_start();

	$connection = mysqli_connect('localhost','root','','cph');	

	if(isset($_POST['registerbtn']))
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['confirmpassword'];
		
		if($password == $cpassword)
		{
		
			$query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
			$query_run=mysqli_query($connection,$query);
			
			
			if($query_run)
			{
				$_SESSION['success'] = "Admin Profile Added";
				header('Location:users.php');
				
			}
			else
			{
				$_SESSION['status'] = "Admin Profile NOT Added";
				header('Location:users.php');
				
			}
		}
		else
		{
			$_SESSION['status'] = "Password and Confirm Password Does Not Match";
			header('Location:users.php');
		}
	
	
	
	}
	
	if(isset($_POST['updatebtn']))
	{
		$id=$_POST['edit_id'];
		$username= $_POST['edit_username'];
		$email= $_POST['edit_email'];
		$password= $_POST['edit_password'];
		
		$query="UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$id'";
		$query_run=mysqli_query($connection,$query);
		
		if($query_run)
		{
			$_SESSION['success']="Your Data is Updated";
			header('Location: users.php');
		}
		else
		{
			$_SESSION['status']="Your Data is Not Updated";
			header('Location: users.php');
		}
	}
	
	if(isset($_POST['delete_btn']))
		
		{
			$id=$_POST['delete_id'];
			
			$query = "DELETE FROM users WHERE id='$id'";
			$query_run = mysqli_query($connection, $query);
			
			if($query_run)
			{
				$_SESSION['success']="Your Data is Deleted";
				header('Location:users.php');
			}
			else{
				$_SESSION['status']="Your Data is Not Deleted";
				header('Location:users.php');
			}
		}
	
	
	
?>