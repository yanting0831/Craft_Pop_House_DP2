<!DOCTYPE html>
<html lang="en">
<head>
	<title>Test Subscribe</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com">
	<!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
	<script src="includes/jquery-3.2.1.min.js"></script>	
	<style>
	.mpopup {
	    display: none;
	    position: fixed;
	    z-index: 1;
	    padding-top: 100px;
	    left: 0;
	    top: 0;
	    width: 100%;
	    height: 100%;
	    overflow: auto;
	    background-color: rgb(0,0,0);
	    background-color: rgba(0,0,0,0.4);
	}
	.mpopup-content {
	    position: relative;
	    background-color: #fefefe;
	    margin: auto;
	    padding: 0;
	    width: 60%;
	    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
	    -webkit-animation-name: animatetop;
	    -webkit-animation-duration: 0.4s;
	    animation-name: animatetop;
	    animation-duration: 0.4s
	}

	.mpopup-head {
	    padding: 2px 16px;
	    background-color: #ff0000;
	    color: white;
	}
	.mpopup-main {padding: 2px 16px;}
	.mpopup-main input[type="text"]{
	    width: 30%;
	    height: 25px;
	    font-size: 15px;
	}
	.mpopup-main input[type="submit"]{
	    padding: 5px;
	    font-size: 15px;
	    font-weight: bold;
	    background-color: #333;
	    outline: none;
	    border: none;
	    color: #fff;
	    cursor: pointer;
	}
	.mpopup-foot {
	    padding: 2px 16px;
	    background-color: #ff0000;
	    color: #ffffff;
	}

	/* add animation effects */
	@-webkit-keyframes animatetop {
	    from {top:-300px; opacity:0}
	    to {top:0; opacity:1}
	}

	@keyframes animatetop {
	    from {top:-300px; opacity:0}
	    to {top:0; opacity:1}
	}

	/* close button style */
	.close {
	    color: white;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}
	.close:hover, .close:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
	}
	</style>
</head>


<body>
	<div id="mpopupBox" class="mpopup">
	    <!-- mPopup content -->
	    <div class="mpopup-content">
	        <div class="mpopup-head">
	            <span class="close">×</span>
	            <h2>Subscibe Our Newsletter</h2>
	        </div>
	        <div class="mpopup-main">
	            <p><input type="text" id="email" placeholder="Enter your email"/></p>
	            <p><input type="submit" value="Subscribe"/></p>
	        </div>
	    </div>
	</div>
</body>

<script>
function subscriptionPopup(){
    // get the mPopup
    var mpopup = $('#mpopupBox');
    
    // open the mPopup
    mpopup.show();
    
    // close the mPopup once close element is clicked
    $(".close").on('click',function(){
        mpopup.hide();
    });
    
    // close the mPopup when user clicks outside of the box
    $(window).on('click', function(e) {
        if(e.target == mpopup[0]){
            mpopup.hide();
        }
    });
}

// $(document).ready(function() {
// 	var popDisplayed = $.cookie('popDisplayed');
// 	if(popDisplayed == '1'){
// 	    return false;
// 	}else{
// 	    setTimeout( function() {
// 	        subscriptionPopup();
// 	    },10000);
// 	    $.cookie('popDisplayed', '1', { expires: 7 });
// 	}
// });

</script>

</html>

