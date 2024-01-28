<?php
require_once '../config/database.php';
require_once '../config/general-function.php';
$tgl = date('Y-m-d');
$sql = mysqli_query($koneksi, "SELECT * FROM tb_antrian WHERE tgl_antrian='$tgl' and status_antrian = '0' ORDER BY id_antrian ASC");
if (mysqli_num_rows($sql) > 0) {
    $data = mysqli_fetch_array($sql);
    echo '<h1 class="font-weight-bolder">' . treedigit($data['no_antrian']) . '</h1>';
} else {
    echo '<h6 class="font-weight-bolder">Tidak Ada Antrian / Antrian Selesai</h6>';
}
