<?php
  include 'includes/header.php';
 ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Delivery Boy List</h1>
          </div>
          <div class="col-sm-4"> 
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Delivery Boy List</li>
            </ol>
          </div>
        </div>
      </div><!--/container-fluid -->
    </section>
    <!-- Main content -->         
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a href="deliveryboyadd.php"><button class="btn btn-primary btn-md ">
                  <i class="nav-icon fa fa-user-plus"></i> ADD</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">   
     <?php
  
  include "includes/conn.php";
  
  $sql = "SELECT *FROM deliveryboy_master";
  $result = mysqli_query($conn,$sql) or die("Query Unsuccessful !");
  ?>
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>*Picture</th>
                    <th>Status</th>
                    <th>CreationDate</th>
                    <th>CreationTime</th>
                    <th>Stamp_Id</th>
                    <th>Stamp_Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                <tbody>
           <?php
            while($row = mysqli_fetch_assoc($result))
            {
        ?>   
           <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Mobile_no'];?></td>
                <td><?php echo $row['Email'];?></td>
                <!-- <td>?php echo $row['Password'];?></td>-->
                <!-- <td>?php echwo $row['Picture'];?/td> -->
               <td><img src="upload/<?php echo $row['Picture'];?>" width="50px" height="50px"></td>
               <?php if( $row['Status']=='Y'){ ?>
                    <td><i class="fa fa-check"  style="color:green"></i></td>
                    <?php }else{ ?>
                      <td><i class="fas fa-times" style="color:red"></i></td>
                    <?php } ?>
               <td><?php echo $row['Creation_date'];?></td>
               <td><?php echo $row['Creation_Time'];?></td>
               <td><?php echo $row['Stamp_userid'];?></td>
               <td><?php echo $row['Stamp_username'];?></td>
               <td>
                    <a href='deliveryboyupdate.php?id=<?php echo $row['Id'];?>'>Update</a>&nbsp 
                    <a href='deliveryboydeletedata.php?id=<?php echo $row['Id'];?>'>Delete</a>
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