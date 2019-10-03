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
                <tbody>
      <?php
          include('../dist/includes/dbcon.php');
          
    $sid=$_REQUEST['sid'];
    $query=mysqli_query($con,"select * from sales where sales_id='$sid'")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($query);
        $sid=$row['sales_id'];
        $due=$row['amount_due'];
        $discount=$row['discount'];
        $grandtotal=$due-$discount;
        $tendered=$row['cash_tendered'];
        $change=$row['cash_change'];
?>      
   <h3 class="pull-left">OR # <?php echo $row['sales_id'];?></h3>  
                  <table class="table" width="100%">
                    <thead>

                      <tr>
                        <th>Qty</th>
                        <th>Weight</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th class="text-right">Total</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    $query=mysqli_query($con,"select * from sales_details natural join product where sales_id='$sid'")or die(mysqli_error($con));
      $grand=0;
    while($row=mysqli_fetch_array($query)){
        //$id=$row['temp_trans_id'];
        $total= $row['sales_qty']*$row['sales_price'];
        $weight= $row['sales_kg'];
        $grand=$grand+$row['sales_total'];;
        
?>
                      <tr >
                        <td><?php echo $row['sales_qty'];?></td>
                        <td><?php echo $row['sales_kg'];?></td>
                        <td class="record"><?php echo $row['prod_code'];?></td>
                        <td><?php echo $row['sales_price'];?></td>
                        <td style="text-align:right"><?php echo number_format($total,2);?></td>
                                    
                      </tr>
            

<?php }?>         
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Subtotal</td>
                        <td style="text-align:right"><?php echo number_format($grand,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Discount</td>
                        <td style="text-align:right"><?php echo number_format($discount,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>Grand Total</b></td>
                        <td style="text-align:right"><b><?php echo number_format($grand-$discount,2);?></b></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Cash Tendered</td>
                        <td style="text-align:right"><?php echo number_format($tendered,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>Change</b></td>
                        <td style="text-align:right"><b><?php echo number_format($change,2);?></b></td>
                      </tr>  
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
