  <?php
include("includes/header.php");
include("includes/conn.php");

 
if(isset($_POST['btn_save']))
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
    

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
		
mysqli_query($conn,"insert into products (product_cat,product_title,product_price,product_discount, Cat_name, product_image, Status, product_keywords, Stamp_userid,Stamp_username) values ('$product_type','$product_name',
'$price','$discount','$cat_name','$pic_name', '$status', '$tags' , '$Stamp_userid' , '$Stamp_username')") or die ("query incorrect");

 //header("location: sumit_form.php?success=1");
 $url='itemmasterlist.php?msg=add';
    echo "<script>window.location='$url';</script>";
}

mysqli_close($conn);
}
//include "sidenav.php";
//include "topheader.php";
?>
      <!-- End Navbar -->
	  
	  <!-- add product.php -->
      <!--div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categories</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Category</label>
                        <input type="number" id="product_type" name="product_type" required="[1-6]" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Product Brand</label>
                        <input type="number" id="brand" name="brand" required class="form-control">
                      </div>
                    </div>
                     
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Keywords</label>
                        <input type="text" id="tags" name="tags" required class="form-control" >
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div-->
	  
	  <!-- end addproduct.php-->
	  
	  
	  
	  
	  
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
     
        <div class="col-sm-6">
      		  <h1>Product Add Form</h1>
 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
      			  <li class="breadcrumb-item"><a href="dashbord.php">Home</a></li>
      			  <li class="breadcrumb-item"><a href="productlist.php"> Product List</a></li>
     
      				<li class="breadcrumb-item active" id='adduser'>Add Product</li>

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
        			
        				<h3 class="card-title">Add Product </h3>
        			
              </div>
              <!-- /.card-header -->
			<form role="form" method="post"  enctype="multipart/form-data" >
            <div class="card-body">
                <div class="row">
                   
                <div class="col-md-6">
						    <div class="form-group">
	                    	 <label>Product Title</label>
							<input type="text" id="product_name" required name="product_name" class="form-control">
	                  	</div>
                      </div>
                    
                      <div class="col-md-6">
								  <div class="">
                        <label for="">Add Image</label><br>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
						</div>
                   
                     </div>
                    <div class="col-md-6">
					        	<div class="form-group">
	                    		 <label>Category name</label>
                           <input type="text" name="cat_name" required class="form-control" id="catogery" >	
	                  			</div>
					        </div> 
					        
                     <div class="col-sm-6">
					            <div class="form-group ">
								<label>Price</label>
							<input type="text" id="price" name="price" required class="form-control" >
					            </div>
                  </div>
				  
				    <div class="col-md-6">
					            <div class="form-group">
					                <label>Discount Rate</label>
					                <input type="text" id="discount" name="discount" required class="form-control">
					            </div>
                    </div>
					        
                     
				  
				  
				   <div class="col-md-6">
                      <div class="form-group">
                        <label>Product Category</label>
                        <input type="number" id="product_type" name="product_type" required="[1-3]" class="form-control">
                        
                      </div>
                    </div>

                      <div class="col-md-6">
                      <div class="form-group">
                        <label>Product Keywords</label>
                        <input type="text" id="tags" name="tags" required class="form-control" >
                      </div>
                    </div>
                
                    <div class="col-sm-6">
					            <div class="form-group ">
									<label class>Status<span class="required">*</span></label><br>
									<select name="status" required>
									<option value="Y"  selected>Available</option>
									<option value="N" >Not Available</option>
									</select>
					            </div>
                     </div>
            </div>
            <div class="card-footer">
								<!--button type="submit" class="btn btn-primary">Submit</button-->
								<button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Add Product</button>
					  	  <a href="itemmasterlist.php" class="btn btn-danger"> Back</a> 		
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
	  
      <?php
include "includes/footer.php";
?>