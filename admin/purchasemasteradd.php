<?php
     
  include 'includes/header.php';
  include "includes/conn.php";

  date_default_timezone_set('Asia/Kolkata');
 
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $supplierid = $_POST['supplierid'];
    $itemid = $_POST['itemid'];
    $qty = $_POST['qty'];
    $amount = $_POST['amount'];
    $Creationdate=date('d-M-Y');
    $Creationtime= date('h:i:s a'); 
    $Stamp_userid=$_SESSION['stampuserid'];
    $Stamp_username=$_SESSION['stampusername'];

    $sql = "INSERT INTO purchase_master(Supplierid,Itemid,Quantity,Amount,Creationdate,Creationtime,Stamp_userid,Stamp_username) VALUES ({$supplierid},{$itemid},{$qty},{$amount},'{$Creationdate}','{$Creationtime}','{$Stamp_userid}','{$Stamp_username}')";
    
    $result = mysqli_query($conn,$sql);
    // check the using item id in itemstock database itemid present or not if present then update that itemid qty either insert 
    // itemid and qty

    $sql1="SELECT *FROM item_stock WHERE Item_code={$itemid}";
    $res = mysqli_query($conn,$sql1); 
    // check row empty if empty then insert
    if(mysqli_num_rows($res)==0){
    $sql2 = "INSERT INTO `item_stock`(`Item_code`, `Quantity`) VALUES ($itemid,$qty)" ;
    $res = mysqli_query($conn,$sql2);  
    echo "insert";
  } 
  
  else{  
      $row = mysqli_fetch_assoc($res);
      $qty = $row['Quantity']+$qty;  
      $sql2 = "UPDATE item_stock SET Quantity=$qty WHERE Item_code=$itemid";
      $res = mysqli_query($conn,$sql2);
    }
 

    if (!$result){
        echo("<script>alert('Databaser Error Please check your Db');</script>");
      } 

   $url='purchasemasterlist.php?msg=add';
    echo "<script>window.location='$url';</script>";
  }

 ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		  <h1>Pucharse Add Form</h1>
 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
      			  <li class="breadcrumb-item"><a href="dashbord.php">Home</a></li>
      			  <li class="breadcrumb-item"><a href="pucharsemasterlist.php"> Pucharse Master List</a></li>
     
      				<li class="breadcrumb-item active" id='adduser'>Pucharse</li>

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
        			
        				<h3 class="card-title">Pucharse Item  </h3>
        			
              </div>
              <!-- /.card-header -->
			<form role="form" method="post"  enctype="multipart/form-data" >
            <div class="card-body">
                <div class="row">
                   
            <div class="col-sm-6">
              <div class="form-group ">
                <label class>Supplier Name<span class="required">*</span></label>
                <select class="form-control" name="supplierid" id="supplierid" required>
                <option value=''>Select Supplier</option>
                <?php        
                      $sql = "SELECT *FROM supplier_master";
                      $result = mysqli_query($conn,$sql) or die("Query Unsuccessful !");                  
                      while($row = mysqli_fetch_assoc($result)){
                  ?>  
                  <option value='<?php echo $row['Id'];?>'  ><?php echo $row['Name'];?></option>
                    <?php } ?>
                </select>
              </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group ">
                <label class>Item Name<span class="required">*</span></label>
                <select class="form-control" name="itemid" id="itemid" required>
                <option value=''>Select Item</option>
                <?php        
                      $sql = "SELECT *FROM item_master";
                      $result = mysqli_query($conn,$sql) or die("Query Unsuccessful !");                  
                      while($row = mysqli_fetch_assoc($result)){
                  ?>  
                  <option value='<?php echo $row['Id'];?>' ><?php echo $row['Item_name'];?></option>
                    <?php } ?>
                </select>
              </div>
              </div>
              <div class="col-md-6">
					      <div class="form-group">
					        <label for="exampleInputEmail1">Quantity</label>
					          <input type="text" class="form-control" id="exampleInputrate" name="qty" value="<?php if(isset($record)){ echo $record->qty;}else {echo'';} ?>"  placeholder="Enter Quantity" required>
					      </div>
              </div>
              <div class="col-md-6">
					      <div class="form-group">
					        <label for="exampleInputEmail1">Amount</label>
					          <input type="text" class="form-control" id="exampleInputrate" name="amount" value="<?php if(isset($record)){ echo $record->amount;}else {echo'';} ?>"  placeholder="Enter Amount" required>
					      </div>
              </div>
            </div>
            <div class="card-footer">
								
	          <button type="submit" class="btn btn-primary">Submit</button>
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
<script type="text/javascript">

$(document).ready(function(){
  $("#supplierid").select2();
  $("#itemid").select2();
  
  $('#mobileno').change(function(){
  	 var x = $('#mobileno').val();
  	var numbers = /^[0-9]+$/;
     var check=x.match(numbers);
 if( x.length!=10 || (check==null) ){
			
			var obj = document.getElementById("checkno");
			const button = document.querySelector('button');
			button.disabled = true;
			obj.setAttribute("style","display: block; display: inline; color:red;");
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