<?php
include "db_connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>PCS Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/jsvectormap/dist/css/jsvectormap.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />

  <link href="../assets/css/jsvectormap.css" rel="stylesheet" />
  <script src="../assets/js/functions/jsvectormap.min.js"></script>
  <script src="../assets/js/functions/world-merc.js"></script>
  <script src="../assets/js/functions/world.js"></script>

  <style>
    #map {
      height: 450px;
      width: 100%;
      overflow: hidden;
      float: left;
      border-radius: 30px;
    }

    a[href^="http://maps.google.com/maps"],
    a[href^="https://maps.google.com/maps"],
    a[href^="https://www.google.com/maps"] {
      display: none !important;
    }

    .gm-bundled-control .gmnoprint {
      display: block;
    }

    .gmnoprint:not(.gm-bundled-control) {
      display: none;
    }
  </style>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
      style="background-color: #172b4d; background-image: none;">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Geo</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="geo.php">
          <i class="fas fa-fw fa-map"></i>
          <span>Geo</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="documents.php">
          <i class="fas fa-fw fa-file"></i>
          <span>Documents</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="settings.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Settings</span></a>
      </li>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="container-fluid">
                        <h1 class="h3 mt-3 text-gray-800 ">Ineractive Map</h1>
                        <div class="d-flex">
                            <!-- Nav Item - User Information -->
                            
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["loggedInUser"] ?></span>
                                    <img class="img-profile rounded-circle" src="img/man.png" style="width: 50px;">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                           
                        </div>
                    </div>
                </nav>
<!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-end mb-4">

            <a href="#" class="d-none d-sm-inline-block btn bg-success shadow-sm text-white"><i
                class="fas fa-tree fa-sm text-white-50"></i> Register New
              Project</a>
          </div>

          <!-- Map -->

          <div class="row">
            <div class="col-6"><div id="map"></div></div>
            <div class="col-4 offset-2">
              <h2 class="m-3 " style="font-weight: bold;">Nottingham</h2>
              <img src="img/icons/cloudy.png" style="width: 100px;"/> <span style="margin-left: 25px; margin-top: 15px; font-size: 40px;">25°</span>
              <br/><br/><img src="img/icons/wind.png" style="width: 100px;"/><span style="margin-left: 25px; margin-top: 15px; font-size: 40px;">13 km/h</span>
              <br/><br/><img src="img/icons/tree.png" style="width: 100px;"/><span style="margin-left: 25px; font-size: 40px;">448</span>
            </div>
          </div>
          

          <script>
            function initMap() {


              const uluru = new google.maps.LatLng(53, -1.33);

              const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: uluru,
                fullscreenControl: false,
                mapTypeControl: false,
                streetViewControl: false,
              });

              const marker = new google.maps.Marker({
                position: uluru,
                map: map,
                animation: google.maps.Animation.DROP
              });
            }

            window.initMap = initMap;
            marker.addListener("click", () => {
              infowindow.open(marker.get("map"), marker);
            });

          </script>

          <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO-7fnvr_bhld57PhQt3Zgf6w2XrCs9ig&callback=initMap&v=weekly"
            defer></script>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span></span>
          </div>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Cancel
          </button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>