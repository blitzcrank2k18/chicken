<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
<?php include "../dist/includes/head.php";?>
<style type="text/css">
  @media print {
          table tr td{
            line-height: 10px!important;
          }
      }
</style>
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
       
            <!-- /.box -->
        <div class="col-md-3 col-sm-3 col-xs-3">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            
            <table class="table">
                <tbody><tr>
                  <th>#</th>
                  <th>Weight</th>
                </tr>
                <?php
                 include('../dist/includes/dbcon.php');
                 $id=$_REQUEST['id'];
                  $query=mysqli_query($con,"select * from live_weight where delivery_id='$id' limit 0,30")or die(mysqli_error());
                    $i=1;
                    while($row=mysqli_fetch_array($query)){
                ?>
        
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['weight'];?></td>
                </tr>
                
                <?php $i++;}?>          
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            
            <table class="table">
                <tbody><tr>
                  <th>#</th>
                  <th>Weight</th>
                </tr>
                <?php
                 include('../dist/includes/dbcon.php');
                 $id=$_REQUEST['id'];
                  $query=mysqli_query($con,"select * from live_weight where delivery_id='$id' limit 30,30")or die(mysqli_error());
                    $i=31;
                    while($row=mysqli_fetch_array($query)){
                ?>
        
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['weight'];?></td>
                </tr>
                
                <?php $i++;}?>          
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <!-- Horizontal Form -->
          <div class="box box-danger">
           
            <table class="table">
                <tbody><tr>
                  <th>#</th>
                  <th>Weight</th>
                </tr>
                <?php
                 include('../dist/includes/dbcon.php');
                 $id=$_REQUEST['id'];
                  $query=mysqli_query($con,"select * from live_weight where delivery_id='$id' limit 60,30")or die(mysqli_error());
                    $i=61;
                    while($row=mysqli_fetch_array($query)){
                ?>
        
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['weight'];?></td>
                </tr>
                
                <?php $i++;}?>          
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-3 col-xs-3">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            
            <table class="table">
                <tbody><tr>
                  <th>#</th>
                  <th>Weight</th>
                </tr>
                <?php
                 include('../dist/includes/dbcon.php');
                 $id=$_REQUEST['id'];
                  $query=mysqli_query($con,"select * from live_weight where delivery_id='$id' limit 90,30")or die(mysqli_error());
                    $i=91;
                    while($row=mysqli_fetch_array($query)){
                ?>
        
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['weight'];?></td>
                </tr>
                
                <?php $i++;}?>          
              </tbody>
            </table>
          </div>
        </div>
       </div>
       <div class="row"> 
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            
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
                    <th>Gross Weight, kgs</th>
                    <th colspan="2"><?php echo $row['coops']*8;?></th>
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
                  <tr>
                    <td>REMARKS</td>
                    <td colspan="2"><?php echo $row['remarks'];?></td>
                  </tr>
                  <tr>
                    <td>Weigher:</td>
                    <td>Verified By:</td>
                  </tr>
                  <tr>
                    <td><?php echo $row['weigher'];?></td>
                    <td><?php echo $row['verifier'];?></td>
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

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include "../dist/includes/script.php";?>
</body>
</html>
