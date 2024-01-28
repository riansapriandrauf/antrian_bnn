<?php
if (isset($_POST['login'])) {
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, sha1($_POST['password']));

    $cek_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username'") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($cek_user) > 0) {
        $valid = mysqli_fetch_array($cek_user);
        if ($password == $valid['password']) {
            $_SESSION['id_user']    = $valid['id_user'];
            $_SESSION['username']   = $valid['username'];
            $_SESSION['level']      = $valid['level'];
            echo '<body onload="berhasil_login()"></body>';
        } else {
            echo '<body onload="pw_salah()"></body>';
        }
    } else {
        echo '<body onload="no_user()"></body>';
    }
}

if (isset($_POST['register'])) {
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, sha1($_POST['password']));

    $nama_lengkap   = $_POST['nama_lengkap'];
    $nik            = $_POST['nik'];
    $jk             = $_POST['jk'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $alamat         = $_POST['alamat'];
    $id_pekerjaan         = $_POST['pekerjaan'];

    $buat_akun = mysqli_query($koneksi, "SELECT * from tb_user WHERE username='$username'") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($buat_akun) == 0) {
        $kirim = mysqli_query($koneksi, "INSERT into tb_user (`username`, `password`, `level`) VALUES ('$username', '$password', '0')") or die(mysqli_error($koneksi));
        if ($kirim) {
            $id_user = mysqli_insert_id($koneksi);
            $kirim2 = mysqli_query($koneksi, "INSERT into tb_datadiri 
            (`id_user`, `id_pekerjaan`, `nama_lengkap`, `nik`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`) VALUES 
            ('$id_user', '$id_pekerjaan', '$nama_lengkap', '$nik', '$jk', '$tempat_lahir', '$tgl_lahir', '$alamat')") or die(mysqli_error($koneksi));
            if ($kirim2) {
                echo '<body onload="berhasil_regis()"></body>';
            } else {
                echo '<body onload="gagal_regis()"></body>';
            }
        } else {
            echo '<body onload="gagal_regis()"></body>';
        }
    } else {
        echo '<body onload="user_ada()"></body>';
    }
}
