<?php
	function component($productname, $productprice, $productimg, $productid)
	{
		$element = "
			<div class=\"col-lg-3 col-md-5 col-sm-7 col-xm-11\">
					<form action=\"products.php\" method=\"POST\">
						<div class=\"panel panel-default\">
							<div>
								<img src=\"$productimg\" alt=\"rattan bag\" class=\"img-fluid card-img-top\">
							</div>
							<div class=\"card-body\">
								<h5 class=\"card-title\">$productname</h5>
								<p class=\"card-text\">
									
								</p>
								<h5>
									<span class=\"price\">RM $productprice</span>
								</h5>
								
								<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
								<input type='hidden' name='product_id' value='$productid'>
							</div>
						</div>
					</form>
				</div>
		
		";
		echo $element;
	}
	
	function cartElement($productimg, $productname, $productprice, $productid)
	{
		$element = "
    
				<form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"table-bordered\">
                        <div class=\"row\">
						
                            <div class=\"col-md-3\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
							
                            <div class=\"col-md-6\">
                                <h2 class=\"pt-2\">$productname</h2>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h3 class=\"pt-2\">$$productprice</h3>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger \" name=\"remove\">Remove</button>
                            </div>
							
                            <div class=\"col-md-3\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}
?>

