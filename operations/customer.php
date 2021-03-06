<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
<?php include "../dist/includes/head.php";?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php include "../dist/includes/header.php";?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include "../dist/includes/aside_operations.php";?>
  
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customer</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-md-4">
            <!-- Horizontal Form -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Add New Customer</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="customer_add.php">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Customer Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Customer Name" name="name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Contact #</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Contact #" name="contact" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputEmail3" placeholder="Address" name="address" required></textarea>
                    </div>
                  </div>
                  
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="reset" class="btn btn-default pull-right">Cancel</button>
                  <button type="submit" class="btn btn-info pull-right">Save</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
          </div>
            <!-- /.box -->
           
            <!-- /.box -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Customer List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <table id = "example1" class = "table table-responsive table-bordered">
                <thead>
                  <th>Customer Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>Action</th>
                </thead>
                <tbody>
      <?php
       include('../dist/includes/dbcon.php');
        $query=mysqli_query($con,"select * from customer order by cust_name")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
        
                <tr>
                  <td><?php echo $row['cust_name'];?></td>
                  <td><?php echo $row['cust_contact'];?></td>
                  <td><?php echo $row['cust_address'];?></td>
                  <td>
                    <a href="#update<?php echo $row['cust_id'];?>" data-target="#update<?php echo $row['cust_id'];?>" data-toggle="modal" class="small-box-footer">edit</a>
      
                  </td>
                </tr>
                <div id="update<?php echo $row['cust_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Customer Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="customer_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Customer Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['cust_id'];?>" required>  
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['cust_name'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Contact</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="price" name="contact" value="<?php echo $row['cust_contact'];?>" required>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Address</label>
          <div class="col-md-9">
            <textarea class="form-control" id="date" name="address" placeholder="Customer Address" required><?php echo $row['cust_address'];?></textarea>
          </div><!-- /.input group -->
        </div><!-- /.form group -->
        
              <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                    
      <?php }?>          
              </tbody></table>
          </div>
        </div>
      <!-- /.box -->
        
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "../dist/includes/footer.php";?>
  

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include "../dist/includes/script.php";?>
</body>
</html>
