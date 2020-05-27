<?php 
    include("functions.php");
    include("function.php");
    include "includes/nav_header.php";
?>

<?php
// $get_users= "select * from users where email="";
// $run_products= mysqli_query($connection,$get_product);
// while($row_products=mysqli_fetch_array($run_products))
    
//     {
//         $product_id = $row_products['product_id'];
//         $product_title = $row_products['product_title'];
//         $product_price = $row_products['product_price'];
?>



<?php 

if(isset($_GET['c_id'])){
    
    $customer_id = $_GET['c_id'];
    
}

$ip_add = getRealIpUser();

$invoice_no = mt_rand();

$select_cart = "select * from carts where ip_add='$ip_add'";

$run_cart = mysqli_query($connection, $select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['p_id'];
    
    $pro_qty = $row_cart['qty'];
    
    $get_products = "select * from products where product_id='$pro_id'";
    
    $run_products = mysqli_query($connection, $get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $sub_total = $row_products['product_price']*$pro_qty;
		$seller_id = $row_products['seller_id'];
        
        $insert_customer_order = "insert into orders (seller_id, due_amount, invoice_no, qty, order_date) 
        values ('$seller_id','$sub_total','$invoice_no','$pro_qty',NOW())";
        
        $run_customer_order = mysqli_query($connection, $insert_customer_order);
        
        $delete_cart = "delete from carts where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($connection, $delete_cart);
        
        echo "<script>alert('Your orders has been submitted, Thanks')</script>";
        
        echo "<script>window.open('payment.php','_self')</script>";
        
    }
    
}

?>