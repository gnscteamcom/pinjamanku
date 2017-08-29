<?php //session_start(); ?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['name'] ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- Sidebar user panel -->
          <!-- search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="home.php?page=dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>  
            
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-file"></i> <span>List</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <!--  <li><a href="home.php?page=berita"><i class="glyphicon glyphicon-pencil"></i> Input Berita</a></li> -->
                <li><a href="home.php?page=pesan"><i class="fa fa-circle-o"></i> Pesan</a></li>
                <li><a href="home.php?page=artikel"><i class="fa fa-circle-o"></i> Artikel</a></li>
                <li><a href="home.php?page=agunan"><i class="fa fa-circle-o"></i> Agunan</a></li>
                <li><a href="home.php?page=anggota"><i class="fa fa-circle-o"></i> Anggota</a></li>
                <li><a href="home.php?page=admin"><i class="fa fa-circle-o"></i> Admin</a></li>
                <li><a href="home.php?page=pinjaman"><i class="fa fa-circle-o"></i> Pinjaman</a></li>
              </ul>
            </li>    
            <!-- <li class="treeview">
              <a href="home.php?page=list_cs">
                <i class="glyphicon glyphicon-user"></i> <span>Customer Service</span>
              </a>
            </li>    -->
            <li class="treeview">
              <a href="home.php?page=change_password">
                <i class="glyphicon glyphicon-lock"></i> <span>Ubah Password</span>
              </a>
            </li>
            <!-- <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-folder-close"></i> <span>Report</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li><a href="home.php?page=berita"><i class="glyphicon glyphicon-pencil"></i> Input Berita</a></li>
                <li><a href="home.php?page=report_cs"><i class="fa fa-circle-o"></i> CS</a></li>
                <li><a href="home.php?page=report_network"><i class="fa fa-circle-o"></i> Network</a></li>
              </ul>
            </li> -->
            <li class="treeview">
              <a href="process/logout.php">
                <i class="glyphicon glyphicon-off"></i> <span>Logout</span>
              </a>
            </li>    
          </ul>
        </section>
        <!-- /.sidebar -->
</aside>