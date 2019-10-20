<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<?php

include('../dist/includes/dbcon.php');
  /* Getting demo_click table data */
  $year=$_POST['year'];
  

?>


<!DOCTYPE html>
<html>
<head>
  <title>Sales Report by Customer</title>
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
  <script type="text/javascript" src="../dist/js/jquery.js"></script>
  <script src="../dist/js/highcharts.js"></script>
  <style type="text/css">
      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
</head>
<body>

<div class="container">
  <br/>
  <?php include('../dist/includes/header_report.php');?>
  <h3 style="text-align: center;">Sales Report by Customer for <?php echo $year;?>
   <input class="btn-print btn-primary" type="button" name="print" value="Print" onclick="window.print();window.location.href='inventory_report.php';">            </h3><br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div id="container"></div>
                    <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th>Month</th>
                      <th># of Birds</th>
                      <th>Weight</th>
                      <th>ALW</th>
                      <th>DOA pcs</th>
                      <th>DOA kg</th>
                      <th>DAA pcs</th>
                      <th>DAA kg</th>
                    </tr>
<?php
    
    $query=mysqli_query($con,"select DATE_FORMAT(delivery_date,'%Y/%m') as date,SUM(pcshauled) as birds,SUM(net_weight) as net_weight,SUM(alw) as alw,SUM(doa_pcs) as doa_pcs,SUM(doa_weight) as doa_weight,SUM(daa_pcs) as daa_pcs,SUM(daa_weight) as daa_weight from delivery where year(delivery_date)='$year' group by date")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query)){
    
?>                  <tr>
                       <td><?php echo $row['date'];?></td> 
                       <td><?php echo $row['birds'];?></td> 
                       <td><?php echo $row['net_weight'];?></td> 
                       <td><?php echo $row['alw'];?></td> 
                       <td><?php echo $row['doa_pcs'];?></td> 
                       <td><?php echo $row['doa_weight'];?></td>  
                       <td><?php echo $row['daa_pcs'];?></td> 
                       <td><?php echo $row['daa_weight'];?></td> 
                    </tr>  
<?php }?>
                  </table>       
                  <div style="float: right;margin-right: 200px;margin-top: 50px">
                       Prepared by: <br><br><br>
                       <b><?php echo $_SESSION['name'];?></b>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
