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
              
                <!-- /.box-body -->
                <!-- form start -->
              <form class="form-horizontal" method="post" action="delivery_add.php">
             
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#truck" data-toggle="tab" aria-expanded="true">Truck Details</a></li>
              <li class=""><a href="#chicken" data-toggle="tab" aria-expanded="false">Chicken Details</a></li>
              <li class=""><a href="#coop" data-toggle="tab" aria-expanded="false">Coop Details</a></li>
              <li>
                  <a href="live_weight.php?id=<?php echo $_REQUEST['id'];?>" class="btn btn-danger">Live Weight Details</a>
              </li>
            </ul>
            <?php 
              $id=$_REQUEST['id'];
            ?>
            <div class="tab-content">
              <div class="tab-pane active" id="truck">
                <?php include "view_truck.php";?>
              </div>
              <form method="post" action="delivery_add.php">
              <!-- /.tab-pane -->
              <div class="tab-pane" id="chicken">
                <?php include "view_chicken.php";?>
              </div>
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

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  
</div>
<!-- ./wrapper -->
<?php include "../dist/includes/script.php";?>
</body>
</html>
