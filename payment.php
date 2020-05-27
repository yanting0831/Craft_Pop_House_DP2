<?php 
  include('functions.php');
  include("function.php");
  include "includes/nav_header.php";
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
  <!--Bootstrap CDN-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
</head>
<br><br><br>

<div class="box"><!-- box Begin -->
    
     <!-- Payment -->
     <form method="post" class="form-horizontal">
         <div id="paypal-button-container" class="col-md-6 col-md-offset-6"></div>
     </form>
                      

        <!-- Include the PayPal JavaScript SDK -->
        <script src="https://www.paypal.com/sdk/js?client-id=AVJ4ZM21sgUqwIJ75Dc8t1-9RBATky7G59n_XlBKu_vJAtYM9lZNYIN2kajResP-8Hf7fJDZLJ7D_OuC&currency=MYR"></script>

        <script type="text/javascript">
          var total = <?php echo json_encode($_SESSION['total']); ?>;
        </script>

        <script>
            // Render the PayPal button into #paypal-button-container
            paypal.Buttons({
                style: {
                    layout: 'horizontal'
                },
                
                // Set up the transaction
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: total
                            }
                        }]
                    });
                },

                // Finalize the transaction
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        // Show a success message to the buyer
                        alert('Transaction completed by ' + details.payer.name.given_name + '!');                              
                    });
                }
                
            }).render('#paypal-button-container');
        </script>
          
  
    
</div><!-- box Finish -->