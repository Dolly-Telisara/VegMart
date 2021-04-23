<?php
  include 'includes/header.php';
  include "includes/conn.php";
 
  date_default_timezone_set('Asia/Kolkata');
 
  $admin_id = $_GET['id']; // This id value is fetched from the url
    if($admin_id!=''){
      $sql = "SELECT *FROM orders_info WHERE order_id= {$admin_id}";

      $result = mysqli_query($conn,$sql);
      if (!$result){
        echo("<script>alert('Database1 Error Please check your Db');</script>");
      } 

      $row = mysqli_fetch_assoc($result);  

    }
 
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $id=$_GET['id']; 
    $admin_name = $_POST['f_name'];
    $admin_email = $_POST['email'];
	 $admin_add = $_POST['address'];
	  $admin_amt = $_POST['total_amt'];
    $admin_status = $_POST['status'];
   // $Creationdate=date('d-M-Y'); 
    //$Creationtime= date('h:i:s a'); 
    //$Stamp_userid=$_SESSION['stampuserid'];
    //$Stamp_username=$_SESSION['stampusername'];
   
    $sql = "UPDATE orders_info SET status='{$admin_status}' WHERE order_id = $id";
     $result = mysqli_query($conn,$sql) ;
    
     if (!$result){
        echo("<script>alert('Database 2 Error Please check your Db');</script>");
      }    
    $url='purchasemasterlist.php?msg=update';

    echo "<script>window.location='$url';</script>";
        
  }

 ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		  <h1>  Update Form Order Master </h1>
 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
      			  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
      			  <li class="breadcrumb-item"><a href="purchasemasterlist.php">Order Master List</a></li>
     
      				<li class="breadcrumb-item active" id='adduser'>Update Order Master</li>

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
        			
                <h3 class="card-title"> Order Master List</h3>
              
              </div>
              <!-- /.card-header -->
      <form role="form" method="post"  enctype="multipart/form-data" >
            <div class="card-body">
                <div class="row">
				
                    <!--div class="col-md-6">
						<div class="form-group">
	                		<label for="exampleInputId">Order Id</label>
	                    	<input type="text" class="form-control" id="exampleInputId" name="id" value="<php echo $row['order_id']; ?>">
	                  	</div>
                      </div-->
					  <div class="col-md-6">
					            <div class="form-group">
					                <label for="exampleInputName1">Customer Name</label>
					                <input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $row['f_name']; ?>">
					            </div>
                    </div>
					  
                      <div class="col-md-6">
					            <div class="form-group">
					                <label for="exampleInputEmail1">Email address</label>
					                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $row['email']; ?>">
					            </div>
                    </div>
                      <div class="col-md-6">
					            <div class="form-group">
					                <label for="exampleInputAddress">Address</label>
					                <input type="text" class="form-control" id="exampleInputAddress" name="address" value="<?php echo $row['address']; ?>">
					            </div>
                    </div>

		  <div class="col-sm-6">
					          <div class="form-group ">
									<label class>Status<span class="required">*</span></label>
									<select class="form-control" name="status" required>
													
									  <option value="pending" <?php  if( $row['status']=='pending'){ echo'selected="selected"';}?>selected >Pending</option>
									  <option value="completed" <?php  if( $row['status']=='completed'){ echo'selected="selected"';}?>>Completed</option>
									 <option value="dispatched" <?php  if( $row['status']=='dispatched'){ echo'selected="selected"';}?>>Dispatched</option>
									 <option value="cancelled" <?php  if( $row['status']=='cancelled'){ echo'selected="selected"';}?>>Cancelled</option>
									 
									</select>
									
					            </div>
                            </div>
							</div>
							</div>
            <div class="card-footer">
								
	                  				<button type="submit" class="btn btn-primary">Update</button>
					  		 	
								<a href="purchasemasterlist.php" class="btn btn-danger"> Back</a> 		
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
  include 'includes/footer.php';
 ?>


