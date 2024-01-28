<?php
session_start();
include 'app/config/database.php';
include 'app/config/general-function.php';
include 'app/controller/read.php';
// include 'app/config/alert-function.php';
include 'app/controller/login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= url() ?>">
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
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <script src="/assets/vendor/sweetallert/js/sweetallert.js"></script>

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
            /* position: absolute; */
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
                <div class="col-xl-8 col-lg-8 col-md-8 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center">
                            <h4 class="font-weigh-bold">BUAT AKUN</h4>
                        </div>
                        <div class="card-body">
                            <form role="form" action="register" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Silahkan masukkan nama lengkap anda" aria-label="Nama Lengkap" required>
                                        </div>
                                        <div>
                                            <label for="">Nomor Induk KTP</label>
                                            <input type="text" name="nik" id="nikInput" class="form-control" placeholder="Masukkan nomor induk KTP anda" aria-label="nik" required maxlength="16" pattern="\d{16}" title="Masukkan 16 Digit Nomor Induk KTP Anda">

                                        </div>
                                        <div>
                                            <label for="jenis_kelamin">Jenis Jelamin</label>
                                                <input type="radio" id="jkl" name="jk" value="l" required>
                                                <label for="jkl">Laki-laki</label>
                                                <input type="radio" id="jkp" name="jk" value="p" required>
                                                <label for="jkp">Perempuan</label>
                                        </div>
                                        <div>
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                                                <option value="" disabled selected>Pilih Pekerjaan</option>
                                                <?php
                                                $pekerjaan = data_pekerjaan();
                                                foreach ($pekerjaan as $dt) { ?>
                                                    <option value="<?=$dt['id_pekerjaan']?>"><?= $dt['pekerjaan'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label for="">Tampat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                                        </div>
                                        <div>
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control" required>
                                        </div>
                                        <div>
                                            <label for="">Alamat Anda</label>
                                            <textarea name="alamat" class="form-control" rows="2" placeholder="Masukkan Alamat anda sesuai KTP" aria-label="pesan" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div>
                                            <label for="">Buat Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Silahkan masukkan username anda" aria-label="Name" required>
                                        </div>
                                        <div>
                                            <label for="">Buat Password</label>
                                            <div class="row">
                                                <div class="col-11">
                                                    <input type="password" name="password" id="pwd" class="form-control" placeholder="Masukkan Passowrd anda" aria-label="Password" required>
                                                </div>
                                                <div class="col-1">
                                                    <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" name="register" class="btn bg-gradient-dark w-100">Daftar Sekarang</button>
                                </div>
                            </form>
                            <p>Sudah Punya Akun ? Klik <a href="login">Disini</a></p>
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

        // NIK VALUE 
        document.getElementById('nikInput').addEventListener('input', function(event) {
            var inputValue = event.target.value;
            var numericValue = inputValue.replace(/\D/g, '');
            if (numericValue.length > 16) {
                numericValue = numericValue.slice(0, 16);
            }
            event.target.value = numericValue;
        });
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