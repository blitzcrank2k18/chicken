<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
<?php include "../dist/includes/head.php";?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php include "../dist/includes/header.php";?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include "../dist/includes/aside_operations.php";?>
  
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Request
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase Request</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Sales Transaction</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="transaction_add.php">
          <div class="row" style="min-height:400px">
          
           <div class="col-md-6">
              <div class="form-group">
              <label for="date">Product Name</label>
               
                <select class="form-control select2" name="prod_name" tabindex="1" autofocus required>
                <?php
                  include('../dist/includes/dbcon.php');

                   $query2=mysqli_query($con,"select * from product order by prod_code")or die(mysqli_error($con));
                      while($row2=mysqli_fetch_array($query2)){
                ?>
                    <option value="<?php echo $row2['prod_id'];?>"><?php echo $row2['prod_code'];?></option>
                  <?php }?>
                </select>
                
              </div><!-- /.form group -->
          </div>
          <div class=" col-md-2">
            <div class="form-group">
              <label for="date">Quantity</label>
              <div class="input-group">
                <input type="number" class="form-control pull-right" id="date" name="qty" placeholder="Quantity" tabindex="2" value="1"  required>
              </div><!-- /.input group -->
            </div><!-- /.form group -->
           </div>
           <div class=" col-md-2">
            <div class="form-group">
              <label for="date">Weight</label>
              <div class="input-group">
                <input type="text" class="form-control pull-right" id="date" name="weight" placeholder="Weight" tabindex="2" value="1"  required>
              </div><!-- /.input group -->
            </div><!-- /.form group -->
           </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="date"></label>
              <div class="input-group">
                <button class="btn btn-lg btn-primary" type="submit" tabindex="3" name="addtocart">+</button>
              </div>
            </div>  
          </form> 
          </div>
          <div class="col-md-12">
    
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Weight</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from temp_trans natural join product")or die(mysqli_error());
      $grand=0;
    while($row=mysqli_fetch_array($query)){
        $id=$row['temp_trans_id'];
        $total= $row['qty']*$row['prod_price'];
        $grand=$grand+$total;
    
?>
                      <tr >
            <td><?php echo $row['qty'];?></td>
            <td><?php echo $row['weight'];?></td>
            <td class="record"><?php echo $row['prod_code'];?></td>
            <td><?php echo $row['prod_price'];?></td>
            <td style=""><?php echo number_format($total,2);?></td>
                        <td>
              
              <a href="#updateordinance<?php echo $row['temp_trans_id'];?>" data-target="#updateordinance<?php echo $row['temp_trans_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

              <a href="#delete<?php echo $row['temp_trans_id'];?>" data-target="#delete<?php echo $row['temp_trans_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
              
            </td>
                      </tr>
            <div id="updateordinance<?php echo $row['temp_trans_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Sales Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="transaction_update.php" enctype='multipart/form-data'>
         
          <input type="hidden" class="form-control" id="price" name="id" value="<?php echo $row['temp_trans_id'];?>" required>  
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Qty</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="price" name="qty" value="<?php echo $row['qty'];?>" required>  
          </div>
        </div>
        
              </div><br>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->  
<div id="delete<?php echo $row['temp_trans_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Item</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="transaction_del.php">
          <input type="hidden" class="form-control" name="id" value="<?php echo $row['temp_trans_id'];?>" required>   
         
        <p>Are you sure you want to remove <?php echo $row['prod_code'];?>?</p>
        
              </div><br>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->  
<?php }?>           
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->

        </div>  
               
                  
                  
        </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-md-3">
              <div class="box box-primary">
               
                <div class="box-body">
                  <!-- Date range -->
          <form method="post" name="autoSumForm" action="sales_add.php">
          <div class="row">
           <div class="col-md-12">
              
              <div class="form-group">
              <label for="date">Total</label>
              
                <input type="text" style="text-align:right" class="form-control" id="total" name="total" placeholder="Total" 
                value="<?php echo $grand;?>" onFocus="startCalc();" onBlur="stopCalc();"  tabindex="5" readonly>
              
              </div><!-- /.form group -->
              <div class="form-group">
              <label for="date">Discount</label>
              
                <input type="text" class="form-control text-right" id="discount" name="discount" value="0" tabindex="6" placeholder="Discount (Php)" onFocus="startCalc();" onBlur="stopCalc();">
              <input type="hidden" class="form-control text-right" id="cid" name="cid" value="<?php echo $cid;?>">
              </div><!-- /.form group -->
              <div class="form-group">
              <label for="date">Amount Due</label>
              
                <input type="text" style="text-align:right" class="form-control" id="amount_due" name="amount_due" placeholder="Amount Due" readonly>
              
              </div><!-- /.form group -->
              
             
              <div class="form-group" id="tendered">
                <label for="date">Cash Tendered</label><br>
                <input type="text" style="text-align:right" class="form-control" onFocus="startCalc();" onBlur="stopCalc();"  id="cash" name="tendered" placeholder="Cash Tendered" value="0" required>
              </div><!-- /.form group -->
              <div class="form-group" id="change">
                <label for="date">Change</label><br>
                <input type="text" style="text-align:right" class="form-control" id="changed" name="change" placeholder="Change">
              </div><!-- /.form group -->
          </div>
          
          

        </div>  
               
                  
                 
                      <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="cash" type="submit"  tabindex="7">
                        Complete Sales
                      </button>
            <button class="btn btn-lg btn-block" id="daterange-btn" type="reset"  tabindex="8">
                        <a href="cancel.php">Cancel Sale</a>
                      </button>
              
        </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
      
      
          </div><!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "../dist/includes/footer.php";?>

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
  
    $("#credit").click(function(){
        $("#tendered").hide('slow');
        $("#change").hide('slow');
      });

      $("#cash").click(function(){
          $("#tendered").show('slow');
          $("#change").show('slow');
      });
</script>
<script type="text/javascript" src="../dist/js/autosum.js"></script>
<?php include "../dist/includes/script.php";?>
</body>
</html>
