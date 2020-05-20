<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8"/>
	<title>Checkout</title>
	<meta name="description" content="Web Development">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="author" content="Yan Ting">
	<link rel="stylesheet" type="text/css" href="styles/checkoutForm.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">	
	<!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	*{
		color: black;
	}


	  h2, h3 {
	    margin-top: 0px;
	    padding-top: 0px;
	  }
	  td {
	    border-top: none !important;
	  }
	</style>
</head>

<br><br><br>

<?php
	include "includes/nav_header.php";
?>

<body>
	<?php 
	    require_once('includes/DbConnect.php');
	    $db   = new DbConnect();
	    $conn = $db->connect();

	    require 'classes/user.class.php';
	    $objUser = new user($conn);
	    $objUser->setId($_SESSION['cid']);
	    $user = $objUser->getUserById();

	    // require 'classes/cart.class.php';
	    // $objCart = new cart($conn);
	    $objCart->setCid($user['id']);
	    $cartItems = $objCart->getAllCartItems();
	    $cartPrices = $objCart->calculatePrices($cartItems);
    
 	?>
	
	

	<div class="container well">
	  <center><h2>Checkout</h2></center>
	  <hr>
	<form method="post" action="ccavenue/ccavRequestHandler.php" class="form-horizontal">
    
    <!-- <input type="hidden" name="tid" id="tid" readonly />
    <input type="hidden" name="merchant_id" value=""/>
    <input type="hidden" name="order_id" value=""/>
    <input type="hidden" name="amount" value="10.00"/> -->
    <input type="hidden" name="currency" value="INR"/>
    <input type="hidden" name="redirect_url" value="http://tutorials.lcl/cart/ccavenue/ccavResponseHandler.php"/>
    <input type="hidden" name="cancel_url" value="http://tutorials.lcl/cart/ccavenue/ccavResponseHandler.php"/>
    <input type="hidden" name="language" value="EN"/>

    <div class="row">
      <div class="col-md-7 well">
        <h3>Billing Address</h3>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-user"></span>
            </div>
            <input class="form-control" type="text" id="billing_name" name="billing_name" placeholder="e.g. John Doe">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-envelope"></span>
            </div>
            <input class="form-control" type="text" id="billing_email" name="billing_email" placeholder="" value="<?= $user['email']; ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-earphone"></span>
            </div>
            <input class="form-control" type="text" id="billing_tel" name="billing_tel" placeholder="0123456789">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-home"></span>
            </div>
            <input class="form-control" type="text" id="billing_address" name="billing_address" placeholder="e.g. Jalan Simpang Tiga">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-home"></span>
            </div>
            <input class="form-control" type="text" id="billing_city" name="billing_city" placeholder="Kuching" value="Kuching">
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon addon-diff-color">
                    <span class="glyphicon glyphicon-home"></span>
                </div>
                <input class="form-control" type="text" id="billing_state" name="billing_state" placeholder="Sarawak" value="Sarawak">
              </div>
            </div>
          </div>
          <div class="col-md-5 col-md-offset-2">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon addon-diff-color">
                    <span class="glyphicon glyphicon-map-marker"></span>
                </div>
                <input class="form-control" type="text" id="billing_zip" name="billing_zip" placeholder="93350" value="93350">
              </div>
            </div>
          </div> 
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-home"></span>
            </div>
            <input class="form-control" type="text" id="billing_country" name="billing_country" placeholder="Malaysia" value="Malaysia">
          </div>
        </div>
      </div>
      <div class="col-md-4 col-md-offset-1 well">
        <div class="text-right">
          <h3>Your Seats</h3>
          <h4><span class="glyphicon glyphicon-shopping-cart"></span><sup id="itemCount"><?= $cartPrices['itemCount']; ?></sup></h4>
          <table class="table">
            <tbody>
              <?php 
                foreach ($cartItems as $key => $cartItem) { 
               ?>    
                <tr>
                  <td align="right" width="85%">
                    <a href="#"><?= $cartItem['title']; ?></a>
                  </td>
                  <td width="15%">
                    <strong><span>&#x20b9;</span><?= ($cartItem['product_price']*$cartItem['quantity']); ?></strong>
                  </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <hr style="border: 1px dotted gray;">
          <p>Total: <strong>
              <span>&#x20b9;</span><?= $cartPrices['finalPrice']; ?>
            </strong>
          </p>
        </div>
        <div class="text-right">
          <input type="submit" value="Pay Now" class="btn btn-success btn-block">
        </div>
      </div>
    </div>
  </form>
</div>

<?php include 'includes/footer.php';?>

</body>
</html>