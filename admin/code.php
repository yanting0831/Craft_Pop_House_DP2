<?php
	session_start();

	$connection = mysqli_connect('localhost','root','','cph');	

	if(isset($_POST['registerbtn']))
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$user_type = $_POST['user_type'];
		$cpassword = $_POST['confirmpassword'];
		
		if($password == $cpassword)
		{
		
			$query = "INSERT INTO users (username,email,password,user_type) VALUES ('$username','$email','$password','$user_type')";
			$query_run=mysqli_query($connection,$query);
			
			
			if($query_run)
			{
				$_SESSION['success'] = "Admin Profile Added";
				header('Location:Admin.php');
				
			}
			else
			{
				$_SESSION['status'] = "Admin Profile NOT Added";
				header('Location:Admin.php');
				
			}
		}
		else
		{
			$_SESSION['status'] = "Password and Confirm Password Does Not Match";
			header('Location:Admin.php');
		}
	
	
	
	}
	
	if(isset($_POST['updatebtn']))
	{
		$id=$_POST['edit_id'];
		$username= $_POST['edit_username'];
		$email= $_POST['edit_email'];
		$user_type = $_POST['edit_user_type'];
		$password= $_POST['edit_password'];
		
		$query="UPDATE users SET username='$username', email='$email', password='$password', user_type='$user_type' WHERE id='$id'";
		$query_run=mysqli_query($connection,$query);
		
		if($query_run)
		{
			$_SESSION['success']="Your Data is Updated";
			header('Location: Admin.php');
		}
		else
		{
			$_SESSION['status']="Your Data is Not Updated";
			header('Location: Admin.php');
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
				header('Location:Admin.php');
			}
			else{
				$_SESSION['status']="Your Data is Not Deleted";
				header('Location:Admin.php');
			}
		}

?>