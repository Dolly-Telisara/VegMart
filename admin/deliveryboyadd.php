<?php

  include 'includes/header.php';
  include "includes/conn.php";
  date_default_timezone_set('Asia/Kolkata');
 
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $admin_name = $_POST['name'];
    $admin_phn = $_POST['phone'];
    $admin_email = $_POST['email'];
  // $admin_pass=password_hash($password,PASSWORD_BCRYPT); // To encrypt password
    $admin_status = $_POST['status'];
    // $admin_image = $_FILES['image']['name'];
    $temp = explode(".", $_FILES["image"]["name"]);
    $admin_image = round(date('dmYhis')) . '.' . end($temp);	
    $Creationdate=date('d-M-Y');
    $Creationtime= date('h:i:s a'); 
    $Stamp_userid=$_SESSION['stampuserid'];
    $Stamp_username=$_SESSION['stampusername'];
    
    $sql = "INSERT INTO deliveryboy_master(Name,Mobile_no,Email,Status,Picture,Creation_date,Creation_Time,Stamp_userid,Stamp_username) VALUES ('{$admin_name}','{$admin_phn}','{$admin_email}','{$admin_status}','{$admin_image}','{$Creationdate}','{$Creationtime}',{$Stamp_userid},'{$Stamp_username}')";
    
    $result = mysqli_query($conn,$sql) ;
    // $file_name = $_FILES['image']['name'];
    // $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    
    move_uploaded_file($file_tmp,"upload/".$admin_image);  
    if (!$result){
        echo("<script>alert('Databaser Error Please check your Db');</script>");
      } 
    $url='deliveryboymaster.php?msg=add';
    echo "<script>window.location='$url';</script>";
  }



 ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
     
        <div class="col-sm-6">
      		  <h1>Delivery Boy Add Form</h1>
 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
      			  <li class="breadcrumb-item"><a href="dashbord.php">Home</a></li>
      			  <li class="breadcrumb-item"><a href="deliveryboymaster.php"> Delivery Boy List</a></li>
     
      				<li class="breadcrumb-item active" id='adduser'>Add Delivery</li>

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
        			
        				<h3 class="card-title">Add Delivery Boy </h3>
        			
              </div>
              <!-- /.card-header -->
			<form role="form" method="post"  enctype="multipart/form-data" >
            <div class="card-body">
                <div class="row">
                   
                <div class="col-md-6">
						    <div class="form-group">
	                		<label for="exampleInputName1">Name</label>
	                    	<input type="text" class="form-control" id="exampleInputName" name="name" value="<?php if(isset($record)){ echo $record->name;}else {echo'';} ?>" placeholder="Enter Name" required>
	                  	</div>
                      </div>
                      <div class="col-md-6">
					            <div class="form-group">
					                <label for="exampleInputEmail1">Email address</label>
					                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php if(isset($record)){ echo $record->email;}else {echo'';} ?>"  placeholder="Enter email" required>
					            </div>
                   
                    </div>
                    <div class="col-md-6">
					        	<div class="form-group">
	                    			<label for="exampleInputMobile">MobileNo <span id="checkno" style="display:none">Check Mobile Number</span></label>
	                    			<input type="text" class="form-control"  onchange="mobile()" id="mobileno" name="phone" value="<?php if(isset($record)){ echo $record->mobile;}else {echo'';} ?>" placeholder="Enter Mobile Number" required>
	                  			</div>
					        </div>
					        
                     <div class="col-sm-6">
					            <div class="form-group ">
									<label class>Status<span class="required">*</span></label>
									<select class="form-control" name="status" required>
									<option value="Y"  selected>Active</option>
									<option value="N" >Not Active</option>
									</select>
					            </div>
                  </div>

                      
                  <div class="col-md-6">
					            <div class="form-group">
					                <label for="exampleInputEmail1">Image</label>
					                <input type="file" class="form-control" id="exampleInputEmail1" name="image" value=""  placeholder="Upload image" required>
					            </div>
                           
                 
                </div>
            </div>
            <div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
					  	  <a href="deliveryboymaster.php" class="btn btn-danger"> Back</a> 		
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