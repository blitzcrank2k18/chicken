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
        Live Weight
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Live Weight</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-md-2">
            <!-- Horizontal Form -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Add New Live Weight</h3>
                <!-- /.box-body -->
                <!-- form start -->
              </div>
              <form class="form-horizontal" method="post" action="live_weight_add.php">
                
              <!-- /.box-header -->
              
                <div class="box-body">
                  <table class="table table-striped">
                    <tr>
                      <td>
                        <input type="hidden" class="form-control" id="name" name="id" value="<?php echo $_REQUEST['id'];?>">
                        <input type="text" class="form-control" id="name" name="weight">
                      </td>

                    </tr>
                  </table>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default pull-right">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div>    
                </div>

                
                <!-- /.box-footer -->
            </div>
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title col-md-12"><a href="processing.php?id=<?php echo $_REQUEST['id'];?>" class="btn btn-block btn-success">Proceed to Step 3</a></h3>
                <!-- /.box-body -->
                <!-- form start -->
              </div>
              
            </div>
        </div>
            <!-- /.box -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Weight of Chicken List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <table class="table table-striped">
                <tbody><tr>
                  <th>#</th>
                  <th>Weight</th>
                  <th>Coops</th>
                </tr>
          <?php
           include('../dist/includes/dbcon.php');
           $id=$_REQUEST['id'];
            $query=mysqli_query($con,"select * from live_weight where delivery_id='$id'")or die(mysqli_error());
              $i=1;
              while($row=mysqli_fetch_array($query)){
          ?>
        
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['weight'];?></td>
                  <td><?php echo $row['coops'];?></td>
                </tr>
                
          <?php $i++;}?>          
              </tbody></table>
              </form>
          </div>

        </div>
        <div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Summary of Live Chicken</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <?php
                 include('../dist/includes/dbcon.php');
                  $query=mysqli_query($con,"select *,SUM(weight) as weight,SUM(coops) as coops from live_weight natural join delivery where live_weight.delivery_id='$id' group by delivery_id")or die(mysqli_error());
                    $row=mysqli_fetch_array($query);
                ?>            
              <table class="table table-striped">
                  <tbody>
                  <tr>
                    <th>Total # of Birds (pcs)</th>
                    <th colspan="2"><?php echo $row['pcshauled'];?></th>
                  </tr>  
                  <tr>
                    <th>Processed Chicken</th>
                    <th colspan="2"><?php echo $row['coops']*16;?></th>
                  </tr>
                  <tr>
                    <th class="text-red">Unprocessed Chicken</th>
                    <th colspan="2" class="text-red"><?php echo $row['pcshauled']-$row['coops']*16;?></th>
                  </tr>
                  <tr>
                    <td>Gross Weight (kg)</td>
                    <td colspan="2"><?php echo $row['weight'];?></td>
                  </tr>
                  <tr>
                    <th colspan="3">Coops Tare Weight (kg)</th>
                  </tr>
                  <tr>
                    <th>Tare Wt./Pc</th>
                    <th>No. of Pcs.</th>
                    <th>Tare Wt. Total</th>
                  </tr>
                  <?php
                    // include('../dist/includes/dbcon.php');
                      $query1=mysqli_query($con,"select * from tare where delivery_id='$id'")or die(mysqli_error($con));
                        while($row1=mysqli_fetch_array($query1)){
                  ?> 
                  <tr>
                    <td><?php echo $row1['tare_weight'];?></td>
                    <td><?php echo $row1['tare_pc'];?></td>
                    <td><?php echo $row1['tare_total'];?></td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>Net Weight (kg)</td>
                    <td colspan="2"><?php echo $row['weight'];?></td>
                  </tr>
                  <tr>
                    <td>ALW</td>
                    <td colspan="2"><?php echo $row['coops'];?></td>
                  </tr>
                  <tr>
                    <td>DOA</td>
                    <td><?php echo $row['doa_pcs'];?> </td>
                    <td><?php echo $row['doa_weight'];?> </td>
                  </tr>
                  <tr>
                    <td>DAA</td>
                    <td><?php echo $row['daa_pcs'];?> </td>
                    <td><?php echo $row['daa_weight'];?> </td>
                  </tr>
                  
                </tbody></table>
              </form>
          </div>
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Other Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                        
              <form method="post" action="tare_add.php">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>Tare Wt./pc</th>
                    <th>No. Of Pcs</th>
                  </tr>
                  <tr>
                    <td>
                      <input type="hidden" class="form-control" id="name" name="id" value="<?php echo $id;?>">
                      <input type="text" class="form-control" id="name" name="tare_weight"></td>
                    <td><input type="number" class="form-control" id="name" name="tare_pc"></td>
                  </tr>
                  <tr>
                    <th>DOA pc</th>
                    <th>DOA Wt.</th>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" class="form-control" id="name" name="doa_pc"></td>
                    <td><input type="number" class="form-control" id="name" name="doa_wt"></td>
                  </tr>
                  <tr>
                    <th>DAA pc</th>
                    <th>DAA Wt.</th>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" class="form-control" id="name" name="daa_pc"></td>
                    <td><input type="number" class="form-control" id="name" name="daa_wt"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><button type="submit" class="btn btn-info pull-right">Add</button></td>
                  </tr>
                </tbody>
              </table>
              </form>
          </div>
        </div>

      <!-- /.box -->
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="https://adminlte.io">Malogo Agri Ventures</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include "../dist/includes/script.php";?>
</body>
</html>
