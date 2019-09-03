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
                <h3 class="box-title col-md-12"><a href="processing.php?id=<?php echo $_REQUEST['id'];?>" class="btn btn-block btn-success">Proceed to Step 3</a>
                  <a href="view_delivery.php?id=<?php echo $_REQUEST['id'];?>" class="btn btn-block btn-warning">Back</a>
                </h3>
                <!-- /.box-body -->
                <!-- form start -->
              </div>
            </div>
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Add New Live Weight</h3>
                <!-- /.box-body -->
                <!-- form start -->
              </div>
              <form class="form-horizontal" method="post" action="live_weight_add.php" required>
                
              <!-- /.box-header -->
              
                <div class="box-body">
                  <table class="table table-striped">
                    <tr>
                      <td>
                        <input type="hidden" class="form-control" id="name" name="id" value="<?php echo $_REQUEST['id'];?>">
                        <input type="text" class="form-control" id="name" name="weight" autofocus="true">
                      </td>

                    </tr>
                  </table>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default pull-right">Cancel</button>
                    <button type="submit" class="btn btn-danger pull-right">Save</button>
                  </div>    
                </div>
            </form>    
                
                <!-- /.box-footer -->
            </div>
            <?php
                  $id=$_REQUEST['id'];
                 include('../dist/includes/dbcon.php');
                  $queryp=mysqli_query($con,"select * from delivery where delivery_id='$id'")or die(mysqli_error($con));
                    $rowp=mysqli_fetch_array($queryp);
                ?>   
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Personnel</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                            
                  <form method="post" action="assigned.php">
                  <table class="table table-striped">
                    <tbody><input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
                      <tr>
                        <th>Weigher</th>
                      </tr>
                      <tr>
                        <td>
                          <select class="form-control select2" style="width: 100%;" name="weigher" required>
                            <option><?php echo $rowp['weigher'];?></option>
                          <?php
                             include('../dist/includes/dbcon.php');
                              $query2=mysqli_query($con,"select * from personnel order by personnel_name")or die(mysqli_error());
                                while($row2=mysqli_fetch_array($query2)){
                            ?>
                              <option><?php echo $row2['personnel_name'];?></option>
                            <?php }?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <th>Verifier</th>
                      </tr>
                      <tr>
                        <td>
                          <select class="form-control select2" style="width: 100%;" name="verifier" required>
                            <option><?php echo $rowp['verifier'];?></option>
                          <?php
                             include('../dist/includes/dbcon.php');
                              $query3=mysqli_query($con,"select * from personnel order by personnel_name")or die(mysqli_error());
                                while($row3=mysqli_fetch_array($query3)){
                            ?>
                              <option><?php echo $row3['personnel_name'];?></option>
                            <?php }?>
                          </select>
                        </td>
                      </tr>
                     
                      <tr>
                        <td colspan="3"><button type="submit" class="btn btn-danger pull-right">Save</button></td>
                      </tr>
                    </tbody>
                  </table>
                  </form>
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
                  <th>Action</th>
                </tr>
                <?php
                 include('../dist/includes/dbcon.php');
                 $id=$_REQUEST['id'];
                  $query=mysqli_query($con,"select * from live_weight where delivery_id='$id'")or die(mysqli_error());
                    $i=1;
                    while($row=mysqli_fetch_array($query)){
                      $lwid=$row['live_weight_id'];
                ?>
        
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['weight'];?></td>
                  <td><?php echo $row['coops'];?></td>
                  <td>
                    <a href="#update<?php echo $lwid;?>" data-target="#update<?php echo $lwid;?>" data-toggle="modal" class="small-box-footer"><i class="fa fa-pencil"></i></a> | 
                    <a href="#delete<?php echo $lwid;?>" data-target="#delete<?php echo $lwid;?>" data-toggle="modal" class="small-box-footer"><i class="fa fa-trash text-red"></i></a>
                  </td>
                </tr>
<div id="update<?php echo $lwid;?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Live Weight Details</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="live_weight_update.php" enctype='multipart/form-data'>
                        
                  <div class="form-group">
                    <label class="control-label col-lg-3" for="name">Weight</label>
                    <div class="col-lg-9">
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>" required>  
                      <input type="hidden" class="form-control" id="id" name="lwid" value="<?php echo $lwid;?>" required>  
                      <input type="text" class="form-control" id="name" name="weight" value="<?php echo $row['weight'];?>" required>  
                    </div>
                  </div> 
                 
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div><!--end of modal-body-->
            </div><!--end of modal-content-->
     </div><!--end of modal-dialog-->
 </div>

 <div id="delete<?php echo $lwid;?>" class="modal fade in" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Remove Live Weight</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="live_weight_remove.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Weight</label>
          <div class="col-lg-9">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>" required>  
            <input type="hidden" class="form-control" id="id" name="lwid" value="<?php echo $lwid;?>" required>  
            Are you sure you want to remove <?php echo $row['weight'];?>?  
          </div>
        </div> 
       
              <div class="modal-footer">
    <button type="submit" class="btn btn-danger">Confirm Remove</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal--> 
                <?php $i++;}?>          
              </tbody>
            </table>
           
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
                  $query=mysqli_query($con,"select *,SUM(weight) as weight,SUM(coops) as coops from delivery left join live_weight on delivery.delivery_id=live_weight.delivery_id where delivery.delivery_id='$id' group by live_weight.delivery_id")or die(mysqli_error());
                    $row=mysqli_fetch_array($query);
                ?>            
              <table class="table table-striped">
                  <tbody>
                  <tr>
                    <th colspan="2">Total # of Birds (pcs)</th>
                    <th colspan=""><?php echo $row['pcshauled'];?></th>
                  </tr>  
                  <tr>
                    <th colspan="2">Processed Chicken</th>
                    <th colspan=""><?php echo $row['coops']*8;?></th>
                  </tr>
                  <tr>
                    <th class="text-red" colspan="2">Unprocessed Chicken</th>
                    <th colspan="" class="text-red"><?php echo $row['pcshauled']-$row['coops']*8;?></th>
                  </tr>
                  <tr>
                    <td colspan="2">Gross Weight (kg)</td>
                    <td colspan=""><?php echo $row['weight'];?></td>
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
                  <form method="post" action="tare_add.php">
                  <tr>
                    <td>
                      <input type="hidden" class="form-control" id="name" name="id" value="<?php echo $id;?>">
                      <input type="hidden" class="form-control" id="name" name="tare_id[]" value="<?php echo $row1['tare_id'];?>">
                      <input type="text" class="form-control" id="name" name="tare_weight[]" value="<?php echo $row1['tare_weight'];?>"></td>
                    <td>
                      <input type="number" class="form-control" id="name" name="tare_pc[]" value="<?php echo $row1['tare_pc'];?>">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="name" value="<?php echo $row1['tare_total'];?>" readonly>
                    </td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>Net Weight (kg)</td>
                    <td colspan="2"><?php echo $row['net_weight'];?></td>
                  </tr>
                  <tr>
                    <td>ALW</td>
                    <td colspan="2"><?php echo $row['alw'];?></td>
                  </tr>
                  <tr>
                    <td>
                      DOA
                    </td>
                    <td>
                      <input type="text" class="form-control" id="name" name="doa_pc" value="<?php echo $row['doa_pcs'];?>">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="name" name="doa_wt" value="<?php echo $row['doa_weight'];?>">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      DAA
                    </td>
                    <td>
                      <input type="text" class="form-control" id="name" name="daa_pc" value="<?php echo $row['daa_pcs'];?>">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="name" name="daa_wt" value="<?php echo $row['daa_weight'];?>">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3"><button type="submit" class="btn btn-danger pull-right">Save</button></td>
                  </tr>
                </tbody></table>
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
