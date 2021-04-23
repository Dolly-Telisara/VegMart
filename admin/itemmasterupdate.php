<?php
  include 'includes/header.php';
  include "includes/conn.php";
 
  date_default_timezone_set('Asia/Kolkata');
 
  $product_id = $_GET['id']; // This id value is fetched from the url

  if($product_id!=''){
      $sql = "SELECT *FROM products WHERE product_id = {$product_id}";
      $result = mysqli_query($conn,$sql);
      if (!$result){
        echo("<script>alert('Database1 Error Please check your Db');</script>");
      } 
      $row = mysqli_fetch_assoc($result);  
    }

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $product_name=$_POST['product_name'];
   $cat_name=$_POST['cat_name'];
   $price=$_POST['price'];
   $discount = $_POST['discount'];
     $status = $_POST['status'];
      $product_type=$_POST['product_type'];
      $tags=$_POST['tags'];
  $Stamp_userid=$_SESSION['stampuserid'];
    $Stamp_username=$_SESSION['stampusername'];
    $item_image = $_FILES['product_image']['product_title'];

    if($item_image==''){
      $picture_name=$row['product_image'];
    } 
    else {
       //$file_name = $_FILES['image']['name'];
       //$file_tmp =$_FILES['image']['tmp_name'];
       //unlink("upload/".$row['product_image']);
      // move_uploaded_file($file_tmp,"upload/".$file_name);  
	   
	   
$picture_name=$_FILES['picture']['name'];
//$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
//$picture_size=$_FILES['picture']['size'];
$pic_name=time()."_".$picture_name;
move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
		

    }

   // $Creationdate=date('d-M-Y');
    //$Creationtime= date('h:i:s a'); 
    //$Stamp_userid=$_SESSION['stampuserid'];
    //$Stamp_username=$_SESSION['stampusername'];
   
    $sql = "UPDATE products SET product_cat='{$item_category}' , product_title = '{$item_name}' ,
    product_price = '{$item_rate}',product_discount='{$item_discount}',Status= '{$item_status}',product_image='{$picture_name}' WHERE product_id = $product_id";

    $result = mysqli_query($conn,$sql);
    
     if (!$result){
        echo("<script>alert('Database2 Error Please check your Db');</script>");
      }    
    $url='itemmasterlist.php?add';
    echo "<script>window.location='$url';</script>";
  }

 ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		  <h1>  Update Form Product Master List</h1>
 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
      			  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
      			  <li class="breadcrumb-item"><a href="itemmasterlist.php">Product Master List</a></li>
     
      				<li class="breadcrumb-item active" id='adduser'>Update Product</li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
        			
                <h3 class="card-title"> Product Master </h3>
              
              </div>
              <!-- /.card-header -->
      <form role="form" method="post"  enctype="multipart/form-data" >
            <div class="card-body">
                <div class="row">
                <div class="col-sm-6">
				<div class="form-group ">
					<label class>Category<span class="required">*</span></label>
					<select class="form-control" name="category" required>
                   
					<option value="Fruits" <?php if($row['product_cat']=='1'){ echo'selected="selected"';}?> selected>Fruits</option>
                    <option value="Vegetables" <?php if($row['product_cat']=='2'){ echo'selected="selected"';}?>>Vegetables</option>
					<option value="Pulses" <?php  if($row['product_cat']=='3'){ echo'selected="selected"';}?>>Pulses</option>
					</select>
				</div>
            </div>

                <div class="col-md-6">
						<div class="form-group">
	                		<label for="exampleInputName1">Title</label>
	                    	<input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $row['product_title']; ?>" placeholder="Enter Name" required>
	                  	</div>
                      </div>
                      <div class="col-md-6">
					            <div class="form-group">
					                <label for="exampleInputEmail1">Price</label>
					                <input type="text" class="form-control" id="exampleInputrate" name="rate" value="<?php echo $row['product_price'];?>"  placeholder="Enter rate" required>
					            </div>
                    </div>

                    <div class="col-md-6">
					            <div class="form-group">
					                <label for="exampleInputEmail1">Discount</label>
					                <input type="text" class="form-control" id="exampleInputdiscount" name="discount" value="<?php echo $row['product_discount']; ?>"  placeholder="Enter rate" required>
					            </div>
                    </div>
					        
                     <div class="col-sm-6">
					            <div class="form-group ">
									<label class>Status<span class="required">*</span></label>
									<select class="form-control" name="status" required>
									<option value="Y" <?php  if( $row['Status']=='Y'){ echo'selected="selected"';}?> selected>Available</option>
									<option value="N" <?php  if($row['Status']=='N'){ echo'selected="selected"';}?>>Not Available</option>
									</select>
					            </div>
                    </div>

                      
                  <div class="col-md-6">
				    <div class="form-group">
					       <label for="exampleInputEmail1">Image</label>
					       <input type="file" class="form-control" id="exampleInputEmail1" name="image" value="<?php echo $row['product_image']; ?>" placeholder="Upload image" required>
			       	   </div> 
                   <img src="product_images/<?php echo $row['product_image'];?>" width="50px" height="50px"><?php echo $row['product_image'];?>
                 </div>
            </div>
            
            <div class="card-footer">					
	        <button type="submit" class="btn btn-primary">Update</button>
	    	<a href="itemmasterlist.php" class="btn btn-danger">Back</a> 		
	 		</div>
            </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->     
            <!-- /.card -->
        </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!--script type="text/javascript">

$(document).ready(function(){
  $('#mobileno').change(function(){
  	 var x = $('#mobileno').val();
	var numbers = /^[0-9]+$/;
     var check=x.match(numbers);
	if( x.length!=10 || (check==null) ){
			var obj = document.getElementById("checkno");
			const button = document.querySelector('button');
			button.disabled = true;
			obj.setAttribute("style", "display: block; display: inline; color:red;");
			//document.getElementById().style.display = "block";			
		}
		else{
			const button = document.querySelector('button');
			button.disabled = false;
			document.getElementById("checkno").style.display = "none";	
		}
    });
 });

</script-->

  <?php
  include 'includes/footer.php';
 ?>



