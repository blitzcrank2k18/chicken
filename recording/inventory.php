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
    $date=explode('-',$date);
      $start=date("Y/m/d",strtotime($date[0]));
      $end=date("Y/m/d",strtotime($date[1]));

  $sql = "select delivery_date,pcshauled,net_weight,alw,doa_pcs,doa_weight,daa_pcs,daa_weight from delivery where date(delivery_date)>='$start' and date(delivery_date)<='$end' group by delivery_date";
                  $click = mysqli_query($con,$sql);
                  $click = mysqli_fetch_all($click,MYSQLI_ASSOC);
                  $date = json_encode(array_column($click, 'delivery_date'),JSON_NUMERIC_CHECK);
                  $click = json_encode(array_column($click, 'pcshauled'),JSON_NUMERIC_CHECK);
                


?>


<!DOCTYPE html>
<html>
<head>
  <title>Sales Report</title>
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


<script type="text/javascript">


$(function () { 


    var data_click = <?php echo $click; ?>;

    var data = <?php echo $date; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Inventory Report'
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


<div class="container">
  <br/>
  <?php include('../dist/includes/header_report.php');?>
  <h3 style="text-align: center;">Inventory Report for <?php echo $start." to ".$end;?>
   <input class="btn-print btn-primary" type="button" name="print" value="Print" onclick="window.print();window.location.href='sales_report.php';">            </h3><br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div id="container"></div>
                    <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th>Date</th>
                      <th># of Birds</th>
                      <th>Weight</th>
                      <th>ALW</th>
                      <th>DOA pcs</th>
                      <th>DOA kg</th>
                      <th>DAA pcs</th>
                      <th>DAA kg</th>
                    </tr>
<?php
    
    $query=mysqli_query($con,"select delivery_date,pcshauled,net_weight,alw,doa_pcs,doa_weight,daa_pcs,daa_weight from delivery where date(delivery_date)>='$start' and date(delivery_date)<='$end' group by delivery_date")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query)){
    
?>                  <tr>
                       <td><?php echo $row['delivery_date'];?></td> 
                       <td><?php echo $row['pcshauled'];?></td> 
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
