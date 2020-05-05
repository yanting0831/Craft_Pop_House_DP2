<?php
	function component($product_title, $product_price, $product_image, $product_id)
	{
		$element = "
			<div class='col-md-4 col-sm-6 center-responsive'>
				<form action='products.php' method='post'>
					<div class='product'>
						<a href = '#?id=<?php echo $product_id ?>'>
							<img class='img-responsive' src='images/$product_image'>
						</a>
						<div class='text'>
							<h3> 
								<a href='#?id=<?php echo $product_id ?>'>
									$product_title
								</a>
							<h3>
							<p class='price'>
								$$product_price
							</p>
							<p class='button'>
								<input name=\"quantity\" type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
								<a class='btn btn-default' href='#'>
								View Details
								</a>
								<button type='submit' class='btn btn-primary' name='add'>Add to Cart <i class='fas fa-shopping-cart'></i></button>
								<input type='hidden' name='product_id' value='$product_id'>
								<input type='hidden' name='hidden_price' value='$product_price'>
								<input type='hidden' name='hidden_name' value='$product_title'>
							</p>
							
						</div>
					</div>
				</form>
			
		</div>
		
		";
		echo $element;
	}
	
	function cartElement($product_image, $product_title, $product_price, $product_id)
	{
		$element = "
    
				<form action=\"cart.php?action=remove&id=$product_id\" method=\"post\" class=\"cart-items\">
                    <div class=\"table-bordered\">
                        <div class=\"row\">
						
                            <div class=\"col-md-3\">
                                <img src=\"images/$product_image\" alt=\"Image1\" class=\"img-fluid\">
                            </div>
							
                            <div class=\"col-md-6\">
                                <h2 class=\"pt-2\">$product_title</h2>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h3 class=\"pt-2\">$$product_price</h3>
                                <button type=\"submit\" class=\"btn btn-danger \" name=\"remove\">Remove</button>
                            </div>
							
                            <!--<div class=\"col-md-3\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}
?>

