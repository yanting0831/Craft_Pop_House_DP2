<?php 
	if (isset($_POST['action'])) {
		session_start();
		require_once('includes/DbConnect.php');
        $db   = new DbConnect();
        $conn = $db->connect();

		require 'classes/products.class.php';
		require 'classes/cart.class.php';

		if (isset($_POST['pId'])) {
			$objProducts = new product($conn);
			$objProducts->setId($_POST['pId']);
			$product = $objProducts->getProductById();
		}
    	
    	$objCart = new cart($conn);
		switch ($_POST['action']) {
			case 'add':
		    	$objCart->setCid($_SESSION['cid']);
			 	$objCart->setPid($product['product_id']);
			 	$objCart->setTitle($product['product_title']);
			 	$objCart->setQuantity(1);
			 	$objCart->setTotalAmount($product['product_price']);
			 		
			 	if($objCart->addItem()) {
			 		echo json_encode( ["status" => 1, "msg" => "Added to cart."] );
					exit;
			 	} else {
			 		echo json_encode( ["status" => 0, "msg" => "Opps!! Something went wrong."] );
					exit;
			 	}

				break;

			case 'update':
		    	$objCart->setCid($_SESSION['cid']);
			 	$objCart->setPid($product['product_id']);
			 	$objCart->setQuantity($_POST['quantity']);
			 	$objCart->setTotalAmount($product['product_price']*$_POST['quantity']);

			 	if($objCart->updateItem()) {
			 		$data = $objCart->calculatePrices();

			 		echo json_encode( ["status" => 1, "msg" => "Cart updated.", 'data' => $data] );
					exit;
			 	} else {
			 		echo json_encode( ["status" => 0, "msg" => "Opps!! Something went wrong."] );
					exit;
			 	}

				break;

			case 'remove':
		    	$objCart->setCid($_SESSION['cid']);
			 	$objCart->setId($_POST['cartId']);

			 	if($objCart->removeItem()) {
			 		$data = $objCart->calculatePrices();

			 		echo json_encode( ["status" => 1, "msg" => "Cart item deleted.", 'data' => $data] );
					exit;
			 	} else {
			 		echo json_encode( ["status" => 0, "msg" => "Opps!! Something went wrong."] );
					exit;
			 	}

				break;

			case 'clear':
		    	$objCart->setCid($_SESSION['cid']);
			 	
			 	if($objCart->removeAllItems()) {

			 		echo json_encode( ["status" => 1, "msg" => "Cart is clear."] );
					exit;
			 	} else {
			 		echo json_encode( ["status" => 0, "msg" => "Opps!! Something went wrong."] );
					exit;
			 	}

				break;

			default:
				# code...
				break;
		}
	} else {
		header('location: index.php');
	}
 ?>