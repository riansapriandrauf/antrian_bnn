<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="text-capitalize">Daftar Pengguna</h6>
            </div>
            <div class="card-body p-3">
                <div class="container">
                    <div class="table-responsive p-0">
                        <table class="table table-bordered align-items-center mb-0" id="tabelku">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs">No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs">Nama Pengguna</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs">NIK</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs">Jenis Kelamin</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs">TTL</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs">Alamat</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs">Hasil Test</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = data_user();
                                $no = 1;
                                foreach ($sql as $data) { ?>
                                    <tr class="text-center">
                                        <td><?= $no ?></td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <h6 class="mb-0 text-sm"><?= $data['nama_lengkap'] ?>
                                                </h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <h6 class="mb-0 text-sm"><?= $data['nik'] ?>
                                                </h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <h6 class="mb-0 text-sm"><?= jenis_kelamin($data['jk']) ?>
                                                </h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <h6 class="mb-0 text-sm"><?= $data['tempat_lahir'] . ', ' . tanggal_indo($data['tgl_lahir']) ?>
                                                </h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <h6 class="mb-0 text-sm"><?= $data['alamat'] ?>
                                                </h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Lihat Tanggal
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        $id_datadiri = $data['id_datadiri'];
                                                        $cek = mysqli_query($koneksi, "SELECT * FROM `tb_hasiltest` WHERE id_datadiri='$id_datadiri' ORDER BY id_hasiltes ASC")or die(mysqli_error($koneksi));
                                                        foreach ($cek as $row) { ?>
                                                            <li><a target="_blank" class="dropdown-item bg-primary text-white" href="pdf/skhpn/<?=encrypt($row['id_antrian'])?>"><?= date('d/m/Y', strtotime($row['tgl'])) ?></a></li>
                                                            <?php }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
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
</div>