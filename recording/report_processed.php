<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>

<?php
include('../dist/includes/dbcon.php');

  $date=date("Y-m-d",strtotime($_POST['date']));
 
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
<?php

                       include('../dist/includes/dbcon.php');
                        $query1=mysqli_query($con,"select *,SUM(pcshauled) as received,SUM(net_weight) as net_weight,SUM(doa_pcs) as doa_pcs,SUM(daa_pcs) as daa_pcs,AVG(alw) as average,MIN(alw) as min,MAX(alw) as max from delivery where delivery_date='$date' group by delivery_date")or die(mysqli_error($con));
                          $row1=mysqli_fetch_array($query1);
                          $id=$row1['delivery_id'];
                          ?>

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
                        <th><?php echo $row1['received'];?></th>
                        <th><?php echo $row1['net_weight'];?></th>
                        <th>DOA</th>
                        <th><?php echo $row1['doa_pcs'];?></th>
                        <th><?php echo number_format($row1['doa_pcs']/$row1['received']*100,2);?>%</th>
                      </tr>
                      <?php $query2=mysqli_query($con,"select *,SUM(process_weight) as weight,SUM(qty) as process_qty from process where delivery_id='$id' group by delivery_id")or die(mysqli_error($con));
                          $row2=mysqli_fetch_array($query2);
                      ?>
                      <tr>
                        <th>Volume Processed</th>
                        <th><?php echo number_format($row2['process_qty'],2);?></th>
                        <th><?php echo number_format($row2['process_weight'],2);?></th>
                        <th>DAA</th>
                        <th><?php echo $row1['daa_pcs'];?></th>
                        <th><?php echo number_format($row1['daa_pcs']/$row1['received']*100,2);?>%</th>
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
                        <th><?php echo number_format($row1['average'],2);?></th>
                        <th>TOTAL</th>
                        <th><?php echo $row1['received'];?></th>
                        <th>100%</th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Minimum</th>
                        <th><?php echo $row1['min'];?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Maximum</th>
                        <th><?php echo $row1['max'];?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </table>
                    <table id="example1" class="table table-bordered">
                      <tr>
                        <th colspan="6"></th>
                        <th colspan="3" style="text-align: center;">RECEIVED</th>
                        <th colspan="2" style="text-align: center;">DOA</th>
                        <th colspan="2" style="text-align: center;">DAA</th>
                        <th colspan="2" style="text-align: center;">Runts</th>
                        <th style="text-align: center;">FIC</th>
                        <th style="text-align: center;">SHOV</th>
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
   $grand=0;
   $grand_weight=0;
   $grand_doa_pcs=0;
   $grand_doa_wt=0;
   $grand_daa_pcs=0;
   $grand_daa_wt=0;
   $grand_alw=0;

    $queryg=mysqli_query($con,"select * from grower natural join delivery where delivery_date='$date' group by grower_id")or die(mysqli_error($con));
          while($rowg=mysqli_fetch_array($queryg)){
            $grower_id=$rowg['grower_id'];

?>                  <tr>
                       <td colspan="17" style="font-weight: bolder;"><?php echo $rowg['grower_name'];?></td> 
                    </tr>
<?php
    $total_received=0;
    $total_weight=0;
    $doa_weight=0;
    $daa_weight=0;
    $doa_pcs=0;
    $daa_pcs=0;
    $alw=0;
    $i=1;
    $query=mysqli_query($con,"select * from grower natural join delivery where delivery_date='$date' and grower_id='$grower_id'")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query)){
            $total_received=$total_received+$row['pcshauled'];
            $total_weight=$total_weight+$row['net_weight'];
            $doa_pcs=$doa_pcs+$row['doa_pcs'];
            $doa_weight=$doa_weight+$row['doa_weight'];
            $daa_pcs=$daa_pcs+$row['daa_pcs'];
            $daa_weight=$daa_weight+$row['daa_weight'];
            $alw=$alw+$row['alw'];

            
?>                  <tr>
                       <td></td> 
                       <td><?php echo $row['delivery_id'];?></td> 
                       <td><?php echo $row['plateno'];?></td> 
                       <td><?php echo date("h:i A",strtotime($row['timeinplant']));?></td> 
                       <td><?php echo date("h:i A",strtotime($row['timeweighed']));?></td> 
                       <td><?php echo date("h:i A",strtotime($row['time_hanged']));?></td>  
                       <td><?php echo $row['pcshauled'];?></td> 
                       <td><?php echo number_format($row['net_weight'],2);?></td> 
                       <td><?php echo number_format($row['alw'],2);?></td> 
                       <td><?php echo $row['doa_pcs'];?></td> 
                       <td><?php echo number_format($row['doa_weight'],2);?></td> 
                       <td><?php echo $row['daa_pcs'];?></td> 
                       <td><?php echo number_format($row['daa_weight'],2);?></td> 
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                    </tr>  
<?php }
            $i++;
            $grand=$grand+$total_received;
            $grand_weight=$grand_weight+$total_weight;
            $grand_doa_pcs=$grand_doa_pcs+$doa_pcs;
            $grand_doa_wt=$grand_doa_wt+$doa_weight;
            $grand_daa_pcs=$grand_daa_pcs+$daa_pcs;
            $grand_daa_wt=$grand_daa_wt+$daa_weight;
            $grand_alw=($grand_alw+$alw)/$i;
?>
                    <t>
                       <td colspan="6"><?php echo $rowg['grower_name'];?> Total</td> 
                       <td><?php echo $total_received;?></td> 
                       <td><?php echo number_format($total_weight,2);?></td> 
                       <td><?php echo number_format($grand_alw,2);?></td> 
                       <td><?php echo $doa_pcs;?></td> 
                       <td><?php echo number_format($doa_weight,2);?></td> 
                       <td><?php echo $daa_pcs;?></td> 
                       <td><?php echo number_format($daa_weight,2);?></td> 
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                    </tr>  

<?php }?>                  
                    <tr  style="font-weight: bolder;font-size: 16px">
                       <td colspan="6" style="font-weight: bolder;font-size: 18px">Grand Total</td> 
                       <td><?php echo $grand;?></td> 
                       <td><?php echo number_format($grand_weight,2);?></td> 
                       <td><?php echo number_format($grand_alw,2);?></td> 
                       <td><?php echo $grand_doa_pcs;?></td> 
                       <td><?php echo number_format($grand_doa_wt,2);?></td> 
                       <td><?php echo $grand_daa_pcs;?></td> 
                       <td><?php echo number_format($grand_daa_wt,2);?></td> 
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                    </tr>    
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
