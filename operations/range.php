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

  $sql = "select SUM(amount_due) as total,DATE_FORMAT(sales_date,'%Y/%m/%d') as date from sales where date(sales_date)>='$start' and date(sales_date)<='$end' group by date";
                  $click = mysqli_query($con,$sql);
                  $click = mysqli_fetch_all($click,MYSQLI_ASSOC);
                  $date = json_encode(array_column($click, 'date'),JSON_NUMERIC_CHECK);
                  $click = json_encode(array_column($click, 'total'),JSON_NUMERIC_CHECK);
                


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
            name: 'Date',
            data: data_click
        },]

    });
    
});


</script>


<div class="container">
  <br/>
  <h2 style="text-align: center;">Sales Report for <?php echo $start." to ".$end;?>
   <input class="btn-print btn-primary" type="button" name="print" value="Print" onclick="window.print();window.location.href='sales_report.php';">            </h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div id="container"></div>
                    <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th>Month</th>
                      <th>Sales</th>
                    </tr>
<?php
    
    $query=mysqli_query($con,"select SUM(amount_due) as total,DATE_FORMAT(sales_date,'%Y/%m/%d') as date from sales where date(sales_date)>='$start' and date(sales_date)<='$end' group by date")or die(mysqli_error($con));
    $qty=0;$grand=0;$discount=0;
                while($row=mysqli_fetch_array($query)){
    
?>                  <tr>
                       <td><?php echo $row['date'];?></td> 
                       <td><?php echo number_format($row['total'],2);
                ?></td> 
                    </tr>  
<?php }?>
<?php
    
    $query=mysqli_query($con,"select SUM(amount_due) as total,DATE_FORMAT(sales_date,'%Y/%m/%d') as date from sales where date(sales_date)>='$start' and date(sales_date)<='$end'")or die(mysqli_error($con));

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
</div>


</body>
</html>
