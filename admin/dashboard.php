
<?php
include('../dist/includes/dbcon.php');
  /* Getting demo_click table data */
  $date=date("Y-m-d");
  $sql = "SELECT SUM(amount_due) as total FROM `sales` where sales_date='$date' group by sales_date";
                  $click = mysqli_query($con,$sql);
                  $click = mysqli_fetch_all($click,MYSQLI_ASSOC);
                  $date = json_encode(array_column($click, 'date'),JSON_NUMERIC_CHECK);
                  $click = json_encode(array_column($click, 'total'),JSON_NUMERIC_CHECK);
                


?>



<script type="text/javascript">


$(function () { 


    var data_click = <?php echo $click; ?>;

    var data = <?php echo $date; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Daily Sales Report'
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
            name: 'Daily Sales',
            data: data_click
        },]

    });
    
});


</script>
  <h3 style="text-align: center;">Daily Sales Report</h3>
    <div class="row">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    
                    <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th>Month</th>
                      <th>Sales</th>
                    </tr>
<?php
    
    $query=mysqli_query($con,"SELECT SUM(amount_due) as total FROM `sales` where sales_date='$date' group by sales_date")or die(mysqli_error($con));

    while($row=mysqli_fetch_array($query)){
    
?>                  <tr>
                       <td><?php echo $row['sales_date'];?></td> 
                       <td><?php echo $row['total'];?></td> 
                    </tr>  
<?php }?>
<?php
    
    $query=mysqli_query($con,"SELECT SUM(amount_due) as total FROM `sales` where sales_date='$date' group by sales_date")or die(mysqli_error($con));

      $row=mysqli_fetch_array($query);
    
?>
                    <tr>
                       <th>TOTAL YEARLY SALES</th> 
                       <th><?php echo $row['total'];?></th> 
                    </tr>  
                  </table>  
                </div>
            </div>
        </div>
    </div>
</div>
