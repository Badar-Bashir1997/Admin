 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['SESS_img'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Badar Bashir</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu">
        <li class="header">MAIN Menu</li>
        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
        <li class="treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="iconify" data-icon="iconoir:farm"></i> <span>Farms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
          <li><a href="view_all_farm.php"><i class="iconify" data-icon="iconoir:farm"></i>View all</a></li>
            <li><a href="Add_farm.php"><i class="iconify" data-icon="iconoir:farm"></i>Add new</a></li>
          
                </ul>
                </li>
        <li class="treeview">
          <a href="#">
            <i class="iconify" data-icon="vs:chicken"></i> <span>Flocks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
          <li><a href="view_flocks.php"><i class="iconify" data-icon="vs:chicken"></i>View all</a></li>
            <li><a href="Add_flocks.php"><i class="iconify" data-icon="vs:chicken"></i>Add new</a></li>
          
                </ul>
                </li>
                <li>
                <a href="Broiler.php">
                  <i  class="iconify" data-icon="emojione-monotone:chicken"></i> <span>Broiler</span>
                   </a>
                     </li>
               
                 <li>
          <a href="Layer.php">
            <i class="iconify" data-icon="vs:chicken"></i> <span>Layer</span>
           </i>
            </span>
          </a>
        
                </li>
               <li class="treeview">
              <a href="#">
            <i class="fa fa-industry"></i> <span>Feed Mills</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-industry"></i>View all</a></li>
            <li><a href="#"><i class="fa fa-industry"></i>Purchase New</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i  class="iconify" data-icon="vs:chicken"></i> <span>Production</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="egg_production.php"><i class="iconify" data-icon="vs:chicken"></i>Egg Production</a></li>
            <li><a href="manure_production.php"><i class="iconify" data-icon="emojione-monotone:chicken"></i>Manure Production</a></li>
            
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i  class="iconify" data-icon="flat-color-icons:sales-performance"></i> <span>Sales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Egg_sales.php"><i class="iconify" data-icon="jam:eggs"></i>Eggs</a></li>
            <li><a href="Broiler_sales.php"><i class="iconify" data-icon="emojione-monotone:chicken"></i>Broiler Sales</a></li>
            <li><a href="layer_sales.php"><i class="iconify" data-icon="emojione-monotone:chicken"></i>Layers Sales</a></li>
            <li><a href="manure.php"><i class="fa fa-money"></i>Manure</a></li>
            <li><a href="bags.php"><i class="fa fa-money"></i>Bags</a></li>
          </ul>
        </li>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Purchase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="feed.php"><i class="iconify" data-icon="cil:grain"></i>Feed</a></li>
            <li><a href="desiel.php"><i  class="iconify" data-icon="noto:fuel-pump"></i>Desiel</a></li>
            <li><a href="wood.php"><i class="iconify" data-icon="noto:wood"></i>Wood</a></li>
            <li><a href="medicine.php"><i class="fa fa-plus-square"></i>Medicine</a></li>
            <li><a href="misc.php"><i class="iconify" data-icon="codicon:symbol-misc"></i>Misc</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Expenses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="feed_exp.php"><i class="iconify" data-icon="cil:grain"></i>Feed</a></li>
            <li><a href="desiel_exp.php"><i  class="iconify" data-icon="noto:fuel-pump"></i>Desiel</a></li>
            <li><a href="wood_exp.php"><i class="iconify" data-icon="noto:wood"></i>Wood</a></li>
            <li><a href="medicine_exp.php"><i class="fa fa-plus-square"></i>Medicine</a></li>
            <li><a href="misc_exp.php"><i class="iconify" data-icon="codicon:symbol-misc"></i>Misc</a></li>
          </ul>
        </li>
          <li >
          <a href="vandors.php">
            <i class="fa fa-group (alias)"></i> <span>Vendors</span>
          </a>
        </li>
        
        <li >
          <a href="brokers.php">
            <i class="fa fa-group (alias)"></i> <span>Brokers</span>
          </a>
        </li>
        <li >
          <a href="Add_Vehical.php">
            <i class=" fa   fa-truck"></i> <span>Vehicles</span>
          </a>
        </li>
        <li >
          <a href="payment.php">
            <i class="fa  fa-money"></i> <span>Payments</span>
          </a>
        </li>
        <li><a href="repoting.php"><i class="fa fa-line-chart "></i> <span>Reporting</span></a></li>
        <li >
          <a href="Add_Employees.php">
            <i class="iconify" data-icon="clarity:employee-group-solid"></i> <span>Employees</span>
          </a>
        </li>
        <li><a href="Add_users.php"><i class="fa fa-users "></i> <span>Users</span></a></li>
        <li >
          
          <a href="settings.php">
            <i class="fa fa-gears" ></i> <span>Settings</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script >
var url = window.location;
$('ul.sidebar-menu a').filter(function() {
   return this.href == url;
}).parent().addClass('active');
$('ul.treeview-menu a').filter(function() {
   return this.href == url;
}).parentsUntil(".sidebar-menu >.treeview-menu").addClass('active');
</script>