<?php
function data_user(){
    global $koneksi;
    $data = mysqli_query($koneksi, "SELECT * FROM tb_user INNER JOIN tb_datadiri ON tb_datadiri.id_user = tb_user.id_user ORDER BY nama_lengkap ASC") or die(mysqli_error($koneksi));
    return $data;
}

function data_test($id){
    global $koneksi;
    return mysqli_query($koneksi, "SELECT * FROM `tb_hasiltest` WHERE id_datadiri='$id'")or die(mysqli_error($koneksi));
}


function data_antrian($onday){
    global $koneksi;
    $data = mysqli_query($koneksi, "SELECT * FROM tb_datadiri INNER JOIN tb_antrian ON tb_antrian.id_datadiri = tb_datadiri.id_datadiri WHERE tgl_antrian = '$onday' and status_antrian='0' ORDER BY id_antrian ASC") or die(mysqli_error($koneksi));
    return $data;
}

function data_antrianku($id_user){
    global $koneksi;
    $data = mysqli_query($koneksi, "SELECT * FROM tb_datadiri INNER JOIN tb_antrian ON tb_antrian.id_datadiri = tb_datadiri.id_datadiri WHERE id_user='$id_user' ORDER BY id_antrian ASC") or die(mysqli_error($koneksi));
    return $data;
}


function jumlah_antrian($tgl){
    global $koneksi;
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_datadiri INNER JOIN tb_antrian ON tb_antrian.id_datadiri = tb_datadiri.id_datadiri WHERE tgl_antrian = '$tgl' and status_antrian='0' ORDER BY id_antrian ASC") or die(mysqli_error($koneksi));
    $data = mysqli_num_rows($sql);
    return $data;
}

function jumlah_pengguna(){
    $data = mysqli_num_rows(data_user());
    return $data;
}

function nomor_antrian_sekarang(){
    global $koneksi;
    $tgl = date('Y-m-d');
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_antrian WHERE tgl_antrian='$tgl' and status_antrian = '0' ORDER BY id_antrian ASC");
    if(mysqli_num_rows($sql)>0){
        $data = mysqli_fetch_array($sql);
        return '<h3 class="font-weight-bolder">'.$data['no_antrian'].'</h3>';
    }else{
        return '<h6 class="font-weight-bolder">Tidak Ada Antrian / Antrian Selesai</h6>';
    }
}

function data_pekerjaan(){
    global $koneksi;
    return mysqli_query($koneksi, "SELECT * FROM tb_pekerjaan ORDER by pekerjaan ASC");
}
?>