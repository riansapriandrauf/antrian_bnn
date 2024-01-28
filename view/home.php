<?php
if ($_SESSION['level'] == 1) { ?>

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pengguna</p>
                                <h5 class="font-weight-bolder"><?= jumlah_pengguna() ?></h5>
                                <p class="mb-0">
                                    Badan Narkotika Nasional - Kolaka
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Antrian hari ini</p>
                                <h5 class="font-weight-bolder"><?= jumlah_antrian(date('Y-m-d')) ?></h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder"><?= tanggal_indo(date('Y-m-d'), true); ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Antrian Besok</p>
                                <h5 class="font-weight-bolder">
                                    <?= jumlah_antrian(date('Y-m-d', strtotime('+1 day'))) ?>
                                </h5>
                                <p class="mb-0">
                                    <span class="text-danger text-sm font-weight-bolder"><?= tanggal_indo(date('Y-m-d', strtotime('+1 day')), true) ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Nomor Antrian</p>
                                <div id="nomor-antrian"></div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }
?>
<div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">BNN - Kolaka</h6>
            </div>
            <div class="card-body p-3">
                <div class="container-fluid">
                    <div class="text-center">
                        <h3>Selamat Datang Di Sistem Informasi</h3>
                        <h3>Data Antrian Badan Narkotika Nasional</h3>
                        <h3>Kabupaten Kolaka</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SESSION['level'] == 0) { ?>

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <button type="button" data-bs-target="#booking" data-bs-toggle="modal" class="btn btn-sm btn-outline-success"><i class="fa fa-plus"></i> Boking Antrian</button>
                    <h6 class="text-capitalize">Data Antrian Ku</h6>
                </div>
                <div class="card-body p-3">
                    <div class="container-fluid">
                        <table id="tabelku" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal Antrian</th>
                                    <th class="text-center">No Antrian</th>
                                    <th class="text-center">Hasil Test</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = data_antrianku($_SESSION['id_user']);
                                foreach ($sql as $data) { ?>

                                    <tr class="text-center fw-bold">
                                        <td style="width: 1px;"><?= $no ?></td>
                                        <td><?= tanggal_indo($data['tgl_antrian']) ?></td>
                                        <td><?= treedigit($data['no_antrian']) ?></td>
                                        <td>
                                            <?php
                                            $id_antrian = $data['id_antrian'];
                                            $cek = mysqli_query($koneksi, "SELECT * FROM tb_hasiltest WHERE id_antrian='$id_antrian'");
                                            if (mysqli_num_rows($cek) > 0) { ?>
                                                <a target="_blank" href="pdf/skhpn/<?=encrypt($data['id_antrian'])?>" class="btn btn-sm btn-outline-success"><i class="fa fa-eye"></i> Hasil</a>
                                            <?php } else { ?>
                                                Belum Keluar
                                            <?php }
                                            ?>
                                        </td>
                                    </tr>

                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="booking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Form Boking Antrian</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tgl_antrian">Pilih tanggal</label>
                            <input type="date" class="form-control" id="tgl_antrian" oninput="disableWeekend()" name="tgl_antrian" required>
                        </div>

                        <div class="form-group">
                            <label for="no_antrian">Nomor Antrian</label>
                            <input type="text" class="form-control" id="no_antrian" placeholder="Pilih tanggal" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="boking_antrian" class="btn btn-sm btn-outline-success">Simpan</button>
                        <button type="button" class="btn btn-sm btn-outline-secondari" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php }
?>