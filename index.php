<?php
session_start();
require_once 'app/config/database.php';
require_once 'app/config/general-function.php';
require_once 'app/config/privacy-function.php';
require_once 'app/config/allert-function.php';
require_once 'app/controller/read.php';
require_once 'app/controller/create.php';
require_once 'app/controller/update.php';
$queris = array();
parse_str($_SERVER['QUERY_STRING'], $queris);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$queris12 = $queris['page'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?= url() ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/logo-bnn.png">
  <title>BADAN NARKOTIKA NASIONAL - KOLAKA</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="vendor/fontawesome/fa.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

  <!-- SWEETALERT  -->
  <script src="vendor/sweetallert/js/sweetallert.js"></script>

  <!-- COMPOSER  -->
  <!-- components/jquery/jquery.min.js -->
  <script src="vendor/jquery-3/jquery-3.6.0.min.js"></script>
  <script src="vendor/DataTables/datatables.min.js"></script>
  <link rel="stylesheet" href="vendor/DataTables/datatables1.min.css">
  <!-- datatables/media/js/jquery.dataTables.min.js -->
  <style>
    .coret {
      text-decoration: line-through
    }
  </style>


  <!-- SESI ACTION  -->
  <?php
  if (empty($_SESSION['username']) && empty($_SESSION['level'])) { ?>
    <script>
      window.location.href = "login"
    </script>
  <?php }
  ?>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div id="ResponsAlert"></div>
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php
  if ($_SESSION['level'] >= 1) {
  ?>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="" target="_blank">
          <img src="assets/img/logo-bnn.png" class="navbar-brand-img h-100" alt="main_logo">
          <span class="ms-1 font-weight-bold">BNN - KOLAKA</span>
        </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= active('') ?>" href="">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>

          <?php
          if ($_SESSION['level'] == 1) { ?>

            <li class="nav-item">
              <a class="nav-link <?= active('data-user') ?>" href="data-user">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Data User</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= active('data-antrian') ?>" href="data-antrian">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Antrian</span>
              </a>
            </li>

          <?php }

          if ($_SESSION['level'] == 2) { ?>
            <li class="nav-item">
              <a class="nav-link <?= active('test-urine') ?>" href="test-urine">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-app text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Test Urine</span>
              </a>
            </li>
          <?php } else if ($_SESSION['level'] == 3) { ?>
            <li class="nav-item">
              <a class="nav-link <?= active('hasil-test') ?>" href="hasil-test">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Laporan Hasil Test</span>
              </a>
            </li>
          <?php } ?>
          <!-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="pages/sign-in.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="pages/sign-up.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li> -->
        </ul>
      </div>
      <div class="sidenav-footer mx-2 pt-5">
        <div class="card card-plain shadow-none" id="sidenavCard">
          <img class="w-50 mx-auto" src="assets/img/logo-bnn.png" alt="sidebar_illustration">
          <div class="card-body text-center p-3 w-100 pt-0">
            <div class="docs-info">
              <h6 class="mb-0">BNN - KOLAKA</h6>
              <p class="text-xs font-weight-bold mb-0">Badan Narkotika Nasional</p>
            </div>
          </div>
        </div>
      </div>
    </aside>
  <?php
  }
  ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= page($queris['page']) ?></li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0"><?= page($queris['page']) ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <!-- <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div> -->
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="logout" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?= name_level($_SESSION['level']) ?></span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid py-4">
      <!-- End Navbar -->
      <?php
      switch ($queris12) {
        case 'data-user':
          include 'view/data-pengguna.php';
          break;
        case 'data-antrian':
          include 'view/data-antrian.php';
          break;
        case 'test-urine':
          include 'view/test-urine.php';
          break;
        case 'hasil-test':
          include 'view/lap-hasiltest.php';
          break;

        case 'logout':
          include 'app/controller/logout.php';
          break;
        default:
          include 'view/home.php';
          break;
      }
      ?>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="#" class="font-weight-bold" target="_blank">FTI USN
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    function loadData() {
      var onday = document.getElementById('tgl_antrian').value;

      $.ajax({
        url: 'app/controller/load_data.php',
        type: 'POST',
        data: {
          onday: onday
        },
        success: function(response) {
          $('#dataku').html(response);
        }
      });
    }
    loadData();
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- datatabels -->
  <script>
    $(document).ready(function() {
      $('.table').DataTable();
    });
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script>
    function disableWeekend() {
      var selectedDateValue = $('#tgl_antrian').val();
      var selectedDate = new Date(selectedDateValue);
      var dayOfWeek = selectedDate.getDay();

      if (dayOfWeek === 0 || dayOfWeek === 6) {
        alert('Tanggal tidak dapat dipilih pada hari Sabtu atau Minggu.');
        $('#tgl_antrian').val('');
        $('#no_antrian').val('');
      } else {
        $.ajax({
          url: 'app/controller/get_jumlah_antrian.php',
          type: 'GET',
          data: {
            tgl_antrian: selectedDateValue
          },
          success: function(data) {
            $('#no_antrian').val(data);
          },
          error: function() {
            alert('Gagal memperbarui nomor antrian.');
          }
        });
      }
    }


    // SETUP REALTIME ANTRIAN 
    function updateNomorAntrian() {
      $.ajax({
        url: 'app/controller/endpoint_nomor_antrian.php',
        method: 'GET',
        success: function(response) {
          $('#nomor-antrian').html(response);
        }
      });
    }

    $(document).ready(function() {
			setInterval(function() {
				$("#list-waktu").load('');
			}, 1000); //update setiap 1 detik
		});

    function updateNomorAntrian() {
      $.ajax({
        url: 'app/controller/list-waktu.php',
        method: 'GET',
        success: function(response) {
          $('#nomor-antrian').html(response);
        }
      });
    }

    updateNomorAntrian();
    setInterval(updateNomorAntrian, 1000);
  </script>
</body>

</html>