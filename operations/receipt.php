<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
<?php include "../dist/includes/head.php";?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-red sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php //include "../dist/includes/header.php";?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php// include "../dist/includes/aside.php";?>
    
    <style type="text/css">
      h5,h6{
        text-align:center;
      }


      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">

          <section class="content">
            <div class="row">
	      <div class="col-md-12">
             
                <div class="box-body">

                  <!-- Date range -->
                  <form method="post" action="transaction_add.php">
<?php
include('../dist/includes/dbcon.php');
   
?>			
                  <h5><b>Dress Chicken</b> </h5>  
                  <h6>Contact #: <?php echo $row['branch_name'];?></h6>
                  <h6>Date <?php echo date("M d, Y");?> Time <?php echo date("h:i A");?></h6>

                  <hr>
                   
<?php

    $sales_id=$_REQUEST['sales_id'];
    $query=mysqli_query($con,"select * from sales where sales_id='$sales_id'")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($query);
        $sid=$row['sales_id'];
        $due=$row['amount_due'];
        $discount=$row['discount'];
        $grandtotal=$due-$discount;
        $tendered=$row['cash_tendered'];
        $change=$row['cash_change'];
?>                      
                  <h3 class="pull-right">OR # <?php echo $row['sales_id'];?></h3>  
                  <table class="table" width="100%">
                    <thead>

                      <tr>
                        <th>Qty</th>
                        <th>Weight</th>
                        <th>Product Name</th>
            						<th>Price</th>
            						<th class="text-right">Total</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		$query=mysqli_query($con,"select * from sales_details natural join product where sales_id='$sales_id'")or die(mysqli_error($con));
			$grand=0;
		while($row=mysqli_fetch_array($query)){
				//$id=$row['temp_trans_id'];
				$total= $row['sales_qty']*$row['sales_price'];
        $weight= $row['sales_kg'];
				$grand=$grand+$row['sales_total'];;
        
?>
                      <tr >
            						<td><?php echo $row['sales_qty'];?></td>
                        <td><?php echo $row['sales_kg'];?></td>
                        <td class="record"><?php echo $row['prod_code'];?></td>
            						<td><?php echo $row['sales_price'];?></td>
            						<td style="text-align:right"><?php echo number_format($total,2);?></td>
                                    
                      </tr>
					  

<?php }?>					
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Subtotal</td>
                        <td style="text-align:right"><?php echo number_format($grand,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Discount</td>
                        <td style="text-align:right"><?php echo number_format($discount,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>Grand Total</b></td>
                        <td style="text-align:right"><b><?php echo number_format($grand-$discount,2);?></b></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Cash Tendered</td>
                        <td style="text-align:right"><?php echo number_format($tendered,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>Change</b></td>
                        <td style="text-align:right"><b><?php echo number_format($change,2);?></b></td>
                      </tr>  
                    </tbody>
                    
                  </table>
                  
                  <h3>Cashier:</h3>  
                </div><!-- /.box-body -->
				</div>  
				</form>	
                </div><!-- /.box-body -->
                <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
                <a class = "btn btn-primary btn-print" href = "index.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
           
          </div><!-- /.row -->
	  
             
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
     
    </div><!-- ./wrapper -->
	
	
	<script type="text/javascript" src="autosum.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
   
  </body>
</html>
