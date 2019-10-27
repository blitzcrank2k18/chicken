<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>

<?php
include('../dist/includes/dbcon.php');
  $date=$_POST['date'];
  $date=date("Y-m-d",strtotime($date));

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

<div class="container">
  <br/><?php //include('../dist/includes/header_report.php');?>

  <h3 style="text-align: center;">SMFI - Poultry Processing Plant <br>
    Production Output
   <input class="btn-print btn-primary" type="button" name="print" value="Print" onclick="window.print();window.location.href='sales_customer.php';">            </h3><br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div id="container"></div>
                    <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th colspan="6"><?php echo date("m/d/Y l",strtotime($date));?></th>
                      <th>Printed: <br><?php echo date("m/d/Y");?></th>
                    </tr>
                    <tr>
                      <th>Code</th>
                      <th>Products</th>
                      <th>Customer</th>
                      <th>Crates</th>
                      <th>Pieces</th>
                      <th>Weight</th>
                      <th>% Output</th>
                    </tr>
<?php
    $qty=0;
    $total_weight=0;
    $query1=mysqli_query($con,"select *,SUM(sales_qty) as total_qty,date(sales_date) as date from sales natural join sales_details natural join product where date(sales_date)='$date'")or die(mysqli_error($con));
          $row1=mysqli_fetch_array($query1);
            $total=$row1['total_qty'];

    $query=mysqli_query($con,"select * from sales natural join sales_details natural join product natural join customer where date(sales_date)='$date'")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query)){
            $qty=$qty+$row['sales_qty'];
            $total_weight=$total_weight+$row['sales_kg'];
            
?>                  <tr>
                       <td><?php echo $row['prod_code'];?></td> 
                       <td><?php echo $row['prod_desc'];?></td> 
                       <td><?php echo $row['cust_name'];?></td> 
                       <td>0</td> 
                       <td><?php echo $row['sales_qty'];?></td> 
                       <td><?php echo $row['sales_kg'];?></td> 
                       <td><?php echo number_format($row['sales_qty']/$total*100,2);?>%</td>  
                    </tr>  
<?php }?>
                    <tr>
                       <th colspan="3">Grand Total</th> 
                       <th>0</th>  
                       <th><?php echo $qty;?></th>  
                       <th><?php echo number_format($total_weight,2);?></th>  
                       <th><?php echo "100.00%";?></th>  
                    </tr>  
                  </table><br><br>
                    <table id="example1" class="table">
                    <tr>
                       <th>Prepared by:</th> 
                       <th>Noted by:</th>  
                       <th>Checked/Verified by:</th>  
                    </tr>  
                    <tr>
                       <th><br><?php echo $_SESSION['name'];?></th> 
                       <th></th>  
                       <th></th>  
                    </tr>  
                    
                  </table>       
                  
            </div>
        </div>
    </div>
</div>


</body>
</html>
