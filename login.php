<?php
session_start();
include 'app/config/database.php';
include 'app/config/general-function.php';
include 'app/config/allert-function.php';
include 'app/controller/login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?=url()?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
        LOGIN NOW
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="vendor/fontawesome-6/js/all.min.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <script src="/assets/vendor/sweetallert/js/sweetallert.js"></script>

    <script src="vendor/sweetallert/js/sweetallert.js"></script>

    <script type="text/javascript" src="assets/vendor/jquery-2.0.3/jquery-2.0.3.min.js"></script>
    <!-- SHOW HIDE ICON POSITION -->
    <style>
        #eye {
            background: #fff;
            color: #333;
            opacity: 80%;
            /* margin: 0px 0 0 0; */
            margin-left: -20px;
            margin-top: 0.8em;
            /* padding: 2px 9px 19px 0px; */
            /* border-radius: 0px 5px 5px 0px; */

            float: right;
            position: absolute;
            right: 10%;
            top: 48%;
            z-index: 5;

            cursor: pointer;
        }
    </style>
</head>

<body class="">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('assets/img/bnn-kolaka.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white">Selamat Datang!</h1>
                        <p class="text-lead text-white">Di Sistem Boking Antrian Badan Narkotika Nasional <br>Kabupaten Kolaka</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center">
                            <h5>LOGIN</h5>
                        </div>
                        <div class="card-body">
                            <form role="form" action="login" method="POST">
                                <div class="mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Silahkan masukkan username anda" aria-label="Name">
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" id="pwd" class="form-control" placeholder="Masukkan Passowrd anda" aria-label="Password">
                                    <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="login" class="btn bg-gradient-dark w-100">Log In</button>
                                </div>
                            </form>
                            <p>Belum Punya Akun ? Klik <a href="register">Disini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-3">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright © <script>
                            document.write(new Date().getFullYear())
                        </script> FTI USN.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>

    <!-- SHOW HIDE PW  -->
    <script>
        function show() {
            var p = document.getElementById('pwd');
            p.setAttribute('type', 'text');
        }

        function hide() {
            var p = document.getElementById('pwd');
            p.setAttribute('type', 'password');
        }

        var pwShown = 0;

        document.getElementById("eye").addEventListener("click", function() {
            if (pwShown == 0) {
                pwShown = 1;
                show();
            } else {
                pwShown = 0;
                hide();
            }
        }, false);
    </script>

    <script src="assets/js/sweetalert14.js"></script>

    <div id="kirim-info"></div>
</body>

</html>