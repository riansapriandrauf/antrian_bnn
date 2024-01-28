<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="text-capitalize"></h6>
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
                                    <th class="text-center text-uppercase text-secondary text-xxs">HASIL TEST</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_antrian INNER JOIN tb_datadiri ON tb_datadiri.id_datadiri = tb_antrian.id_datadiri WHERE tb_antrian.status_antrian ='1' order by tb_antrian.id_antrian desc") or die(mysqli_error($koneksi));
                                $no = 1;
                                foreach ($sql as $data) {
                                    $id_antrian = $data['id_antrian'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM tb_hasiltest WHERE id_antrian='$id_antrian'");
                                    $row = mysqli_fetch_array($query);
                                    ?>
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
                                            <?php
                                            $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_hasiltest WHERE id_antrian='$id_antrian'") or die(mysqli_error($koneksi));

                                            if (mysqli_num_rows($sql2) == 0) { ?>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#inputhasiltest" class="btn btn-sm btn-outline-info">Input</button>
                                            <?php } else { ?>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#inputhasiltest" class="btn btn-sm btn-outline-success"><i class="fa fa-eye"></i> Lihat</button>
                                                <a target="_blank" href="pdf/skhpn/<?=encrypt($data['id_antrian'])?>" class="btn btn-sm btn-outline-warning"><i class="fa fa-print"></i> Cetak</a>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <!-- <div class="modal fade" id="inputhasiltest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="" method="POST">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Input Hasil Test <?= strtoupper($data['nama_lengkap']) ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id_antrian" value="<?=$data['id_antrian']?>">
                                                            <input type="hidden" name="id_datadiri" value="<?=$data['id_datadiri']?>">

                                                            <label for="tgl_antrian">Amphetamenie</label>
                                                            <select name="amphetamenie" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option value="1">Positif</option>
                                                                <option value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_antrian">methamphetamine</label>
                                                            <select name="methamphetamine" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option value="1">Positif</option>
                                                                <option value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="morphine">morphine</label>
                                                            <select name="morphine" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option value="1">Positif</option>
                                                                <option value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="thc">thc</label>
                                                            <select name="thc" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option value="1">Positif</option>
                                                                <option value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cocaine">cocaine</label>
                                                            <select name="cocaine" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option value="1">Positif</option>
                                                                <option value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="benzodiazepine">benzodiazepine</label>
                                                            <select name="benzodiazepine" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option value="1">Positif</option>
                                                                <option value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Tanda-Tanda Fisik</label>
                                                            <select name="fisik" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option value="1">Ditemukan</option>
                                                                <option value="2">Tidak Ditemukan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="sv_hasiltest" class="btn btn-sm btn-outline-success">Simpan</button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondari" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="modal fade" id="inputhasiltest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="" method="POST">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Input Hasil Test <?= strtoupper($data['nama_lengkap']) ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id_antrian" value="<?=$data['id_antrian']?>">
                                                            <input type="hidden" name="id_datadiri" value="<?=$data['id_datadiri']?>">

                                                            <label for="tgl_antrian">Amphetamenie</label>
                                                            <select name="amphetamenie" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option <?=selected_status($row['amphetamenie'],1)?> value="1">Positif</option>
                                                                <option <?=selected_status($row['amphetamenie'],2)?> value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_antrian">methamphetamine</label>
                                                            <select name="methamphetamine" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option <?=selected_status($row['methamphetamine'],1)?> value="1">Positif</option>
                                                                <option <?=selected_status($row['methamphetamine'],2)?> value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="morphine">morphine</label>
                                                            <select name="morphine" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option <?=selected_status($row['morphine'],1)?> value="1">Positif</option>
                                                                <option <?=selected_status($row['morphine'],2)?> value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="thc">thc</label>
                                                            <select name="thc" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option <?=selected_status($row['thc'],1)?> value="1">Positif</option>
                                                                <option <?=selected_status($row['thc'],2)?> value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cocaine">cocaine</label>
                                                            <select name="cocaine" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option <?=selected_status($row['cocaine'],1)?> value="1">Positif</option>
                                                                <option <?=selected_status($row['cocaine'],2)?> value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="benzodiazepine">benzodiazepine</label>
                                                            <select name="benzodiazepine" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option <?=selected_status($row['benzodiazepine'],1)?> value="1">Positif</option>
                                                                <option <?=selected_status($row['benzodiazepine'],2)?> value="2">Negatif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Tanda-Tanda Fisik</label>
                                                            <select name="fisik" class="form-control" required>
                                                                <option value="">Pilih Status</option>
                                                                <option <?=selected_status($row['fisik'],1)?> value="1">Ditemukan</option>
                                                                <option <?=selected_status($row['fisik'],2)?> value="2">Tidak Ditemukan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="sv_hasiltest" class="btn btn-sm btn-outline-success">Simpan</button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondari" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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