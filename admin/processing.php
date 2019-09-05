<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
<?php include "../dist/includes/head.php";?>
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
        Live Weight
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Live Weight</a></li>
        <li class="active">Add New</li>
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
                <h3 class="box-title col-md-12"><a href="index.php" class="btn btn-block btn-success">Finish</a></h3>
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
                  <th>Price</th>
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
                  <td><?php echo $row['prod_price'];?></td>
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
                  <th>Price</th>
                </tr>
                <?php
                 include('../dist/includes/dbcon.php');
                 $id=$_REQUEST['id'];
                  $query=mysqli_query($con,"select * from process natural join product where delivery_id='$id'")or die(mysqli_error());
                    $i=1;
                    $total=0;
                    while($row=mysqli_fetch_array($query)){
                      $total=$total+$row['qty'];
                ?>
        
                <tr>
                  <input type="hidden" class="form-control" id="name" name="id" value="<?php echo $id;?>">
                  <input type="hidden" class="form-control" id="name" name="product" value="<?php echo $row['prod_id'];?>">
                  <td><?php echo $row['prod_code'];?></td>
                  <td><?php echo $row['prod_desc'];?></td>
                  <td><?php echo $row['qty'];?></td>
                  <td><?php echo $row['prod_price'];?></td>
                </tr>
                
          <?php $i++;}?>          
                <tr>
                  <th colspan="2" style="">TOTAL</th>
                  <th colspan="2" style=""><?php echo $total;?></th>
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
                  $query=mysqli_query($con,"select *,SUM(weight) as weight,SUM(coops) as coops from live_weight where delivery_id='$id'")or die(mysqli_error());
                    $row=mysqli_fetch_array($query);
                ?>            
              <table class="table table-striped">
                  <tbody><tr>
                    <th>Total # of Birds (pcs)</th>
                    <th colspan="2"><?php echo $row['coops']*8;?></th>
                  </tr>
                  <tr>
                    <td>Gross Weight (kg)</td>
                    <td colspan="2"><?php echo $row['weight'];?></td>
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
                    <td colspan="2"><?php echo $row['weight'];?></td>
                  </tr>
                  <tr>
                    <td>ALW</td>
                    <td colspan="2"><?php echo $row['coops'];?></td>
                  </tr>
                  <?php
                    // include('../dist/includes/dbcon.php');
                      $query2=mysqli_query($con,"select * from death where delivery_id='$id'")or die(mysqli_error($con));
                        while($row2=mysqli_fetch_array($query2)){
                  ?> 
                  <tr>
                    <td><?php echo strtoupper($row2['death_type']);?></td>
                    <td><?php echo $row2['death_pc'];?> </td>
                    <td><?php echo $row2['death_wt'];?> </td>
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
