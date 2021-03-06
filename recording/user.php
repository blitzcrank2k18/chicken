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
  <?php include "../dist/includes/aside_recording.php";?>
  
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
        <li><a href="#">User</a></li>
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
                <h3 class="box-title">Add New User</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="user_add.php">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="User Full Name" name="name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputEmail3" placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" style="width: 100%;" name="type" required>
                            <option>recording</option>
                            <option>operation</option>
                            <option>admin</option>
                        </select>
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
              <h3 class="box-title">User List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <table class="table table-striped">
                <tbody><tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
      <?php
       include('../dist/includes/dbcon.php');
        $query=mysqli_query($con,"select * from user order by name")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
        
                <tr>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['username'];?></td>
                  <td><?php echo $row['type'];?></td>
                  <td>
                    <a href="#update<?php echo $row['user_id'];?>" data-target="#update<?php echo $row['user_id'];?>" data-toggle="modal" class="small-box-footer">edit</a> | 
      
                    <a href="#changepass<?php echo $row['user_id'];?>" data-target="#changepass<?php echo $row['user_id'];?>" data-toggle="modal" class="small-box-footer">  password change</a>
      
                  </td>
                </tr>
<div id="update<?php echo $row['user_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Grower Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="user_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['user_id'];?>" required>  
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Username</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="price" name="username" value="<?php echo $row['username'];?>">  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Type</label>
          <div class="col-lg-9">
            <select class="form-control select2" style="width: 100%;" name="type" required>
                <option><?php echo $row['type'];?></option>
                <option>driver</option>
                <option>guard</option>
                <option>user</option>
            </select>
          </div>
        </div>
        

        
              <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
      </div>
    </div>
 <!--end of modal-->     
 <div id="changepass<?php echo $row['user_id'];?>" class="modal fade in" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Password</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="user_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['user_id'];?>" required>  
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>" required>  
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
