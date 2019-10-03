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
        User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Account</a></li>
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
                <h3 class="box-title">Account Settings</h3>
              </div>
              <!-- /.box-header -->
              <?php 
                $id=$_SESSION['id'];
                include('../dist/includes/dbcon.php');
                  $query=mysqli_query($con,"select * from user where user_id='$id'")or die(mysqli_error());
                    $row=mysqli_fetch_array($query);
              ?>
              <!-- form start -->
              <form class="form-horizontal" method="post" action="user_update.php">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="inputEmail3" name="id" value="<?php echo $row['user_id'];?>" required>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="User Full Name" name="name" value="<?php echo $row['name'];?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="username" value="<?php echo $row['username'];?>">
                    </div>
                  </div>
                 
                </div>  
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="reset" class="btn btn-default pull-right">Cancel</button>
                  <button type="submit" class="btn btn-info pull-right" name="changename">Save</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
          </div>
            <!-- /.box -->
          <div class="col-md-4">
            <!-- Horizontal Form -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Change Password</h3>
              </div>
              <!-- /.box-header -->
              <?php 
                $id=$_SESSION['id'];
                include('../dist/includes/dbcon.php');
                  $query=mysqli_query($con,"select * from user where user_id='$id'")or die(mysqli_error());
                    $row=mysqli_fetch_array($query);
              ?>
              <!-- form start -->
              <form class="form-horizontal" method="post" action="account_update.php">
                <div class="box-body">
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="inputEmail3" name="id" value="<?php echo $row['user_id'];?>" required>
                      <input type="password" class="form-control" id="inputEmail3" placeholder="Enter New Password" name="password">
                    </div>
                  </div>
                  
                </div>  
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="reset" class="btn btn-default pull-right">Cancel</button>
                  <button type="submit" class="btn btn-info pull-right" name="changepass">Save</button>
                </div>
                <!-- /.box-footer -->
              </form>
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
