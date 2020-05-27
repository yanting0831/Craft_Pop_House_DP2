<?php
	error_reporting(0);
	ini_set('display_errors', 0);
	include('functions.php');
	include("function.php");
	include "includes/nav_header.php";
	
	function createCommentRow($data) {
		global $connection;

		$response = '
				<div class="comment">
					<div class="user">'.$data['username'].' <span class="time timeago" data-date="'.$data['createdOn'].'"></span></div>
					<div class="userComment">'.$data['comment'].'</div>
					<div class="reply"><a href="javascript:void(0)" data-commentID="'.$data['id'].'" onclick="reply(this)">REPLY</a></div>
					<div class="replies">';

		$sql = $connection->query("SELECT replies.id, username, comment, replies.createdOn FROM replies INNER JOIN users ON replies.userID = users.id WHERE replies.commentID = '".$data['id']."' ORDER BY replies.id DESC LIMIT 1");
		while($dataR = $sql->fetch_assoc())
			$response .= createCommentRow($dataR);

		$response .= '
							</div>
				</div>
			';

		return $response;
	}
	
	if (isset($_POST['getAllComments'])) {
		$start = $connection->real_escape_string($_POST['start']);

		$response = "";
		$sql = $connection->query("SELECT comments.id, username, comment, comments.createdOn FROM comments INNER JOIN users ON comments.userID = users.id ORDER BY comments.id DESC LIMIT $start, 20");
		while($data = $sql->fetch_assoc())
			$response .= createCommentRow($data);

		exit($response);
	}
	
	if (isset($_POST['addComment'])) {
        $comment = $connection->real_escape_string($_POST['comment']);
		$isReply = $connection->real_escape_string($_POST['isReply']);
		$commentID = $connection->real_escape_string($_POST['commentID']);
		
		if($isReply != 'false')
		{
			$connection->query("INSERT INTO replies (commentID, comment, createdOn, userID) VALUES ('$commentID', '$comment', NOW(), '".$_SESSION['user']['id']."')");
			$sql = $connection->query("SELECT replies.id, username, comment, replies.createdOn FROM replies INNER JOIN users ON replies.userID = users.id ORDER BY replies.id DESC LIMIT 1");
		}
		else
		{
			$connection->query("INSERT INTO comments (userID, comment, createdOn) VALUES ('".$_SESSION['user']['id']."','$comment',NOW())");
			$sql = $connection->query("SELECT comments.id, username, comment, comments.createdOn FROM comments INNER JOIN users ON comments.userID = users.id ORDER BY comments.id DESC LIMIT 1");
		}

        
        $data = $sql->fetch_assoc();
		exit(createCommentRow($data));
    }
	
$sqlNumComments = $connection->query("SELECT id FROM comments");
$numComments = $sqlNumComments->num_rows;
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
	<style type="text/css">
    	
		.comment {
            margin-bottom: 20px;
        }

        .user {
            font-weight: bold;
            color: black;
        }

        .time, .reply {
            color: gray;
        }

        .userComment {
            color: #000;
        }

        .replies .comment {
            margin-top: 20px;

        }

        .replies {
            margin-left: 20px;
        }
    }
    </style>
</head>
<body>
	<br>
	
	<div id="content">
	
		<div class='container'>
		<?php 
			require_once('includes/DbConnect.php');
            $db   = new DbConnect();
            $conn = $db->connect();

			require 'classes/users.class.php';
	    	$objUser = new user($conn);
	    	$objUser->setEmail($_SESSION['user']['email']);
	    	$user = $objUser->getUserByEmailId();
	    	$_SESSION['cid'] = $user['id'];
			
			//print_r($cartItems);
		?>
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Product</li>
				</ul>
			</div>
			
			<div class="col-md-3">
			<?php 
			
			include("includes/sidebar.php");
			
			?>
				</div>
				<div class="col-md-9">
				
				<?php
					
					if(!isset($_GET['category'])){
					
					echo "
					
					<div class='box'>
						<h1>Our Products</h1>
					</div>
					";
					}
				?>
				<?php getCategoryCO();?>
					<div class="row">
					
					<!--The user can see the product by using the category-->
					<!--The product will in their own category to display to the user-->
					<?php
						if(!isset($_GET['category'])){
				
							
                            $per_page=6; 
							if(isset($_GET['page'])){
                                
                                $page = $_GET['page'];
                                
                            }else{
                                
                                $page=1;
                                
                            }
								$start_from = ($page-1) * $per_page;
								
								$get_product= "select * from products order by 1 DESC LIMIT $start_from,$per_page";
								$run_products= mysqli_query($connection,$get_product);
								while($row_products=mysqli_fetch_array($run_products))
									
									{
										$product_id = $row_products['product_id'];
										$seller_id= $row_products['seller_id'];
										$product_title = $row_products['product_title'];
										$product_price = $row_products['product_price'];
										$product_image = $row_products['product_img'];
										
										$db = mysqli_connect('localhost', 'root', '', 'cph');
										$query = "SELECT * FROM users where id='$seller_id'";
										$results = mysqli_query($db, $query);
										
										
										echo "
										<div class='col-md-4 col-sm-6 center-responsive'>
											<div class='product'>
												<a href='details.php?product_id=$product_id'>
													<img class='img-responsive' src='images/$product_image'>
												</a>
												<div class='text'>
													<h3> 
														<a href='details.php?product_id=$product_id'> $product_title
															
														</a>
													<h3>";
													while ($rows=mysqli_fetch_array($results)){
														$a = $rows['username'];
														echo "<h4>Seller UserName: $a</h4>";
													}
													
													echo "<h4>
														RM$product_price
													</h4>
													<p class='button'>
														<a class='btn btn-default' href='details.php?product_id=$product_id'>
														View Details
														</a>
														<a class='btn btn-primary' href='details.php?product_id=$product_id'>
															<i class='fa fa-shopping-cart'></i>Add to Cart
														</a>
													</p>
													
												</div>
											</div>
										</div>
									";
										
								}
							}
						
					?>
					</div>	
					<center>
                   <ul class="pagination"><!-- pagination Begin -->
					<?php
                    $per_page=6; 
					
                    $query = "select * from products";
                             
                    $result = mysqli_query($connection,$query);
                             
                    $total_records = mysqli_num_rows($result);
                             
                    $total_pages = ceil($total_records/$per_page );
                             
                        echo "
                        
                            <li>
                            
                                <a href='products.php?page=1'> ".'First Page'." </a>
                            
                            </li>
                        
                        ";
                             
                        for($i=1; $i<=$total_pages; $i++){
                            
                              echo "
                        
                            <li>
                            
                                <a href='products.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                            
                        };
                             
                        echo "
                        
                            <li>
                            
                                <a href='products.php?page=$total_pages'> ".'Last Page'." </a>
                            
                            </li>
                        
                        ";
                            
							
						
						
					 
					 ?> 
                       
                   </ul><!-- pagination Finish -->
               </center>
					
					</div>
					
			<div class="container" style="margin-top:50px;">
				<div class="row">
					<h1> Comment Section </h1>
				</div>
			
				<div class="row">
					<div class="col-md-12">
						<textarea class="form-control" id="mainComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
						<button style="float:right" class="btn-primary btn" onclick="isReply = false;" id="addComment">Add Comment</button>
					</div>
				</div>
			
				<div class="row">
					<div class="col-md-12">
						<h2><b id="numComments"><?php echo $numComments ?> Comments</b></h2>
						<div class="userComments">

						</div>
					</div>
				</div>
			</div>
			
			<div class="row replyRow" style="display:none">
				<div class="col-md-12">
					<textarea class="form-control" id="replyComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
					<button style="float:right" class="btn-primary btn" onclick="isReply = true;" id="addReply">Add Reply</button>
					<button style="float:right" class="btn-default btn" onclick="$('.replyRow').hide();">Close</button>
				</div>
			</div>
				</div>
				
			</div>
	<?php
		include "includes/footer.php";
	?>
	<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<script src="includes/jquery.timeago.js"></script>
	
	<script type="text/javascript">
		var isReply = false, commentID = 0, max = <?php echo $numComments ?>;
		
        $(document).ready(function () {
           $("#addComment, #addReply").on('click', function () {
				var comment;

				if (!isReply)
					comment = $("#mainComment").val();
				else
					comment = $("#replyComment").val();

			   if (comment.length > 5) {
					$.ajax({
						url: 'products.php',
						method: 'POST',
						dataType: 'text',
						data: {
							addComment: 1,
							comment: comment,
							isReply: isReply,
							commentID: commentID
						}, success: function (response) {
							max++;
							$("#numComments").text(max + " Comments");
							
							if (!isReply) {
								$(".userComments").prepend(response);
								$("#mainComment").val("");
							} else {
								commentID = 0;
								$("#replyComment").val("");
								$(".replyRow").hide();
								$('.replyRow').parent().next().append(response);
							}
							
							calcTimeAgo();
						}
						
					});
			   } else
				   alert('Please Check Your Inputs');
		});
		   
		   getAllComments(0, max);
        });
		
		function reply(caller) {
			commentID = $(caller).attr('data-commentID');
			$(".replyRow").insertAfter($(caller));
			$('.replyRow').show();
		}
		
		function calcTimeAgo() {
			$('.timeago').each(function () {
				var timeAgo = $.timeago($(this).attr('data-date'));
				$(this).text(timeAgo);
				$(this).removeClass('timeago');
			});
		}
	
		function getAllComments(start, max) {
			if (start > max) {
				calcTimeAgo();
				return;
			}

			$.ajax({
				url: 'products.php',
				method: 'POST',
				dataType: 'text',
				data: {
					getAllComments: 1,
					start: start
				}, success: function (response) {
					$(".userComments").append(response);
					getAllComments((start+20), max);
				}
			});
		}
    </script>
</body>

</body>
</html>