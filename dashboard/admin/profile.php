<?php
  session_start();
  if(!isset($_SESSION['login'])){
    header("location :login.php");
  }

  require('config.php');


  if(isset($_POST['update'])){
    profile($_POST);
  }

  $id = $_SESSION['id'];
  $data = mysqli_query($koneksi,"select * from admin where id='$id'");
  $tampil = mysqli_fetch_assoc($data);




?>


<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Rafly Yogaswara 1202190061 SI4301</title>
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.php">
              <!-- Logo icon -->
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text">
                <!-- dark Logo text -->
                <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
              </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto mt-md-0">
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->

              <li class="nav-item hidden-sm-down">
                <form class="app-search ps-3">
                  <input type="text" class="form-control" placeholder="Search for..." /> <a class="srh-btn"><i class="ti-search"></i></a>
                </form>
              </li>
            </ul>

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../assets/images/users/1.jpg" alt="user" class="profile-pic me-2" /><?= $tampil['username'];?>
                </a>
                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <li><a class='dropdown-item' href='profile.php?admin=<?=$_SESSION['id']?>'>Profile</a></li>
                    <li><a class='dropdown-item' href='config.php?logout=yes'>Logout</a></li>
                </ul>
                <ul class="dropdown-menu show" aria-labelledby="navbarDropdown"></ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar headser -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <!-- User Profile-->
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="me-3 far fa-clock fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php?admin=<?=$_SESSION['id']?>" aria-expanded="false"> <i class="me-3 fa fa-user" aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Profile</h3>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <?php if(isset($_SESSION['update'])) :?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong><?=$_SESSION['update'];?></strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        <?php 
            unset($_SESSION['update']);
            endif;
        ?>
        
        <?php if(isset($_SESSION['TidakSama'])) :?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong><?=$_SESSION['TidakSama'];?></strong> Mohon di check kembali
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        <?php 
            unset($_SESSION['TidakSama']);
            endif;
        ?>
        
        
        <?php if(isset($_SESSION['ID'])) :?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong><?=$_SESSION['ID'];?></strong> Mohon di check kembali
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        <?php 
            unset($_SESSION['ID']);
            endif;
        ?>
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <!-- Row -->
          <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
              <div class="card">
                <div class="card-body profile-card">
                  <center class="mt-4">
                    <img src="../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-2"><?=$tampil['username']?></h4>
                    <h6 class="card-subtitle">Administrator</h6>
                  </center>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
              <div class="card">
                <div class="card-body">
                  <form action ="#" method="POST" class="form-horizontal form-material mx-2">
                    <div class="form-group" hidden>
                      <label class="col-md-12 mb-0">ID</label>
                      <div class="col-md-12">
                        <input name="id" type="text" class="form-control ps-0 form-control-line" id="id" value="<?php echo $tampil['id'];?>" name="<?php echo $tampil['id'];?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12 mb-0">Username</label>
                      <div class="col-md-12">
                        <input type="text" name="username" class="form-control ps-0 form-control-line" value="<?= $tampil['username']?>"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12 mb-0">Password</label>
                      <div class="col-md-12">
                        <input type="password" placeholder="password" name="password" id="password" class="form-control ps-0 form-control-line" />
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label class="col-md-12 mb-0">Confirm Password</label>
                      <div class="col-md-12">
                        <input type="password" placeholder="password" name="confpw" id="confpw" class="form-control ps-0 form-control-line" />
                      </div>
                    </div> -->
                    <div class="form-group">
                      <div class="col-sm-12 d-flex">
                        <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white" name="update" id="update">Update Profile</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <!-- Row -->
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">© 2021 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a></footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
  </body>
</html>
