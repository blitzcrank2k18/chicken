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
<!-- ADD tdE CLASS sidebar-collapse TO HIDE tdE SIDEBAR PRIOR TO LOADING tdE SITE -->
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php include "../dist/includes/header.php";?>
  <!-- =============================================== -->

  <!-- Left side column. contains tde sidebar -->
  <?php include "../dist/includes/aside_recording.php";?>
  
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delivery Details 
        <a class="btn btn-print btn-success" type="button" name="print" onclick="window.print();window.location.href='list_delivery.php';"> <i class="fa fa-print"></i> Print</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Delivery</a></li>
        <li class="active">Print</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
       
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            
            <?php
                 include('../dist/includes/dbcon.php');
                 $id=$_REQUEST['id'];
                  $query=mysqli_query($con,"select *,SUM(weight) as weight,SUM(coops) as coops from live_weight natural join delivery natural join grower where live_weight.delivery_id='$id' group by delivery_id")or die(mysqli_error());
                    $row=mysqli_fetch_array($query);
                ?>            
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>TRUCK SEAL</td>
                    <td><?php echo $row['truck_seal'];?></td>
                    <td>TIME WEIGHED</td>
                    <td><?php echo $row['timeweighed'];?></td>
                    <td></td>
                    <td></td>
                  </tr>  
                  <tr>
                    <td>TRIP #</td>
                    <td><?php echo $row['tripno'];?></td>
                    <td>AVE. LIVE WEIGHT</td>
                    <td><?php echo $row['alw'];?></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>NO. OF CREW</td>
                    <td><?php echo $row['noofcrew'];?></td>
                    <td>WEIGHER</td>
                    <td><?php echo $row['delivery_weigher'];?></td>
                    <td>DATE</td>
                    <td><?php echo $row['delivery_date'];?></td>
                  </tr>
                  <tr>
                    <td>TIMEOUT FARM</td>
                    <td><?php echo $row['timeoutfarm'];?></td>
                    <td>BIRDS PER COOP</td>
                    <td><?php echo $row['birdspercoop'];?></td>
                    <td>GROWER</td>
                    <td><?php echo $row['grower_name'];?></td>
                  </tr>
                  <tr>
                    <td>PCS. HAULED</td>
                    <td><?php echo $row['pcshauled'];?></td>
                    <td>NO. OF COOPS WITHOUT COVER</td>
                    <td><?php echo $row['coopswocover'];?></td>
                    <td>LOCATION</td>
                    <td><?php echo $row['grower_address'];?></td>
                  </tr>
                  <tr>
                    <td>HOUSE NO.</td>
                    <td><?php echo $row['houseno'];?></td>
                    <td></td>
                    <td></td>
                    <td>DESTINATION</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>FARM CHECKER</td>
                    <td><?php echo $row['farmchecker'];?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>DATE/TIME FEED</td>
                    <td><?php echo $row['datefeed']." ".$row['timefeed'];?></td>
                    <td></td>
                    <td></td>
                    <td>TIME IN PLANT</td>
                    <td><?php echo $row['timeinplant'];?></td>
                  </tr>
                  <tr>
                    <td colspan="6">TRUCK WITH BIRDS BEFORE GOING OUT OF THE FARM WAS:
                      <p>REASON: </p>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-striped">
                  <?php
                    // include('../dist/includes/dbcon.php');
                      $query1=mysqli_query($con,"select * from loops where delivery_id='$id'")or die(mysqli_error($con));
                        while($row1=mysqli_fetch_array($query1)){
                  ?> 
                  <tr>
                    <td>COOPS TAKEN</td>
                    <td><?php echo $row1['looptaken'];?></td>
                    <td>COOPS RETURN</td>
                    <td><?php echo $row1['loopreturn'];?></td>
                    <td>GROSS WEIGHT</td>
                    <td><?php echo $row['gross_weight'];?></td>
                    <td>TIMEIN IN (FARM)</td>
                    <td><?php echo $row['timeinfarm'];?></td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>TIME</td>
                    <td><?php echo $row1['taketime'];?></td>
                    <td>TIME</td>
                    <td><?php echo $row1['returntime'];?></td>
                    <td>COOPS WEIGHT</td>
                    <td><?php echo $row1['coops_weight'];?></td>
                    <td>LOAD START</td>
                    <td><?php echo $row1['loadstart'];?></td>
                  </tr>
                  <tr>
                    <td>DATE</td>
                    <td><?php echo $row1['takedate'];?></td>
                    <td>DATE</td>
                    <td><?php echo $row1['returndate'];?></td>
                    <td>NET WEIGHT</td>
                    <td><?php echo $row['net_weight'];?></td>
                    <td>LOAD FINISHED</td>
                    <td><?php echo $row1['loadfinish'];?></td>
                  </tr>
                  <tr>
                    <td>GUARD</td>
                    <td><?php echo $row1['taketime'];?></td>
                    <td>GUARD</td>
                    <td><?php echo $row1['returntime'];?></td>
                    <td>DOA PIECES</td>
                    <td><?php echo $row1['doa_pcs'];?></td>
                    <td>HAULER/TRUCK PLATE NO.</td>
                    <td><?php echo $row['plateno'];?></td>
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

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include "../dist/includes/script.php";?>
</body>
</html>
