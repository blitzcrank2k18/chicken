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
        Processed
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Processed</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-md-2">
            <!-- Horizontal Form -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title col-md-12">
                  <a href="index.php" class="btn btn-block btn-danger">Finish</a>
                    <a href="live_weight.php?id=<?php echo $_REQUEST['id'];?>" class="btn btn-block btn-warning">Back</a>
                </h3>
                <!-- /.box-body -->
                <!-- form start -->
              </div>
              
            </div>
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title col-md-12"><a href="process_form.php?id=<?php echo $_REQUEST['id'];?>" class="btn btn-block btn-success"><i class="fa fa-print"> </i> Print</a></h3>
                <!-- /.box-body -->
                <!-- form start -->
              </div>
              
            </div>
        </div>
            <!-- /.box -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Chicken Processing</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="processing_add.php">
            <table class="table table-striped">
                <tbody><tr>
                  <th>Product Code</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th>Weight</th>
                </tr>
                <?php
                 include('../dist/includes/dbcon.php');
                 $id=$_REQUEST['id'];
                  $query=mysqli_query($con,"select * from product")or die(mysqli_error());
                    $i=1;
                    while($row=mysqli_fetch_array($query)){
                ?>
        
                <tr>
                  <input type="hidden" class="form-control" id="name" name="id" value="<?php echo $id;?>">
                  <input type="hidden" class="form-control" id="name" name="product[]" value="<?php echo $row['prod_id'];?>">
                  <td><?php echo $row['prod_code'];?></td>
                  <td><?php echo $row['prod_desc'];?></td>
                  <td><input type="number" class="form-control" id="name" name="qty[]"></td>
                  <td><input type="text" class="form-control" id="name" name="weight[]"></td>
                </tr>
                
          <?php $i++;}?>          
                <tr>
                  <td colspan="4"><button type="submit" class="btn btn-info pull-right">Save</button></td>
                </tr>
              </tbody>
            </table>
              </form>
          </div>

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Processed List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <table class="table table-striped">
                <tbody><tr>
                  <th>Product Code</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th>Weight</th>
                </tr>
                <?php
                 include('../dist/includes/dbcon.php');
                 $id=$_REQUEST['id'];
                 $weight=0;
                  $query=mysqli_query($con,"select * from process natural join product where delivery_id='$id'")or die(mysqli_error());
                    $i=1;
                    $total=0;
                    $amount=0;
                    while($row=mysqli_fetch_array($query)){
                      $total=$total+$row['qty'];
                      $weight=$weight+$row['process_weight'];
                ?>
        
                <tr>
                  <input type="hidden" class="form-control" id="name" name="id" value="<?php echo $id;?>">
                  <input type="hidden" class="form-control" id="name" name="product" value="<?php echo $row['prod_id'];?>">
                  <td><?php echo $row['prod_code'];?></td>
                  <td><?php echo $row['prod_desc'];?></td>
                  <td><?php echo $row['qty'];?></td>
                  <td><?php echo $row['process_weight'];?></td>
                </tr>
                
          <?php $i++;}?>          
                <tr>
                  <th colspan="2" style="">TOTAL</th>
                  <th colspan="" style=""><?php echo $total;?></th>
                  <th><?php echo number_format($weight,2);?></th>
                </tr>
              </tbody>
            </table>
            
          </div>

        </div>
        <div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Summary of Live Chicken</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                 include('../dist/includes/dbcon.php');
                  $query=mysqli_query($con,"select *,SUM(weight) as weight,SUM(coops) as coops from live_weight natural join delivery where live_weight.delivery_id='$id' group by delivery_id")or die(mysqli_error());
                    $row=mysqli_fetch_array($query);
                ?>            
              <table class="table table-striped">
                  <tbody>
                  <tr>
                    <th>Total # of Birds (pcs)</th>
                    <th colspan="2"><?php echo $row['pcshauled'];?></th>
                  </tr>  
                  <tr>
                    <th>Processed Chicken</th>
                    <th colspan="2"><?php echo $row['coops']*8;?></th>
                  </tr>
                  <tr>
                    <th class="text-red">Unprocessed Chicken</th>
                    <th colspan="2" class="text-red"><?php echo $row['pcshauled']-$row['coops']*8;?></th>
                  </tr>
                  <tr>
                    <td>Gross Weight (kg)</td>
                    <td colspan="2"><?php echo $row['gross_weight'];?></td>
                  </tr>
                  <tr>
                    <th colspan="3">Coops Tare Weight (kg)</th>
                  </tr>
                  <tr>
                    <th>Tare Wt./Pc</th>
                    <th>No. of Pcs.</th>
                    <th>Tare Wt. Total</th>
                  </tr>
                  <?php
                    // include('../dist/includes/dbcon.php');
                      $query1=mysqli_query($con,"select * from tare where delivery_id='$id'")or die(mysqli_error($con));
                        while($row1=mysqli_fetch_array($query1)){
                  ?> 
                  <tr>
                    <td><?php echo $row1['tare_weight'];?></td>
                    <td><?php echo $row1['tare_pc'];?></td>
                    <td><?php echo $row1['tare_total'];?></td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>Net Weight (kg)</td>
                    <td colspan="2"><?php echo $row['net_weight'];?></td>
                  </tr>
                  <tr>
                    <td>ALW</td>
                    <td colspan="2"><?php echo $row['coops'];?></td>
                  </tr>
                  <tr>
                    <td>DOA</td>
                    <td><?php echo $row['doa_pcs'];?> </td>
                    <td><?php echo $row['doa_weight'];?> </td>
                  </tr>
                  <tr>
                    <td>DAA</td>
                    <td><?php echo $row['daa_pcs'];?> </td>
                    <td><?php echo $row['daa_weight'];?> </td>
                  </tr>
                  
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
