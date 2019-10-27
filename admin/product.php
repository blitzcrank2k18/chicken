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

  <?php include "../dist/includes/header.php";?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include "../dist/includes/aside.php";?>
  
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-md-4">
            <!-- Horizontal Form -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Add New Product</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="product_add.php">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product Code</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Product Code" name="prod_code" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputEmail3" placeholder="Product Desciption" name="desc" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Product Price" name="price" required>
                    </div>
                  </div>
                  </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-default pull-right">Cancel</button>
                  <button type="submit" class="btn btn-info pull-right">Save</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            </div>
            <!-- /.box -->
           
            <!-- /.box -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <table id = "example1" class = "table table-responsive table-bordered">
                <thead>
                  <th>Product Code</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Action</th>
                </thead>
                <tbody>
      <?php
       include('../dist/includes/dbcon.php');
        $query=mysqli_query($con,"select * from product order by prod_code")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
        
                <tr>
                  <td><?php echo $row['prod_code'];?></td>
                  <td><?php echo $row['prod_desc'];?></td>
                  <td><?php echo $row['prod_price'];?></td>
                  <td>
                    <a href="#update<?php echo $row['prod_id'];?>" data-target="#update<?php echo $row['prod_id'];?>" data-toggle="modal" class="small-box-footer">edit</i></a>
      
                  </td>
                </tr>
                <div id="update<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Product Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="product_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Product Code</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['prod_id'];?>" required>  
            <input type="text" class="form-control" id="name" name="prod_name" value="<?php echo $row['prod_code'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Product Description</label>
          <div class="col-md-9">
            <textarea class="form-control" id="date" name="desc" placeholder="Product Description" required><?php echo $row['prod_desc'];?></textarea>
          </div><!-- /.input group -->
        </div><!-- /.form group -->
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Price</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['prod_price'];?>" required>  
          </div>
        </div>
              <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                    
      <?php }?>          
              </tbody></table>
          </div>
        </div>
      <!-- /.box -->
        
    </div>
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
<?php include "../dist/includes/script.php";?>
</body>
</html>
