<?php
// Pastikan session dimulai sebelum menggunakan $_SESSION

session_start();
require_once 'koneksi/koneksi.php';

if (!isset($_SESSION['level']) || empty($_SESSION['level'])) {
  header('Location: unauthorized.php');
  exit();
}

// Ambil informasi pengguna dari sesi jika diperlukan
$nim = isset($_SESSION['nim']) ? $_SESSION['nim'] : 'Tidak ada pengguna'; // Ganti pesan default sesuai kebutuhan


?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KRS mahasiswa</title>
  <!-- alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav //bg-gradient-info// sidebar sidebar-dark  accordion" style="background :#8E81FF ;" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?halaman=krs">
        <div class="sidebar-brand-icon ">
        <i class="bi bi-mortarboard"></i>
        </div>
        <div class="sidebar-brand-text mx-2">KRS mahasiswa</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      

      <hr class="sidebar-divider">

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTri" aria-expanded="true" aria-controls="collapseTri">
        <i class="bi bi-folder2-open"></i>
          <span>KRS</span>
        </a>
        <div id="collapseTri" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">KRS</h6>
            <a class="collapse-item"  href="index.php?halaman=krs">kRS <i class="fas fa-book-reader"></i></a>
            
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWan" aria-expanded="true" aria-controls="collapseWan">
          <i class="fas fa-server"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseWan" class="collapse" aria-labelledby="headingWan" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Data :</h6>
            <a class="collapse-item" href="index.php?halaman=mahasiswa">Mahasiswa <i class="fas fa-user-graduate"></i> </a>
            <a class="collapse-item" href="#"> pembayaran<i class="fas fa-building"></i></a>
          </div>
        </div>
      </li>

      




      <!-- Divider -->
      <hr class="sidebar-divider">





      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn text-light" style="background-color: #8E81FF;" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <img class="img-profile rounded-circle" src="assets/gambar/me1.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
              

                <a class="dropdown-item" href="#" onclick="logout()">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>

                <script>
                  function logout() {
                    Swal.fire({
                      title: 'Konfirmasi Logout',
                      text: 'Anda yakin ingin logout?',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Ya',
                      cancelButtonText: 'Batal'
                    }).then(function(result) {
                      if (result.isConfirmed) {
                        window.location.href = 'index.php?halaman=logout';
                      }
                    });
                  }
                </script>

              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <?php
          if (isset($_GET['halaman'])) {

            $halaman = $_GET['halaman'];

            // halaman admin
            if ($halaman === 'admin') {
              include 'admin.php';
            } elseif ($halaman === 'krs') {
              include 'krs.php';
            } elseif ($halaman === 'daftar_mk') {
              include 'daftar_mk.php';
            }elseif ($halaman === 'hapus_daftar_mk') {
              include 'hapus_daftar_mk.php';
            }elseif ($halaman === 'genap') {
                include 'genap.php';

            
            }elseif ($halaman === 'coba') {
              include 'coba.php';
            } 
            
            elseif ($halaman === 'mahasiswa') {
              include 'mahasiswa.php';
            } 
            

    
            // logout
            elseif ($halaman === 'logout') {
              include 'logout.php';
            }
          
          }
          ?>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Dashboard KRS</span>
          </div>
        </div>
      </footer>
      <footer class="bg-white py-1 mt-auto">
        <div class="container px-5 ">
          <div class="card border-0">
            
             <center> <p><a href="https://thohirreza.000webhostapp.com/index.php?halaman=home" > Website & Developed  by Reza Aditya</a></p></center>

          </div>

      </footer>
    </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>


  <script>
    $(document).ready(function() {
      $('#tables').DataTable();
    });
  </script>
</body>

</html>