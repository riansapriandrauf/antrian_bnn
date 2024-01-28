<?php
if (isset($_POST['done_antrian'])) {
    $id_antrian = $_POST['id_antrian'];
    $update = mysqli_query($koneksi, "UPDATE tb_antrian SET status_antrian='1' WHERE id_antrian='$id_antrian'") or die(mysqli_error($koneksi));
}
