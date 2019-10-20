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
        Sales
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sales</a></li>
        <li class="active">List</li>
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
              <h3 class="box-title">Sales List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <table class="table table-striped">
                <tbody><tr>
                  <th>Sales ID</th>
                  <th>Sales Date</th>
                  <th>Customer Name</th>
                  <th>Amount Due</th>
                  <th>Cash Tendered</th>
                  <th>Change</th>
                  <th>View</th>
                </tr>
      <?php
          include('../dist/includes/dbcon.php');
          $query=mysqli_query($con,"select * from sales natural join customer order by sales_date desc")or die(mysqli_error($con));
            
              while($row=mysqli_fetch_array($query)){
              $sid=$row['sales_id'];
              $due=$row['amount_due'];
              $discount=$row['discount'];
              $grandtotal=$due-$discount;
              $tendered=$row['cash_tendered'];
              $change=$row['cash_change'];
      ?>  
        
                <tr>
                  <td><?php echo $row['sales_id'];?></td>
                  <td><?php echo $row['sales_date'];?></td>
                  <td><?php echo $row['cust_name'];?></td>
                  <td><?php echo $row['amount_due'];?></td>
                  <td><?php echo $row['cash_tendered'];?></td>
                  <td><?php echo $row['cash_change'];?></td>
                  <td><a href="view_sales.php?sid=<?php echo $sid;?>" class="small-box-footer">view</a>
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
