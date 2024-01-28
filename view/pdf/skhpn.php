<?php
require_once '../app/config/database.php';
require_once '../app/config/general-function.php';
require_once '../app/config/privacy-function.php';
require_once '../app/config/allert-function.php';
$id_antrian = decrypt($_GET['id']);
$sql    = mysqli_query($koneksi, "SELECT * FROM tb_datadiri 
        INNER JOIN tb_hasiltest 
        ON tb_hasiltest.id_datadiri = tb_datadiri.id_datadiri 
        INNER JOIN tb_pekerjaan
        ON tb_datadiri.id_pekerjaan = tb_pekerjaan.id_pekerjaan
        WHERE tb_hasiltest.id_antrian='$id_antrian'") or die(mysqli_error($koneksi));

$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT KETERANGAN HASIL PEMERIKSAAN NARKOTIKA</title>
    <style>
        .top {
            text-align: center;
            line-height: 0.2rem;
        }

        .coret {
            text-decoration: line-through;
        }

        .text-underline {
            text-decoration: underline;
        }

        .text-center {
            text-align: center;
        }

        .fw-bold {
            font-weight: bolder;
        }

        .text-left {
            text-align: left;
        }
        .text-right{
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="top">
        <img src="logo-bnn.png" alt="" width="25%">
        <p>BNNK KOLAKA</p>
        <h3 class="text-underline">SURAT KETERANGAN HASIL PEMERIKSAAN NARKOTIKA</h3>
        <h3>NOMOR : SKHPN- &nbsp; &nbsp; / &nbsp; &nbsp; /74- &nbsp; &nbsp; /<?= date('Y', strtotime($data['tgl'])) ?></h3>
    </div>

    <!-- START MID  -->
    <div class="mid-top">
        <table width="100%">
            <tr>
                <td colspan="3">Diterangakan bersama ini bahwa</td>
            </tr>
            <tr>
                <td style="width: 30%;">Nama Lengkap</td>
                <td style="width: 1%;">:</td>
                <td class="text-left"><?= $data['nama_lengkap'] ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td class="text-left"><?= $data['nik'] ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td class="text-left"><?= jenis_kelamin($data['jk']) ?></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $data['tempat_lahir'] . ', ' . tanggal_indo($data['tgl_lahir']) ?></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?= $data['pekerjaan'] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $data['alamat'] ?></td>
            </tr>
        </table>
    </div>
    <!-- END MID  -->

    <!-- Start isi  -->
    <div class="isi">
        <div class="top-isi">
            <p>Telah dilakukan pemeriksaan penggunaan narkotika dengan metode</p>
            <ol type="a">
                <li>Wawancara klinis menggunakan DAST-10/ASSIST dengan hasil 0 (Tidak ada intervensi) dengan metode assist</li>
                <li>Pemeriksaan Urin menggunakan rapid test / immuno essay 6 (enam) parameter dengan hasil</li>
                <table width="100%">
                    <tr>
                        <td style="width: 30%;">1. Amphetamenie</td>
                        <td><?= povneg($data['amphetamenie']) ?></td>
                    </tr>
                    <tr>
                        <td>2. Methamphetamine</td>
                        <td><?= povneg($data['methamphetamine']) ?></td>
                    </tr>
                    <tr>
                        <td>3. Morphine</td>
                        <td><?= povneg($data['morphine']) ?></td>
                    </tr>
                    <tr>
                        <td>4. Thc</td>
                        <td><?= povneg($data['thc']) ?></td>
                    </tr>
                    <tr>
                        <td>5. Cocaine</td>
                        <td><?= povneg($data['cocaine']) ?></td>
                    </tr>
                    <tr>
                        <td>6. Benzodiazepine</td>
                        <td><?= povneg($data['benzodiazepine']) ?></td>
                    </tr>
                </table>
                <li>Pemeriksaan fisik dengan hasil <?= fisik($data['fisik']) ?> Tanda-tanda menggunakan narkotika.</li>
            </ol>
        </div>
        <div class="bottom-isi">
            <p>Dapat disimpulkan bahwa terperiksa tersebut diatas <?= terindikasi($data['fisik']) ?> menggunakan narkotika sesuai hasil pemeriksaan pada saat surat keterangan ini diterbitkan</p>
            <p>Surat keterangan ini digunakan untuk Kelengkapan berkas ..............................</p>
        </div>
    </div>
    <!-- End isi  -->

    <div class="ttd">
        <table width="100%">
            <tr>
                <td class="text-right" colspan="2">Kolaka, <?= tanggal_indo($data['tgl']) ?></td>
            </tr>
            <tr class="text-center">
                <td>
                    MENGETAHUI <br>
                    KEPALA BADAN NARKOTIKA NASIONAL <br>
                    KABUPATEN KOLAKA
                </td>
                <td>
                    DOKTER PEMERIKSA
                </td>
            </tr>
            <tr class="text-center fw-bold">
                <td>
                    <br><br><br><br><br>
                    SYAMSUARTO, S. Sos., M.Kes
                </td>
                <td>
                    <br><br><br><br><br>
                    Dr. NISSA DWI FEBRIYANTY
                </td>
            </tr>
            <!-- <tr>
                <td class="text-center" colspan="2"><br>PETUGAS PEMERIKSA</td>
            </tr>
            <tr>
                <td class="text-center fw-bold" colspan="2">
                    <br><br><br><br>
                    ANGGIT JULIANINGSIH PISU, S.Tr.A.K
                </td>
            </tr> -->
        </table>
    </div>
</body>

</html>