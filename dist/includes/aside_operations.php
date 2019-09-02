<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['name'];?></p>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Purchase Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pr.php"><i class="fa fa-plus"></i> Add PR</a></li>
            <li><a href="list_pr.php"><i class="fa fa-list"></i> List PR</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-opencart"></i>
            <span>Sales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="transaction.php"><i class="fa fa-plus"></i> Add Sales</a></li>
            <li><a href="list_sales.php"><i class="fa fa-list"></i> List Sales</a></li>
          </ul>
        </li>
        <li>
          <a href="customer.php">
            <i class="fa fa-user"></i> <span>Customer</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="sales_report.php"><i class="fa fa-circle-o"></i> Sales</a></li>
            <li><a href="inventory_report.php"><i class="fa fa-circle-o"></i> Inventory</a></li>
            <li><a href="delivery_report.php"><i class="fa fa-circle-o"></i> Delivery</a></li>
          </ul>
        </li>
        <li>
          <a href="history.php">
            <i class="fa fa-history"></i> <span>History Log</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
