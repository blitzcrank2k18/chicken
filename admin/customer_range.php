<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>

<?php
include('../dist/includes/dbcon.php');
  $date=$_POST['date'];
  //    $start=date("Y/m/d",strtotime($date[0]));

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
                      <th colspan="5"><?php echo $_POST['date'];?></th>
                      <th>Printed: <br><?php echo date("m/d/Y");?></th>
                    </tr>
                    <tr>
                      <th>Code</th>
                      <th>Products</th>
                      <th>Crates</th>
                      <th>Pieces</th>
                      <th>Weight</th>
                      <th>% Output</th>
                    </tr>
<?php
    $queryall=mysqli_query($con,"select SUM(sales_kg) as total_weight, SUM(sales_qty) as total_qty from sales natural join sales_details natural join product where DATE_FORMAT(sales_date,'%m/%d/%Y') ='$date' group by DATE_FORMAT(sales_date,'%m/%d/%Y')")or die(mysqli_error($con));
          $rowall=mysqli_fetch_array($queryall);
            $total_weight=$rowall['total_weight'];
            $total_qty=$rowall['total_qty'];

    $query=mysqli_query($con,"select * from sales natural join sales_details natural join product where DATE_FORMAT(sales_date,'%m/%d/%Y') ='$date'")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query)){
            
    
?>                  <tr>
                       <td><?php echo $row['prod_code'];?></td> 
                       <td><?php echo $row['prod_desc'];?></td> 
                       <td>0</td> 
                       <td><?php echo $row['sales_qty'];?></td> 
                       <td><?php echo $row['sales_kg'];?></td> 
                       <td><?php echo number_format($row['sales_kg']/$total_weight*100,2);?>%</td>  
                    </tr>  
<?php }?>
                    <tr>
                       <th colspan="3">Grand Total</th> 
                       <th><?php echo $total_qty;?></th>  
                       <th><?php echo $total_weight;?></th>  
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
