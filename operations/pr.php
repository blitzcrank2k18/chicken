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
        Purchase Request
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase Request</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Add New Purchase Request</h3>
                <!-- /.box-body -->
                <!-- form start -->
              <form class="form-horizontal" method="post" action="pr_add.php">
                <div class="box-footer">
                  <button type="submit" class="btn btn-default pull-right">Cancel</button>
                  <button type="submit" class="btn btn-info pull-right">Save</button>
                </div>
              </div>
              <!-- /.box-header -->
              
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Customer Name</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" name="name" required>
                      <?php
                       include('../dist/includes/dbcon.php');
                        $query2=mysqli_query($con,"select * from customer order by cust_name")or die(mysqli_error());
                          while($row2=mysqli_fetch_array($query2)){
                          ?>
                            <option value="<?php echo $row2['cust_id'];?>"><?php echo $row2['cust_name'];?></option>
                        <?php }?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="name">PR Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="name" name="date" value="<?php echo date('Y-m-d');?>" required>  
                    </div>
                  </div> 
                </div>

                
                <!-- /.box-footer -->
            </div>
            </div>
            <!-- /.box -->
           
            <!-- /.box -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <table class="table table-striped">
                <tbody><tr>
                  <th style="width:100px">Qty</th>
                  <th style="width:100px">Kg/s</th>
                  <th>Product Code</th>
                  <th>Description</th>
                  <th style="width: 100px">Price</th>
                </tr>
      <?php
       include('../dist/includes/dbcon.php');
        $query=mysqli_query($con,"select * from product order by prod_code")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
        
                <tr>
                  <td>
                    <input type="hidden" class="form-control" id="name" name="id[]" value="<?php echo $row['prod_id'];?>">
                    <input type="number" class="form-control" id="name" name="qty[]">
                  </td>
                  <td><input type="text" class="form-control" id="name" name="kg[]"></td>
                  <td><?php echo $row['prod_code'];?></td>
                  <td><?php echo $row['prod_desc'];?></td>
                  <td><?php echo $row['prod_price'];?></td>
                </tr>
                
      <?php }?>          
              </tbody></table>
              </form>
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
