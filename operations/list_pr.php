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
              <h3 class="box-title">Purchase Request List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <table id = "example1" class = "table table-responsive table-bordered">
                <thead>
                  <th>Customer Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>PR Date</th>
                  <th>Status</th>
                </thead>
                <tbody>
      <?php
       include('../dist/includes/dbcon.php');
        $query=mysqli_query($con,"select * from pr natural join customer order by pr_date DESC")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
        
                <tr>
                  <td><?php echo $row['cust_name'];?></td>
                  <td><?php echo $row['cust_contact'];?></td>
                  <td><?php echo $row['cust_address'];?></td>
                  <td><?php echo $row['pr_date'];?></td>
                  <td><a href="view_pr.php?pr=<?php echo $row['pr_id'];?>" class="small-box-footer">view</a>
                  </td>
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
