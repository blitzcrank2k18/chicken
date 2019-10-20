<?php
include('../dist/includes/dbcon.php');
$today = date("M d, Y H:i:s");

  /* Getting demo_click table data */
  $sql = "SELECT *,SUM(total) as amount, DATE_FORMAT(sales_date,'%Y-%m') as date  FROM `sales` group by date ORDER BY date";
    $click = mysqli_query($con,$sql);
    $click = mysqli_fetch_all($click,MYSQLI_ASSOC);
    
                                                    

$query1=mysqli_query($con,"SELECT * FROM (SELECT *,SUM(total) as amount, DATE_FORMAT(sales_date,'%Y-%m') as date FROM `sales`  group by date ORDER BY date DESC limit 4) sub order by date asc")or die(mysqli_error($con));
                        
                        $percent=array();
                        $label=array();
                                $num=mysqli_num_rows($query1);
                                $amount1=0;
                                $amount2=0;
                                $amount3=0;
                                $amount4=0;
                                $i=4;

                                while($row=mysqli_fetch_array($query1))
                                {
                                    $date=$row['date'];
                                    //$quarter=$row['month']; 
                                    $amount=$row['amount']; 
                                    
                                    if ($i==4)
                                    {
                                        $amount1=$amount;
                                        $date1=$date;
                                        $percent[]=$amount1;
                                        $label[]=$date1;
                                    }
                                    if ($i==3)
                                    {
                                        $amount2=$amount;
                                        $date2=date("Y-m",strtotime($date1. " + 1 month"));
                                        $percent[]=$amount2;
                                        $label[]=$date2;
                                    }
                                    if ($i==2)
                                    {
                                        $amount3=$amount;
                                        $date3=date("Y-m",strtotime($date2. " + 1 month"));
                                        $percent[]=$amount3;
                                        $label[]=$date3;
                                    }
                                    if ($i==1)
                                    {
                                        $amount4=$amount;
                                        $date4=date("Y-m",strtotime($date3. " + 1 month"));
                                        $percent[]=$amount4;
                                        $label[]=$date4;
                                    }

                                    $i--;
                                    
                                }
                                $date5=$date4;
                                $counter=0;
                                if ($num>=4)
                                {

                                while ($counter < 8) {
                                    # code...
                                    $date5=date("Y-m",strtotime($date5. " + 1 month"));
                                    $amount5=($amount4+$amount3+$amount2+$amount1)/4;
                                    //$increase=($amount5-$amount1)/$amount1*100;
                                //    echo $month['$i']." ".$year['$i']." - "." -> ".
                                    //echo " ".$amount[4];
                                    $amount1=$amount2;
                                    $amount2=$amount3;
                                    $amount3=$amount4;
                                    $amount4=$amount5;
                                    $percent[]=$amount5;
                                    $label[]=$date5;
                                    $counter++;
                                                         //print_r($percent);
                                $click = json_encode($percent, JSON_NUMERIC_CHECK);
                                $date = json_encode($label,JSON_NUMERIC_CHECK);
                                //$click = json_encode($click,$label,JSON_NUMERIC_CHECK);
}                        }       //$click = json_encode($percent),JSON_NUMERIC_CHECK);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Sales Forecast</title>
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

    $('#graph').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: '1 Year Sales Forecast'
        },
        xAxis: {
            title: {
                text: 'Month'
            },
            categories: data
        },

        yAxis: {
            title: {
                text: 'Sales'
            }
        },
        series: [{
            name: 'Total Sales Per Month',
            data: data_click
        },]

    });
    
});


</script>


<div class="container">
  <br/>
  
   <input class="btn-print btn-primary pull-right" type="button" name="print" value="Print" onclick="window.print();window.location.href='forecast.php';">            </h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                 <div class = "panel-body">
                  <?php
                    include('../dist/includes/header_report.php');
                    echo "<h4 style='text-align:center'>Sales Forecast Report $today</h4>";    
                        ?><br><br><br>
                <div id="graph"></div>
                <table id = "" class = "table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>YEAR/MONTH</th>
                            <th>ACTUAL SALES</th>
                            <th>SALES FORECAST</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            $query1=mysqli_query($con,"SELECT * FROM (SELECT *,SUM(total) as amount, DATE_FORMAT(sales_date,'%Y-%m') as date FROM `sales`  group by date ORDER BY date DESC limit 4) sub order by date asc")or die(mysqli_error($con));
                                $num=mysqli_num_rows($query1);
                                $amount1=0;
                                $amount2=0;
                                $amount3=0;
                                $amount4=0;
                                $i=4;

                                while($row=mysqli_fetch_array($query1))
                                {
                                    $date=$row['date'];
                                    //$quarter=$row['month']; 
                                    $amount=$row['amount']; 
                                    
                                    if ($i==4)
                                    {
                                        $amount1=$amount;
                                        $date1=$date;
                                    }
                                    if ($i==3)
                                    {
                                        $amount2=$amount;
                                        $date2=date("Y-m",strtotime($date1. " + 1 month"));
                                    }
                                    if ($i==2)
                                    {
                                        $amount3=$amount;
                                        $date3=date("Y-m",strtotime($date2. " + 1 month"));
                                    }
                                    if ($i==1)
                                    {
                                        $amount4=$amount;
                                        $date4=date("Y-m",strtotime($date3. " + 1 month"));
                                    }

                                    $i--;
                                    
                                }
                                if ($amount4<>0)    
                                    echo "<td>$date1</td><td>".number_format($amount1,2)."</td><td></td></tr>";
                                if ($amount3<>0)
                                    echo "<td>$date2</td><td>".number_format($amount2,2)."</td><td></td></tr>";
                                if ($amount2<>0)                                    
                                    echo "<td>$date3</td><td>".number_format($amount3,2)."</td><td></td></tr>";
                                if ($amount1<>0)
                                    echo "<td>$date4</td><td>".number_format($amount4,2)."</td><td></td></tr>";
                                
                                $date5=$date4;
                                $counter=0;
                                if ($num>=4)
                                {
                                while ($counter < 8) {
                                    # code...
                                    $date5=date("Y-m",strtotime($date5. " + 1 month"));
                                    $amount5=($amount4+$amount3+$amount2+$amount1)/4;
                                    $increase=($amount5-$amount1)/$amount1*100;
                                //    echo $month['$i']." ".$year['$i']." - "." -> ".
                                    //echo " ".$amount[4];
                                    echo "<tr><td>$date5</td>";
                                    //$date4=$date5;
                                  
                                    echo "<td></td><td>".number_format($amount5,2)."</tr>";
                                    $amount1=$amount2;
                                    $amount2=$amount3;
                                    $amount3=$amount4;
                                    $amount4=$amount5;
                                
                                    $counter++;
                                }
                                
                        }
                            else if ($num<4)
                                {
                                    echo "<tr><td colspan='5'><h1 style='text-align:center;color:red'>4 Months Data Required</h1></td</tr>";
                                }
                         ?>    
                     </tbody>   
                </table>
            </div>
        </div>
    </div>
</div>


</body>
</html>
