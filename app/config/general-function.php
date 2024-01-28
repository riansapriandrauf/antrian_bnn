<?php
function url()
{
    return "http://localhost/joki/anggel/";
}
function encrypt($id)
{
    $code       = url() . $id;
    $encrypt    = base64_encode($code);
    return $encrypt;
}

function decrypt($code)
{
    $fake_code  = base64_decode($code);
    $decrypt    = str_replace(url(), '', $fake_code);
    return $decrypt;
}
function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function hitung_umur($tanggal_lahir)
{
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    // return $y . " tahun " . $m . " bulan " . $d . " hari";
    return $y;
}
function kembali()
{
    $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $data = 'window.location="' . $link . '"';
    return $data;
}

function jenis_kelamin($jenis)
{
    if ($jenis == 'l') {
        return "Laki-Laki";
    } else {
        return "Perempuan";
    }
}

function active($target)
{
    global $queris12;
    if ($queris12 == $target) {
        return "text-white active bg-info";
    }
}
function treedigit($number)
{
    // Menerapkan format tiga digit dengan nol di depan
    return sprintf('%03d', $number);
}
function name_level($id)
{
    if ($id == 0) {
        return 'User';
    } else if ($id == 1) {
        return 'Admin';
    } else if ($id == 2) {
        return 'Lab';
    } else if ($id == 3) {
        return 'Pimpinan';
    }
}
function page($link)
{
    if (empty($link)) {
        return 'Dashboard';
    } else {
        return ucwords(str_replace('-', ' ', $link));
    }
}

function selected_status($id, $target){
    if($id == $target){
        return "Selected";
    }
}