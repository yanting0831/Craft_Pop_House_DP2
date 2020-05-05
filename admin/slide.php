<?php
	$connection = mysqli_connect('localhost','root','','cph');	
?>
<?php include('AdminInterface.php') ?>
	<div class="row">
    
    <div class="col-md-4"></div>
	<div class="col-md-8 bg">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Insert Slide </h3>
           </div>
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Slide Name  </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="slide_name" type="text" class="form-control" required>
                      </div>
                   </div>
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Slide Image </label> 
                      
                      <div class="col-md-6"> 
                          <input name="slide_image" type="file" class="form-control" required>  
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label> 
                      <div class="col-md-6">
                          <input name="submit" value="Submit" type="submit" class="btn btn-primary form-control"> 
                      </div>   
                   </div>
               </form>  
           </div>  
        </div>
    </div>
	</div>


<?php
	if(isset($_POST['submit']))
	{
		$slide_name=$_POST['slide_name'];
		$slide_image=$_FILES['slide_image']['name'];
		$temp_name=$_FILES['slide_image']['tmp_name'];
		$view_slides = "select * from slide";
		$view_run_slides = mysqli_query($connection,$view_slides);
		$count = mysqli_num_rows($view_run_slides);
		
		if($count <4 ){
		
			move_uploaded_file($temp_name,"images/$slide_image");
			$insert_slide = "insert into slide
			(slide_name,slide_image) values
			('$slide_name','$slide_image')";
			
			$run_slide= mysqli_query($connection,$insert_slide);
			
			echo "<script>alert('slide has been inserted successfully')</script>";
			echo "<script>window.open('slide.php','_self')</script>";
		}else
		{
			echo "<script>alert('You have already insert 4 slides')</script>";
	
		}
	}
?>