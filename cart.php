<?php
	require_once("function.php");
	require_once("functions.php");
	if (!isLoggedIn()) {
		display_error();
	}
	
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title> Product Category </title>
	<meta charset="utf-8">
	<meta name="author" content="Eric Kong, Yan Ting">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="description" content="category page">
	<meta name="keywords" content="handicrafts">
	<link rel="stylesheet" type="text/css" href="styles/category.css">
	<link href="styles/cart.css" rel="stylesheet" type="text/css">
	<!--Bootstrap CDN-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <script src="includes/jquery-3.2.1.min.js"></script>
    <style type="text/css">
    	.alert, #loader {
    	display: none;
		}
    }
    </style>
</head>

<body class="bg-light">
	<?php
		include "includes/nav_header.php";
	?> 
		
	<div class="container content">
		<div class="text-center">
			<h2 style="margin-top: 0px; padding-top: 0; padding-left: 5px; ">Update your seats</h2>
		</div>
		<hr>
		<?php 
			require_once('includes/DbConnect.php');
			$db   = new DbConnect();
			$conn = $db->connect();
			
			$cartCss = 'display: none';
			$emptyCss = 'display: block';
			if (count($cartItems) > 0) {
				$cartCss = 'display: block';
				$emptyCss = 'display: none';
			}
			?>
		

		<div class="col-md-10 col-md-offset-1">
			<div class="alert alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
				<div id="result"></div>
			</div>
			<center><img src="images/loader.gif" id="loader"></center>
		</div>

		<div id="fullCart" class="row" style="<?=$cartCss?>">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<table class="table table-hover">
					<thead>
					<tr>
						<th>Workshop</th>
						<th>Seats</th>
						<th class="text-center">Price</th>
						<th class="text-center">Total</th>
						<td>
							<button id="clearItems" type="button" class="btn btn-danger">
								<span class="glyphicon glyphicon-trash"></span> Clear
							</button>
						</td>
					</tr>
					</thead>
					<tbody>
						<?php 
							$subTotal   = 0;
							$quantity   = 0;
							$tax        = 0;
							foreach ($cartItems as $key => $cartItem) {
							  $subTotal += $cartItem['totalAmount'];
							  $quantity += $cartItem['quantity'];
							?>
					<tr id="item_<?= $cartItem['id']; ?>">
						<td class="col-sm-8 col-md-6">
							<div class="media">
								<a class="thumbnail pull-left" href="#"> <img class="media-object" src="images/<?= $cartItem['product_img']; ?>" style="width: 72px; height: 72px;"> </a>
								<div style="padding-left: 10px;" class="media-body">
									<h4 class="media-heading"><a href="#"><?= $cartItem['title']; ?></a></h4>
								   <!--  <p><?= substr( $cartItem['description'], 0, 60) . '...'; ?></p> -->
								</div>
							</div>
						</td>
						<td class="col-sm-1 col-md-1" style="text-align: center">
							<select onchange="updateCart(<?= $cartItem['pid']; ?>, <?= $cartItem['id']; ?>)" class="form-control" id="seat_<?= $cartItem['id']; ?>">
								<?php 
									for ($i=1; $i < 11; $i++) { 
								?>
								<option value="<?= $i; ?>" <?php echo ($i == $cartItem['quantity']) ? "selected" : ''; ?>><?= $i; ?></option>
							<?php } ?>
							</select>
							
						</td>
						<td class="col-sm-1 col-md-1 text-center">
							<strong><span style="font-size: 18px;">RM</span><span id="price"><?= number_format( $cartItem['product_price'], 2 ); ?></span>
							</strong>
						</td>
						<td class="col-sm-1 col-md-1 text-center">
							<strong><span style="font-size: 18px;">RM</span><span id="totalPrice_<?= $cartItem['id']; ?>"><?= number_format( $cartItem['totalAmount'], 2 ); ?></span>
							</strong>
						</td>
						<td class="col-sm-1 col-md-1">
							<button type="button" class="btn btn-danger" onclick="removeItem(<?= $cartItem['id']; ?>)">
								<span class="glyphicon glyphicon-remove"></span> Remove
							</button>
						</td>
					</tr>
				<?php } ?>
					<tr>
						<td colspan="4" align="right">	</td>
						<td class="text-right">
							<strong><span style="font-size: 18px;">RM</span>
								<span id="subTotal"><?= number_format( $subTotal, 2 ); ?></span>
							</strong>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="right">Taxes</td>
						<td class="text-right">
							<strong><span style="font-size: 18px;">RM</span>
								<span id="taxes"><?= number_format( $tax * $quantity, 2 ); ?></span>
							</strong>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="right">Total</td>
						<td class="text-right">
							<strong><span style="font-size: 18px;">RM</span>
								<span id="finalPrice"><?= number_format( $subTotal+($tax * $quantity), 2 ); ?></span>
							</strong>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="right">
							<a href="products.php" class="btn btn-default">
								<span class="glyphicon glyphicon-shopping-cart"></span> Buy Products
							</a>
						</td>
						<td >
							<a href="checkout.php" class="btn btn-success">
								Checkout <span class="glyphicon glyphicon-play"></span>
							</a>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div id="emptyCart" class="row" style="<?=$emptyCss?>">
			<div class="col-md-12 text-center">
				<p><strong>Your cart is empty. <a href="products.php">Click here</a> to buy your product.</strong></p>
			</div>
		</div>

	</div>

	<?php
		include "includes/footer.php";
	?> 
</body>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/7.14.5/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/7.14.5/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>

<script type="text/javascript">
    function updateCart(pId, cartId) {
        console.log($('#seat_'+cartId).val())
        $('#loader').show();
        $.ajax({
            url: "action.php",
            data: "pId=" + pId + "&action=update&quantity="+$('#seat_'+cartId).val(),
            method: "post"
        }).done(function(response) {
            console.log(response)
            var data = JSON.parse(response);
            $('#loader').hide();
            $('.alert').show();
            if(data.status == 0) {
                $('.alert').addClass('alert-danger');
                $('#result').html(data.msg);
            } else {
                $('.alert').addClass('alert-success');
                $('#result').html(data.msg);
                $('#totalPrice_'+cartId).text( data.data.totalPrice );
                $('#subTotal').text( data.data.subTotal);
                $('#taxes').text( data.data.taxes);
                $('#finalPrice').text( data.data.finalPrice);
            }
        })
    }

    function removeItem(cartId) {
        $('#loader').show();
        $.ajax({
            url: "action.php",
            data: "cartId=" + cartId + "&action=remove",
            method: "post"
        }).done(function(response) {
            console.log(response);
            var data = JSON.parse(response);
            $('#loader').hide();
            $('.alert').show();
            if(data.status == 0) {
                $('.alert').addClass('alert-danger');
                $('#result').html(data.msg);
            } else {
                $('.alert').addClass('alert-success');
                $('#result').html(data.msg);
                $('#item_'+cartId).remove();
                $('#itemCount').text( data.data.itemCount);
				
				alert("INFO:  Cart Item Removed");	

                if (data.data.itemCount == 0.00) {
                    $('#fullCart').hide();
                    $('#emptyCart').show();
                } else {
                    $('#subTotal').text( data.data.subTotal);
                    $('#taxes').text( data.data.taxes);
                    $('#finalPrice').text( data.data.finalPrice);
                }
            }
        })
    }

    $('#clearItems').click(function(){
        $('#loader').show();
        $.ajax({
            url: "action.php",
            data: "action=clear",
            method: "post"
        }).done(function(response) {
            console.log(response);
            var data = JSON.parse(response);
            $('#loader').hide();
            $('.alert').show();
            if(data.status == 0) {
                $('.alert').addClass('alert-danger');
                $('#result').html(data.msg);
            } else {
                $('.alert').addClass('alert-success');
                $('#result').html(data.msg);
				
				alert("INFO:  Cart Items Cleared");	

                $('#itemCount').text( 0 );
                $('#fullCart').hide();
                $('#emptyCart').show();
            }
        })
    })

</script>
</html>