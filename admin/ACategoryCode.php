<?php

	session_start();
	$connection = mysqli_connect('localhost','root','','cph');	

	if(isset($_POST['registerbtn']))
	{
		
		$PCategory_Name= $_POST['product_category_title'];
		$PCategory_decription=$_POST['product_category_desc'];
		

			$query = "INSERT INTO products_categories (product_category_title,product_category_desc) VALUES ('$PCategory_Name','PCategory_decription')";
			$query_run=mysqli_query($connection,$query);
	}
	
	if(isset($_POST['updatebtn1']))
	{
		$id=$_POST['edit_category_id'];
		$PName= $_POST['edit_category_name'];
		$PDescription=$_POST['edit_category_desc'];
		
		$query="UPDATE products_categories SET product_category_title='$PName',product_category_desc='$PDescription' WHERE product_category_id='$id'";
		$query_run=mysqli_query($connection,$query);
		
		if($query_run)
		{
			$_SESSION['success']="Your Data is Updated";
			header('Location: Category.php');
		}
		else
		{
			$_SESSION['status']="Your Data is Not Updated";
			header('Location: Category.php');
		}
	}
	
	if(isset($_POST['delete_btn']))
		
		{
			$product_id=$_POST['delete_id'];
			
			$query = "DELETE FROM products_categories WHERE product_category_id='$product_id'";
			$query_run = mysqli_query($connection, $query);
			
			if($query_run)
			{
				$_SESSION['success']="Your Data is Deleted";
				header('Location:Category.php');
			}
			else{
				$_SESSION['status']="Your Data is Not Deleted";
				header('Location:Category.php');
			}
		}
?>