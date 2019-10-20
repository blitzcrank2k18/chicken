<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
$year=date("Y/m");
  $sql = "select DATE_FORMAT(delivery_date,'%Y/%m/%d') as date,SUM(pcshauled) as birds,SUM(net_weight) as net_weight,SUM(alw) as alw,SUM(doa_pcs) as doa_pcs,SUM(doa_weight) as doa_weight,SUM(daa_pcs) as daa_pcs,SUM(daa_weight) as daa_weight from delivery where DATE_FORMAT(delivery_date,'%Y/%m')='$year' group by date";
                  $click = mysqli_query($con,$sql);
                  $click = mysqli_fetch_all($click,MYSQLI_ASSOC);
                  $date = json_encode(array_column($click, 'date'),JSON_NUMERIC_CHECK);
                  $click = json_encode(array_column($click, 'birds'),JSON_NUMERIC_CHECK);
?>
<!DOCTYPE html>
<html>

  <?php  include "../dist/includes/head.php";?>
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
  <script type="text/javascript" src="../dist/js/jquery.js"></script>
  <script type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../dist/js/highcharts.js"></script>


  
<script type="text/javascript">
$(function () { 
    var data_click = <?php echo $click; ?>;

    var data = <?php echo $date; ?>;

    $('#container1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Daily Inventory Report'
        },
        xAxis: {
            categories: data
        },
        yAxis: {
            title: {
                text: '# of Birds'
            }
        },
        series: [{
            name: 'Daily Inventory',
            data: data_click
        },]

    });
    
});
</script>

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
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <div class="panel-body">
                  
  <?php $date=date("Y-m-d");?> 
  <h3 style="text-align: center;">Daily Inventory Report for as of <?php echo $date;?></h3><br><br>
    
        
                    <div id="container1"></div>
                    <table id="example1" class="table table-bordered table-striped">
                   
<?php

    
    $query=mysqli_query($con,"select DATE_FORMAT(delivery_date,'%Y/%m/%d') as date,SUM(pcshauled) as birds,SUM(net_weight) as net_weight,SUM(alw) as alw,SUM(doa_pcs) as doa_pcs,SUM(doa_weight) as doa_weight,SUM(daa_pcs) as daa_pcs,SUM(daa_weight) as daa_weight from delivery where DATE_FORMAT(delivery_date,'%Y/%m')='$year' group by date")or die(mysqli_error($con));

    while($row=mysqli_fetch_array($query)){
    
?>                  <tr>
                       <td><?php echo $row['date'];?></td> 
                       <td><?php echo $row['total'];?></td> 
                    </tr>  
<?php }?>
<?php
    
    $query=mysqli_query($con,"select DATE_FORMAT(delivery_date,'%Y/%m/%d') as date,SUM(pcshauled) as birds,SUM(net_weight) as net_weight,SUM(alw) as alw,SUM(doa_pcs) as doa_pcs,SUM(doa_weight) as doa_weight,SUM(daa_pcs) as daa_pcs,SUM(daa_weight) as daa_weight from delivery where DATE_FORMAT(delivery_date,'%Y/%m')='$year' group by DATE_FORMAT(delivery_date,'%Y/%m')")or die(mysqli_error($con));

      $row=mysqli_fetch_array($query);
    
?>
                    <tr>
                       <th>TOTAL INVENTORY</th> 
                       <th><?php echo $row['total'];?></th> 
                    </tr>             
                  </table>       
                </div>
            </div>
        </div>

      <!-- Default box -->
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "../dist/includes/footer.php";?>
    
  

</body>
</html>
