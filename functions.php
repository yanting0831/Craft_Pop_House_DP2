<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'cph');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_button'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password']);
	$password_2  =  e($_POST['confirm_password']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	
	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		
		
		//select email from database
		$query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		$res = mysqli_query($db, $query);
		//check if there is any email, if there is existed email run the if statement
		if( mysqli_num_rows($res) > 0)
		{
			$row = mysqli_fetch_assoc($res);
			//if email is found in database
			if($email == $row['email'])
			{
				array_push($errors, "Email already exist");
			}
		}
		else
		{
			//salt the password
			$salted_password = "456y45rghtrhfgrhywsetr".$password_1."fdgfdsgsfgd";
			
			//hash password
			$hash_password = hash('sha256', $salted_password);
			
			$hash_password = md5($password_1);//encrypt the password before saving in the database
			
			//admin create user
			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', '$user_type', '$hash_password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				
				
			}else{
				$query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', 'user', '$hash_password')";
				mysqli_query($db, $query);
				
				echo '<script type="text/javascript">
					alert("INFO:  User Account made. Please login.");
					
				</script>';
			}
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo '<script type="text/javascript">
					alert("INFO:  '.$error.'");
					window.location.href="login.php";
				</script>';
			}
		echo '</div>';
	}
	
}	

function display_err() {
	global $errors;

	if (count($errors) > 0){
		
		foreach ($errors as $error){
			echo $error;
		}
		
	}
	
}

function isLoggedIn()
{
	global $errors;
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		array_push($errors, "Please log in first to proceed.");
		display_err();
		return false;
	}
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_button'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $email, $errors;

	// grap form values
	$email = e($_POST['email']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
		
			// check if user is admin,seller or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/Admin.php');
					  
			}
			
			else if($logged_in_user['user_type'] == 'seller')
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success'] = "You are now logged in";
				header('location: seller/SellerProduct.php');
			}
			
			else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				
				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong email/password combination");
		}
	}
}


