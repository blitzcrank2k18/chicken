<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>

<?php
include('../dist/includes/dbcon.php');
  //require('db_config.php');


  /* Getting demo_viewer table data */
  //$sql = "select SUM(amount_due) from sales natural join sales_details natural join product group by MONTH(date_added)+'-'+YEAR(date_added)";
//  $sql = "SELECT SUM(numberofview) as count FROM demo_viewer 
//      GROUP BY YEAR(created_at) ORDER BY created_at";
//  $viewer = mysqli_query($mysqli,$sql);
//  $viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
//  $viewer = json_encode(array_column($viewer, 'count'),JSON_NUMERIC_CHECK);


  /* Getting demo_click table data */
  $date=$_POST['date'];
 
?>


<!DOCTYPE html>
<html>
<head>
  <title>Daily Inventory Report</title>
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
  <h3 style="text-align: center;">Daily SMFI-Poultry Processing Report for <?php echo $date;?>
   <input class="btn-print btn-primary" type="button" name="print" value="Print" onclick="window.print();window.location.href='delivery_report.php';">            </h3><br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <tr>
                        <th></th>
                        <th>PCS</th>
                        <th>KDW</th>
                        <th></th>
                        <th>PCS</th>
                        <th>Percent</th>
                      </tr>
                      <tr>
                        <th>Volume Received</th>
                        <th></th>
                        <th></th>
                        <th>DOA</th>
                        <th></th>
                        <th></th>
                      </tr>
                      <tr>
                        <th>Volume Processed</th>
                        <th></th>
                        <th></th>
                        <th>DAA</th>
                        <th></th>
                        <th></th>
                      </tr>
                      <tr>
                        <th>Live Weight</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Average</th>
                        <th></th>
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Minimum</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Maximum</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </table>
                    <table id="example1" class="table table-bordered table-striped">
                      <tr>
                        <th colspan="6"></th>
                        <th colspan="3">RECEIVED</th>
                        <th colspan="2">DOA</th>
                        <th colspan="2">DAA</th>
                        <th colspan="2">Runts</th>
                        <th>FIC</th>
                        <th>SHOV</th>
                      </tr>
                      <tr>
                        <th>Growers</th>
                        <th>RS No</th>
                        <th>Plate No</th>
                        <th>Arrived</th>
                        <th>Weighed</th>
                        <th>Hanged</th>
                        <th>Pcs</th>
                        <th>KLW</th>
                        <th>ALW</th>
                        <th>Pcs</th>
                        <th>KLW</th>
                        <th>Pcs</th>
                        <th>KLW</th>
                        <th>Pcs</th>
                        <th>KLW</th>
                        <th>Fic_Wgt</th>
                        <th>Sh/(Ov)</th>
                      </tr>
<?php
    
    $query=mysqli_query($con,"select * from grower natural join delivery where DATE_FORMAT(delivery_date,'%m/%d/%Y')='$date'")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query)){
    
?>                  <tr>
                       <td><?php echo $row['grower_name'];?></td> 
                       <td></td> 
                       <td><?php echo $row['plateno'];?></td> 
                       <td><?php echo $row['timeinplant'];?></td> 
                       <td><?php echo $row['timeweighed'];?></td> 
                       <td><?php echo $row['time_hanged'];?></td>  
                       <td><?php echo $row['pcshauled'];?></td> 
                       <td><?php echo $row['net_weight'];?></td> 
                       <td><?php echo $row['alw'];?></td> 
                       <td><?php echo $row['doa_pcs'];?></td> 
                       <td><?php echo $row['doa_weight'];?></td> 
                       <td><?php echo $row['daa_pcs'];?></td> 
                       <td><?php echo $row['daa_weight'];?></td> 
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
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
