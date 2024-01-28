<?php
require_once '../../app/config/database.php';
require_once '../../app/controller/read.php';
$tgl_antrian = $_GET['tgl_antrian'];
$no_antrianku = jumlah_antrian($tgl_antrian) + 1;
echo 'Antrian Nomor : '. $no_antrianku;
?>