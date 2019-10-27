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
                  $query=mysqli_query($con,"select * from delivery natural join grower where delivery_id='$id' group by delivery_id")or die(mysqli_error($con));
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
                    $delivery_id=$row['delivery_id'];
                    // include('../dist/includes/dbcon.php');
                      $queryl=mysqli_query($con,"select * from `loops` where delivery_id='$delivery_id'")or die(mysqli_error($con));
                        $rowl=mysqli_fetch_array($queryl);
                  ?> 
                  <tr>
                    <td>COOPS TAKEN</td>
                    <td><?php echo $rowl['looptaken'];?></td>
                    <td>COOPS RETURN</td>
                    <td><?php echo $rowl['loopreturn'];?></td>
                    <td>GROSS WEIGHT</td>
                    <td><?php echo $row['gross_weight'];?></td>
                    <td>TIMEIN IN (FARM)</td>
                    <td><?php echo $row['timeinfarm'];?></td>
                  </tr>
               
                  <tr>
                    <td>TIME</td>
                    <td><?php echo date("h:s a",strtotime($rowl['taketime']));?></td>
                    <td>TIME</td>
                    <td><?php echo date("h:s a",strtotime($rowl['returntime']));?></td>
                    <td>COOPS WEIGHT</td>
                    <td><?php echo number_format($rowl['coops_weight'],2);?></td>
                    <td>LOAD START</td>
                    <td><?php echo date("Y-m-d",strtotime($row['loadstart']));?></td>
                  </tr>
                  <tr>
                    <td>DATE</td>
                    <td><?php echo date("Y-m-d",strtotime($rowl['takedate']));?></td>
                    <td>DATE</td>
                    <td><?php echo date("Y-m-d",strtotime($rowl['returndate']));?></td>
                    <td>NET WEIGHT</td>
                    <td><?php echo $row['net_weight'];?></td>
                    <td>LOAD FINISHED</td>
                    <td><?php echo date("Y-m-d",strtotime($row['loadfinish']));?></td>
                  </tr>
                  <tr>
                    <td>GUARD</td>
                    <td><?php echo $rowl['takenguard'];?></td>
                    <td>GUARD</td>
                    <td><?php echo $rowl['returnguard'];?></td>
                    <td>DOA PIECES</td>
                    <td><?php echo $row['doa_pcs'];?></td>
                    <td>HAULER/TRUCK PLATE NO.</td>
                    <td><?php echo $row['plateno'];?></td>
                  </tr>
                  <tr>
                    <td colspan="6"><br><br></td>
                    <th>RS No. <span style="font-size: 22px;color: red"><?php echo $row['delivery_id'];?></span></th>
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
