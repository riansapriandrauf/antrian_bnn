<?php
if (isset($_POST['boking_antrian'])) {
    $id_datadiri    = id('datadiri');
    $tgl_antrian    = $_POST['tgl_antrian'];
    $no_antrian     = jumlah_antrian($tgl_antrian) + 1;
    $status_antrian = 0;

    $cek = mysqli_query($koneksi, "SELECT * FROM tb_antrian WHERE tgl_antrian='$tgl_antrian' and id_datadiri ='$id_datadiri'") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($cek) == 0) {
        $kirim = mysqli_query($koneksi, "INSERT into tb_antrian 
        (`id_datadiri`, `tgl_antrian`, `no_antrian`, `status_antrian`) VALUES 
        ('$id_datadiri', '$tgl_antrian', '$no_antrian', '$status_antrian')") or die(mysqli_error($koneksi));
        if ($kirim) {
            echo '<body onload="berhasil()"></body>';
        } else {
            echo '<body onload="gagal()"></body>';
        }
    } else {
        echo '<body onload="double_antrian()"></body>';
    }
}

if (isset($_POST['sv_hasiltest'])) {
    $id_datadiri =  $_POST['id_datadiri'];
    $id_antrian = $_POST['id_antrian'];

    $amphetamenie       = $_POST['amphetamenie'];
    $methamphetamine    = $_POST['methamphetamine'];
    $morphine           = $_POST['morphine'];
    $thc                = $_POST['thc'];
    $cocaine            = $_POST['cocaine'];
    $benzodiazepine     = $_POST['benzodiazepine'];
    $fisik              = $_POST['fisik'];
    $tgl                = date('Y-m-d');

    $cek = mysqli_query($koneksi, "SELECT * FROM tb_hasiltest WHERE id_antrian='$id_antrian'") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($cek) == 0) {
        $kirim = mysqli_query($koneksi, "INSERT INTO tb_hasiltest 
        (`id_antrian`, `id_datadiri`, `amphetamenie`, `methamphetamine`, `morphine`, `thc`, `cocaine`, `benzodiazepine`, `fisik`, `tgl`) VALUES
        ('$id_antrian', '$id_datadiri', '$amphetamenie', '$methamphetamine', '$morphine', '$thc', '$cocaine', '$benzodiazepine', '$fisik', '$tgl')") or die(mysqli_error($koneksi));
        if ($kirim) {
            echo '<body onload="berhasil()"></body>';
        } else {
            echo '<body onload="gagal()"></body>';
        }
    } else {
        $kirim = mysqli_query($koneksi, "UPDATE tb_hasiltest 
        SET 
            amphetamenie    = '$amphetamenie',
            methamphetamine = '$methamphetamine',
            morphine        = '$morphine',
            thc             = '$thc',
            cocaine         = '$cocaine',
            benzodiazepine  = '$benzodiazepine',
            fisik           = '$fisik'
        WHERE 
            id_antrian = '$id_antrian';") or die(mysqli_error($koneksi));
        if ($kirim) {
            echo '<body onload="berhasil()"></body>';
        } else {
            echo '<body onload="gagal()"></body>';
        }
    }
}
