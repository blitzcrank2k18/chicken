<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
$year=date("Y/m");
  $sql = "SELECT SUM(amount_due) as total,DATE_FORMAT(sales_date,'%Y/%m/%d') as date FROM `sales` where DATE_FORMAT(sales_date,'%Y/%m')='$year' group by date";
                  $click = mysqli_query($con,$sql);
                  $click = mysqli_fetch_all($click,MYSQLI_ASSOC);
                  $date = json_encode(array_column($click, 'date'),JSON_NUMERIC_CHECK);
                  $click = json_encode(array_column($click, 'total'),JSON_NUMERIC_CHECK);
?>
<!DOCTYPE html>
<html>

  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
  <script type="text/javascript" src="../dist/js/jquery.js"></script>
  <script type="text/javascript" src="../dist/js/highcharts.js"></script>
  <?php  include "../dist/includes/head.php";?>
  <script type="text/javascript">


$(function () { 


    var data_click = <?php echo $click; ?>;

    var data = <?php echo $date; ?>;

    $('#container1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Sales Report'
        },
        xAxis: {
            categories: data
        },
        yAxis: {
            title: {
                text: 'Sales'
            }
        },
        series: [{
            name: ' Sales',
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
  <?php include "../dist/includes/aside_operations.php";?>
  
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
  <h3 style="text-align: center;">Daily Sales Report for as of <?php echo $date;?></h3><br><br>
    
        
                    <div id="container1"></div>
                    <table id="example1" class="table table-bordered table-striped">
                   
<?php

    
    $query=mysqli_query($con,"SELECT SUM(amount_due) as total,DATE_FORMAT(sales_date,'%Y/%m/%d') as date FROM `sales` where DATE_FORMAT(sales_date,'%Y/%m')='$year' group by date")or die(mysqli_error($con));

    while($row=mysqli_fetch_array($query)){
    
?>                  <tr>
                       <td><?php echo $row['date'];?></td> 
                       <td><?php echo $row['total'];?></td> 
                    </tr>  
<?php }?>
<?php
    
    $query=mysqli_query($con,"SELECT SUM(amount_due) as total FROM `sales` where DATE_FORMAT(sales_date,'%Y')='2019'")or die(mysqli_error($con));

      $row=mysqli_fetch_array($query);
    
?>
                    <tr>
                       <th>TOTAL SALES</th> 
                       <th><?php echo $row['total'];?></th> 
                    </tr>             
                  </table>       
                </div>
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
