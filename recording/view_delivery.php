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
  <?php
           include('../dist/includes/dbcon.php');
           $id=$_REQUEST['id'];
            $query=mysqli_query($con,"select * from delivery natural join grower where delivery_id='$id'")or die(mysqli_error());
              $i=1;
              $row=mysqli_fetch_array($query);
          ?>
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
              
                <!-- /.box-body -->
                <!-- form start -->
              <form class="form-horizontal" method="post" action="delivery_update.php">
             
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#truck" data-toggle="tab" aria-expanded="true">Delivery Details (1)</a></li>
              <li class=""><a href="#coop" data-toggle="tab" aria-expanded="false">Delivery Details (2)</a></li>
              <li>
                  <a href="live_weight.php?id=<?php echo $_REQUEST['id'];?>" class="btn btn-danger">Live Weight Details</a>
              </li>
              <li>
                  <a href="delivery_print.php?id=<?php echo $_REQUEST['id'];?>" class="btn btn-warning"> <i class="fa fa-print"></i> Print Delivery Details</a>
              </li>
            </ul>
            
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="tab-content">
              <div class="tab-pane active" id="truck">
                <?php include "view_truck.php";?>
              </div>
              <form method="post" action="delivery_add.php">
              <!-- /.tab-pane -->
              <div class="tab-pane" id="coop">
                
                <?php include "view_coop.php";?>
                <div class="box-footer">
                  <button type="submit" class="btn btn-default pull-right">Cancel</button>
                  <button type="submit" class="btn btn-info pull-right">Save</button>
                </div>
              </div>

            </form>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
                

                
                <!-- /.box-footer -->
            </div>
            </div>
            <!-- /.box -->
           
         
        
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "../dist/includes/footer.php";?>

  
</div>
<!-- ./wrapper -->
<?php include "../dist/includes/script.php";?>
</body>
</html>
