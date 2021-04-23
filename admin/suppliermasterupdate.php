<?php
  include 'includes/header.php';
  include "includes/conn.php";
  date_default_timezone_set('Asia/Kolkata');
 
  $admin_id = $_GET['id']; // This id value is fetched from the url
    if($admin_id!=''){
      $sql = "SELECT *FROM supplier_master WHERE Id = {$admin_id}";

      $result = mysqli_query($conn,$sql);
      if (!$result){
        echo("<script>alert('Databaser Error Please check your Db');</script>");
      } 

      $row = mysqli_fetch_assoc($result);  

    }
 
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $id=$_GET['id']; 

    $admin_name = $_POST['name'];
    $admin_add = $_POST['add'];
    $admin_phn = $_POST['phone'];
    $admin_email = $_POST['email'];
    $admin_gst = $_POST['gst'];
  //  $admin_pass=password_hash($password,PASSWORD_BCRYPT); // To encrypt password
    $admin_status = $_POST['status'];
    $Creationdate=date('d-M-Y');
    $Creationtime= date('h:i:s a'); 
 
    
 $sql = "UPDATE supplier_master SET Name = '{$admin_name}' , Address = '{$admin_add}' , Mobile_No = '{$admin_phn}' , Email= '{$admin_email}' , Gst_No = '{$admin_gst}',Status = '{$admin_status}', Creationdate ='{$Creationdate}',CreationTime='{$Creationtime}' WHERE Id = $id";
 $result = mysqli_query($conn,$sql) ;
    if (!$result){
        echo("<script>alert('Databaser Error Please check your Db');</script>");
      }    
    $url='suppliermasterlist.php?msg=update';

    echo "<script>window.location='$url';</script>";
        

  }



 ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		  <h1>  Update Form Supplier Master</h1>
 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
      			  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
      			  <li class="breadcrumb-item"><a href="suppliermasterlist.php">Supplier Master List</a></li>
     
      				<li class="breadcrumb-item active" id='adduser'>Update Supplier</li>

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
        			
        				<h3 class="card-title">Supplier Master </h3>
        			
              </div>
              <!-- /.card-header -->
			<form role="form" method="post"  enctype="multipart/form-data" >
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
						<div class="form-group">
	                		<label for="exampleInputName1">Name</label>
	                    	<input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $row['Name']; ?>" placeholder="Enter Name" required>
	                  	</div>
                      </div>
                      <div class="col-md-6">
						<div class="form-group">
	                		<label for="exampleInputAddress1">Address</label>
	                    	<input type="text" class="form-control" id="exampleInputAddress1" name="add" value="<?php echo $row['Address']; ?>" placeholder="Enter Address" required>
	                  	</div>
                      </div>
                      <div class="col-md-6">
					        	<div class="form-group">
	                    			<label for="exampleInputMobile">MobileNo <span id="checkno" style="display:none">Check Mobile Number</span></label>
	                    			<input type="text" class="form-control"  onchange="mobile()" id="mobileno" name="phone" value="<?php echo $row['Mobile_No']; ?>" placeholder="Enter Mobile Number" required>
	                  			</div>
					        </div>
                      <div class="col-md-6">
					            <div class="form-group">
					                <label for="exampleInputEmail1">Email address</label>
					                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $row['Email']; ?>"  placeholder="Enter email" required>
					            </div>
                    </div>
                   
					        <div class="col-md-6">
					        			
			            			<div class="form-group">
						                    <label for="exampleInputGst1">Gst No</label>
						                    <input type="text" class="form-control" id="exampleInputGst1" name="gst" value="<?php echo $row['Gst_No']; ?>" placeholder="Password" required>
									</div>
							
                            </div>
                            <div class="col-sm-6">
					            <div class="form-group ">
									<label class>Status<span class="required">*</span></label>
									<select class="form-control" name="status" required>
									<option value="Y" <?php  if($row['Status']=='Y'){ echo'selected="selected"';}?> selected>Active</option>
									<option value="N" <?php  if($row['Status']=='N'){ echo'selected="selected"';}?>>Not Active</option>
									</select>
					            </div>
                            </div>
                           
                </div>
            </div>
            <div class="card-footer">
								
	                  				<button type="submit" class="btn btn-primary">Update</button>
					  		 	
								<a href="suppliermasterlist.php" class="btn btn-danger"> Back</a> 		
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
<script type="text/javascript">

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
			// document.getElementById().style.display = "block";			
		}
		else{
			const button = document.querySelector('button');
			button.disabled = false;
			document.getElementById("checkno").style.display = "none";	
		}
  });
 
 });

</script>

  <?php
  include 'includes/footer.php';
 ?>


