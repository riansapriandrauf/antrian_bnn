<?php
function id($target)
{
    global $koneksi;
    $id_user = $_SESSION['id_user'];
    if ($target == "datadiri") {
        $cek = mysqli_query($koneksi, "SELECT * FROM tb_user INNER JOIN tb_datadiri on tb_datadiri.id_user = tb_user.id_user WHERE tb_user.id_user='$id_user'") or die(mysqli_error($koneksi));
        $dt12 = mysqli_fetch_array($cek);
        return $dt12['id_datadiri'];
    }
}

function povneg($data)
{
    if ($data == 2) {
        return '<a class="coret">Positif</a> / <a>Negatif</a>';
    } else {
        return '<a>Positif</a> / <a class="coret">Negatif</a>';
    }
}

function fisik($data){
    if($data == 2){
        return '<a class="coret">ditemukan</a> / <a>tidak ditemukan</a>';
    }else{
        return '<a>ditemukan</a> / <a class="coret">tidak ditemukan</a>';
    }
}

function terindikasi($data){
    if($data == 2){
        return '<a class="coret">TERINDIKASI</a> / <a>TIDAK TERINDIKASI</a>';
    }else{
        return '<a>TERINDIKASI</a> / <a class="coret">TIDAK TERINDIKASI</a>';
    }
}
?>