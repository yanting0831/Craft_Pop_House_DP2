<?php

	session_start();
	$connection = mysqli_connect('localhost','root','','cph');	

	if(isset($_POST['registerbtn']))
	{
		
		$PName= $_POST['product_title'];
		$PCategory=$_POST['product_category'];
		$PImage= $_POST['product_img'];
		$PPrice= $_POST['product_price']; 
		$PDescription=$_POST['product_description'];

			$query = "INSERT INTO products (product_title,product_category,product_img,product_price,product_description) VALUES ('$PName','$PCategory','$PImage','$PPrice','$PDescription')";
			$query_run=mysqli_query($connection,$query);
	}
	
	if(isset($_POST['updatebtn']))
	{
		$id=$_POST['edit_product_id'];
		$cid=$_POST['edit_category_id'];
		$PName= $_POST['edit_product_name'];
		$PCategory=$_POST['edit_product_category'];
		$PImage= $_POST['edit_product_image'];
		$PPrice= $_POST['edit_product_price']; 
		$PDescription=$_POST['edit_description'];
		
		$query="UPDATE products SET product_category_id='$PCategory',product_title='$PName', product_img='$PImage', product_price='$PPrice',product_description='$PDescription' WHERE product_id='$id'";
		$query_run=mysqli_query($connection,$query);
		
		if($query_run)
		{
			$_SESSION['success']="Your Data is Updated";
			header('Location: Aproduct.php');
		}
		else
		{
			$_SESSION['status']="Your Data is Not Updated";
			header('Location: Aproduct.php');
		}
	}
	
	if(isset($_POST['delete_btn']))
		
		{
			$product_id=$_POST['delete_id'];
			
			$query = "DELETE FROM products WHERE product_id='$product_id'";
			$query_run = mysqli_query($connection, $query);
			
			if($query_run)
			{
				$_SESSION['success']="Your Data is Deleted";
				header('Location:Aproduct.php');
			}
			else{
				$_SESSION['status']="Your Data is Not Deleted";
				header('Location:Aproduct.php');
			}
		}
?>