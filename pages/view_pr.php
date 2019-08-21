<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
<?php include "../dist/includes/head.php";?>
<style type="text/css">
      h3 {
            text-align:center!important;
          }
     @media print {
          .btn-print {
            display:none !important;
          }
          footer{
            display: none;
          }
      }
    </style>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-red sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php include "../dist/includes/header.php";?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include "../dist/includes/aside.php";?>
  
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
        <li><a href="list_pr.php">Purchase Request</a></li>
        <li class="active">View</li>
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
              <h3 style="text-align: center!important;">Purchase Request</h3>

                  <a href="pr.php" class="btn btn-default btn-print pull-right">Back</a>
                 <a onclick = "window.print()" href="" class="btn btn-success btn-print pull-right">Print</a>
               
              </div>
            
            <!-- /.box-header -->
            <?php $pr=$_REQUEST['pr'];
             include('../dist/includes/dbcon.php');
              $query=mysqli_query($con,"select * from pr natural join customer where pr_id='$pr'")or die(mysqli_error());
                $row=mysqli_fetch_array($query);
            ?>
            <div class="box-body">
              <div class="form-group col-md-12 col-xs-12">
                    <label class="control-label col-md-4 col-xs-4" for="name">Customer Name</label>
                    <div class="col-md-8 col-xs-6">
                      <?php echo $row['cust_name'];?>
                    </div>
              </div> 
              <div class="form-group col-md-12 col-xs-12">
                    <label class="control-label col-md-4 col-xs-4" for="name">Contact #</label>
                    <div class="col-md-8 col-xs-6">
                      <?php echo $row['cust_contact'];?>
                    </div>
              </div> 
              <div class="form-group col-md-12 col-xs-12">
                    <label class="control-label col-md-4 col-xs-4" for="name">Address</label>
                    <div class="col-md-8 col-xs-6">
                      <?php echo $row['cust_address'];?>
                    </div>
              </div> 
              <div class="form-group col-md-12 col-xs-12">
                    <label class="control-label col-md-4 col-xs-4" for="name">PR Date</label>
                    <div class="col-md-8 col-xs-6">
                      <?php echo $row['pr_date'];?>
                    </div>
              </div> 
              
            </div>
            
            <table class="table table-striped">
                <tbody><tr>
                  <th>Qty</th>
                  <th>Weight</th>
                  <th>Product Code</th>
                  <th>Price</th>
                </tr>
      <?php
       include('../dist/includes/dbcon.php');
        $query=mysqli_query($con,"select * from pr_details natural join product where pr_id='$pr'")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
        
                <tr>
                  <td><?php echo $row['pr_qty'];?></td>
                  <td><?php echo $row['pr_weight'];?></td>
                  <td><?php echo $row['prod_code'];?></td>
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
