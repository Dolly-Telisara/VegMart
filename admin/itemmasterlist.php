<?php
  include 'includes/header.php';
 ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Item Master List</h1>
          </div>
          <div class="col-sm-4">
          <?php if(isset($_GET['add'])){ ?>
              <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <strong>Successfully Data inserted.</strong>
            </div>
            <?php } ?>    
          </div>
       <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Product Master List</li>
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
              <div class="card-header">
                <a href="itemmasteradd.php"><button class="btn btn-primary btn-md ">
                  <i class="nav-icon fa fa-user-plus"></i> ADD</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">   
     <?php
  
  include "includes/conn.php";
  
  $sql = "SELECT *FROM products";
  
  $result = mysqli_query($conn,$sql) or die("Query Unsuccessful !");

  if(mysqli_num_rows($result) > 0)
  {
   ?>
   
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Rate</th>
                    <th>Discount</th>
                    <th>Image</th>
                    <th>Status</th>
					<th>Action</th>
                  </tr>
                  </thead>
                <tbody>
           <?php
            while($row = mysqli_fetch_assoc($result))
            {
        ?>   
		

        <tr>
                <td><?php echo $row['product_id']; ?></td>

               <td> <?php echo $row['product_cat']; ?></td>
                <td><?php echo $row['product_title'];?></td>
                <td><?php echo $row['product_price'];?></td>
                <td><?php echo $row['product_discount'];?></td>
               <td><img src="../product_images/<?php echo $row['product_image'];?>" width="50px" height="50px"></td>
              <?php if( $row['Status']=='Y'){ ?>
                    <td><i class="fa fa-check"  style="color:green"></i></td>
                    <?php }else{ ?>
                    <td><i class="fas fa-times" style="color:red"></i></td>
                    <?php }?>
                 <td>
                    <a href='itemmasterupdate.php?id=<?php echo $row['product_id'];?>'>Update</a>&nbsp 
                    <a href='itemmasterdelete.php?id=<?php echo $row['product_id'];?>'>Delete</a>
                </td>
           </tr>
            <?php } ?>       
        </tbody>
    </table>
	

	<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
	<div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
              
	<!--nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <!--?php 
//counting paging

                $paging=mysqli_query($conn,"select product_id,product_image, product_title,product_price from products");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="itemmasterlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <!--?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav-->
            	

	
    <?php 
    } else
     { 
        echo "<h2> No Record Found !</h2>";
    }
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
 