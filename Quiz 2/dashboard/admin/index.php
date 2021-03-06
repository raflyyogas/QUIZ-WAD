<?php
  session_start(); 
  
  require('config.php');

  if(!isset($_SESSION['admin'])){
    header("location:login.php");
    exit;
  }
  //For Admin ID
  $username = $_SESSION['username'];
  $query = "SELECT * FROM admin where username = '$username'";
  $check = mysqli_query($koneksi,$query);
  $tampilcheck = mysqli_fetch_array($check);
  

  //Counting Total User
  $counting = "SELECT count(*) as hitung FROM users";
  $merge = mysqli_query($koneksi,$counting);
  $tampiluser = mysqli_fetch_array($merge);
  $countinguser  = $tampiluser['hitung'];

  //For count total from bookings
  $count = "SELECT count(*) as total FROM bookings";
  $data = mysqli_query($koneksi, $count);
  $hasil = mysqli_fetch_array($data);
  $tampil = $hasil['total'];

  // Counting total product
  $counts = "SELECT count(*) as totalproduct FROM product";
  $dataproduct = mysqli_query($koneksi, $counts);
  $hasilcounting = mysqli_fetch_array($dataproduct);
  $tampilproduct = $hasilcounting['totalproduct'];

  // Listing Transaction
  $querylist = "SELECT * from bookings";
  $connect = mysqli_query($koneksi,$querylist);

  // Listing User
  $queryusers = "SELECT * from users";
  $connectusers = mysqli_query($koneksi,$queryusers);

  //Listing Product
  
  $queryproduct = "SELECT * from product";
  $connectproduct = mysqli_query($koneksi,$queryproduct);
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rafly Yogaswara 1202190061 SI4301</title>
    <!-- Custom CSS -->
    <link href="../assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand justify-content-center" href="index.php">
              <!-- Logo icon -->
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="../assets/images/icon.jpg" width="50" alt="homepage" class="dark-logo" />
              </b>
              <!--End Logo icon -->
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
                  <img src="../assets/images/users/1.jpg" alt="user" class="profile-pic me-2" /><?=$tampilcheck['username']?>
                </a>
                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <li><a class='dropdown-item' href='profile.php?admin=<?=$_SESSION['id']?>'>Profile</a></li>
                    <li><a class='dropdown-item' href='config.php?logout=yes'>Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
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
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="user.php" aria-expanded="false"> <i class="me-3 fa fa-users" aria-hidden="true"></i><span class="hide-menu">Edit User</span></a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="transaksi.php" aria-expanded="false"> <i class="me-3 fa fa-box-open" aria-hidden="true"></i><span class="hide-menu">Transaksi</span></a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="product.php" aria-expanded="false"> <i class="me-3 fa fa-box-open" aria-hidden="true"></i><span class="hide-menu">Add Product</span></a>
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
              <h3 class="page-title mb-0 p-0">Dashboard</h3>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Total Pemesanan</h4>
                  <div class="text-end">
                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> <?= $tampil?> / <?=$tampilproduct?></h2>
                    <span class="text-muted">Todays Income</span>
                  </div>
                  <span class="text-success">5%</span>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 5%; height: 6px" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Total Users</h4>
                  <div class="text-end">
                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i><?= $countinguser?> / 5</h2>
                    <span class="text-muted">Todays Income</span>
                  </div>
                  <span class="text-info">30%</span>
                  <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 30%; height: 6px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- column -->
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Statistika</h4>
                  <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-line-chart" style="padding: 0px; position: relative">
                      <canvas class="flot-base w-100" height="400"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- column -->
          </div>
          
          <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Daftar Product</h4>
                      <div class="table-responsive">
                      <?php if(mysqli_num_rows($connectproduct) >= 1){?>
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">ID Product</th>
                                    <th class="border-top-0">Nama Alat</th>
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                                while ($tampil = mysqli_fetch_array($connectproduct)){
                              ?>
                                <tr>
                                    <td><?=$tampil['id']?></td>
                                    <td><?=$tampil['NamaAlat']?></td>
                                    <td><?=$tampil['description']?></td>
                                    <td>Rp <?=number_format($tampil['harga'], 0, ",", ".")?></td>
                                </tr>
                              <?php 
                                }
                              ?>
                            </tbody>
                        </table>
                      </div>
                      <?php }else{
                          echo '<h1 class="text-center">THERE IS NO DATA</h1>';
                        }
                      ?>
                    </div>
                </div>
            </div>
          </div>

          <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Daftar User</h4>
                      <div class="table-responsive">
                      <?php if(mysqli_num_rows($connectusers) >= 1){?>
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">ID</th>
                                    <th class="border-top-0">Nama User</th>
                                    <th class="border-top-0">Email User</th>
                                    <th class="border-top-0">No Handphone</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                                while ($tampil = mysqli_fetch_array($connectusers)){
                              ?>
                                <tr>
                                    <td><?=$tampil['id']?></td>
                                    <td><?=$tampil['nama']?></td>
                                    <td><?=$tampil['email']?></td>
                                    <td><?=$tampil['no_hp']?></td>
                                    <td>
                                      <a class="btn btn-warning" href="user.php" role="button">Ubah User</a>
                                    </td>
                                </tr>
                              <?php 
                                }
                              ?>
                            </tbody>
                        </table>
                      </div>
                      <?php }else{
                          echo '<h1 class="text-center">THERE IS NO DATA</h1>';
                        }
                      ?>
                    </div>
                </div>
            </div>
          </div>

          <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Daftar Transaksi</h4>
                      <div class="table-responsive">
                      <?php if(mysqli_num_rows($connect) >= 1){?>
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">ID</th>
                                    <th class="border-top-0">Nama Pelanggan</th>
                                    <th class="border-top-0">Nama Alat</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                                while ($tampil = mysqli_fetch_array($connect)){
                              ?>
                                <tr>
                                    <td><?=$tampil['id']?></td>
                                    <td><?=$tampil['NamaUser']?></td>
                                    <td><?=$tampil['namaAlat']?></td>
                                    <td>
                                      <?php 
                                        if ($tampil['status'] == 'Sudah Bayar'){
                                            echo 'Pembayaran Berhasil';
                                        }elseif($tampil['bukti_pembayaran'] >= 1){
                                            echo 'Menunggu Konfirmasi';
                                        }else{
                                            echo $tampil['status'];
                                        }
                                      ?>
                                    </td>  
                                    <td>
                                      <a class="btn btn-warning" href="transaksi.php" role="button">Ubah Status</a>
                                    </td>
                                </tr>
                              <?php 
                                }
                              ?>
                            </tbody>
                        </table>
                      </div>
                      <?php }else{
                          echo '<h1 class="text-center">THERE IS NO DATA</h1>';
                        }
                      ?>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          <p class="text-black">&copy; Copyright <a href="#" class="text-black" data-bs-toggle="modal" data-bs-target="#identitas">RAFLY_1202190061</a></p>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <div class="modal fade" id="identitas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Created By</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <pre>Nama    : Rafly Yogaswara</pre>
                    <pre>NIM     : 1202190061</pre>
                </div>
            </div>
        </div>
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
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src="../assets/plugins/flot/jquery.flot.js"></script>
    <script src="../assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
  </body>
</html>
