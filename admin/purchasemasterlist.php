<?php
  include 'includes/header.php';

  include "includes/conn.php";
 ?>
 
 
 
 
    <?php

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}

?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Order Master List</h1>
          </div>
          <div class="col-sm-4">    
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Order Master List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <!--div class="card-header">
                <a href="purchasemasteradd.php"><button class="btn btn-primary btn-md ">
                  <i class="nav-icon fa fa-user-plus"></i> ADD</button></a>
              </div-->
              <!-- /.card-header -->
              <div class="card-body">
     <?php
  
      //<tr><th>Customer Name</th><th>Products</th><th>Contact | Email</th><th>Address</th><th>Details</th><th>Shipping</th><th>Time</th>
        //            </tr></thead>
          //          <tbody>
            //          <php               
	//$result=mysqli_query($con,"select order_id, product_title, first_name, mobile, email, address1, address2, product_price,address2, qty from orders,products,user_info
		//				where orders.product_id=products.product_id and user_info.user_id=orders.user_id Limit $page1,10")or die ("query 1 incorrect.....");
  
  //$sql="select order_id, product_title, first_name, mobile, email, address1,address2, product_price, qty from orders,products,user_info
			//where orders.product_id=products.product_id and user_info.user_id=orders.user_id Limit $page1,10";	
			
			
			
  $sql="select *from orders_info";
  
		
			

  $result = mysqli_query($conn,$sql) or die("Query Unsuccessful !");


  ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Order_Id</th>
                    <!--th>Product</th-->
                    <th>Customer_Name</th>
                    <th>Contact</th>
                    <!--th>Email</th-->
                    <th>Address</th>
                    <th>Zip Code</th>
					<!--th>Price</th-->
                    <th>Quantity</th>
                    <th>Total_Amount</th>
					<th>Status</th>
                  </tr>
                  </thead>
                <tbody>
                <?php
           while($row = mysqli_fetch_assoc($result))
            {
        ?>   
        
        <tr>
                <td><?php echo $row['order_id']; ?></td>
                <!--td><php echo $row['product_id'];?></td-->
                <td><?php echo $row['f_name'];?></td>
                <!--td><php echo $row['mobile'];?></td-->
                <td><?php echo $row['email'];?></td>
               <td><?php echo $row['address'];?></td>
               <td><?php echo $row['zip'];?></td>
               <!--td><php echo $row['product_price'];?></td-->
               <td><?php echo $row['prod_count'];?></td>
               <td><?php echo $row['total_amt'];?></td>
			   <td><?php echo $row['status'];?></td>

					<td>
					  <a href='purchasemasterupdate.php?id=<?php echo $row['order_id'];?>'>Update</a>&nbsp 
					</td>
           </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php 
    mysqli_close($conn);
        ?>
              </div>
              <!-- /.card-body -->  
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>	
 <?php
  include 'includes/footer.php';
 ?>
 <script type="text/javascript">
   <?php if(isset($_GET['msg']) && $_GET['msg']=='delete'){ ?>
      toastr.error('  Successfully  Delete .  ')    
  <?php } ?>
  <?php if(isset($_GET['msg'])&&$_GET['msg']=='add'){ ?>
    toastr.success(' Successfully Add  ')
  <?php } ?>
  <?php if(isset($_GET['msg'])&&$_GET['msg']=='update'){ ?>
    toastr.success(' Successfully Update ')
  <?php } ?>
 </script>