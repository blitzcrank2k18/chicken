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
  <?php include "../dist/includes/aside_recording.php";?>
  
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delivery
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Delivery</a></li>
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
              <h3 class="box-title">Delivery List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <table id = "example1" class = "table table-responsive table-bordered">
                <thead>
                  <th>RS #</th>
                  <th>Delivery Date</th>
                  <th>Grower</th>
                  <th>Time In Plant</th>
                  <th>Truck Seal</th>
                  <th>Plate No</th>
                  <th>Pcs Hauled</th>
                  <th>ALW</th>
                  <th>Gross Weight</th>
                  <th>Net Weight</th>
                  <th>Driver</th>
                  <th>Status</th>
                </thead>
                <tbody>
      <?php
       include('../dist/includes/dbcon.php');
        $query=mysqli_query($con,"select * from delivery natural join grower order by delivery_date DESC")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
        
                <tr>
                  <td><?php echo $row['delivery_id'];?></td>
                  <td><?php echo $row['delivery_date'];?></td>
                  <td><?php echo $row['grower_name'];?></td>
                  <td><?php echo $row['timeinplant'];?></td>
                  <td><?php echo $row['truck_seal'];?></td>
                  <td><?php echo $row['plateno'];?></td>
                  <td><?php echo $row['pcshauled'];?></td>
                  <td><?php echo $row['alw'];?></td>
                  <td><?php echo $row['gross_weight'];?></td>
                  <td><?php echo $row['net_weight'];?></td>
                  <td><?php echo $row['driver'];?></td>
                  <td><a href="view_delivery.php?id=<?php echo $row['delivery_id'];?>" class="small-box-footer">view</a></td>
                </tr>
                
      <?php }?>          
              </tbody>
            </table>
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
