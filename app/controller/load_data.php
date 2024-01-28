<?php
require_once '../config/database.php';
require_once '../config/general-function.php';
require_once '../config/privacy-function.php';
require_once '../config/allert-function.php';
require_once 'read.php';
require_once 'update.php';
$onday = $_POST['onday'];
?>
<div class="card-header pb-0">
    <h6 class="text-capitalize">
        Data Antrian : <b><?= tanggal_indo($onday, true) ?></b> <br>
        Jumlah Antrian : <b><?= jumlah_antrian($onday) ?> Antrian</b>
    </h6>
</div>
<div class="card-body p-3">
    <div class="container">
        <div class="table-responsive p-0">
            <table class="table table-bordered align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs">No Antrian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs">Nama Pengguna</th>
                        <th class="text-center text-uppercase text-secondary text-xxs">NIK</th>
                        <th class="text-center text-uppercase text-secondary text-xxs">Jenis Kelamin</th>
                        <th class="text-center text-uppercase text-secondary text-xxs">TTL</th>
                        <th class="text-center text-uppercase text-secondary text-xxs">Alamat</th>
                        <th class="text-center text-uppercase text-secondary text-xxs">Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = data_antrian($onday);
                    foreach ($sql as $view) { ?>
                        <tr class="text-center">
                            <td><?= treedigit($view['no_antrian']) ?></td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <h6 class="mb-0 text-sm"><?= $view['nama_lengkap'] ?>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <h6 class="mb-0 text-sm"><?= $view['nik'] ?>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <h6 class="mb-0 text-sm"><?= jenis_kelamin($view['jk']) ?>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <h6 class="mb-0 text-sm"><?= $view['tempat_lahir'] . ', ' . tanggal_indo($view['tgl_lahir']) ?>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <h6 class="mb-0 text-sm"><?= $view['alamat'] ?>
                                    </h6>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <form id="updateForm">
                                    <input type="hidden" id="id_antrian" name="id_antrian" value="<?= $view['id_antrian'] ?>">
                                    <input type="hidden" name="done_antrian" value="hehe">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Selesai</button>
                                </form>

                                <a href="" class="btn btn-sm btn-outline-info"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
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
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
    $(document).ready(function() {
        $("#updateForm").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "app/controller/update_data.php",
                data: formData,
                success: function(response) {
                    $("#ResponsAlert").html(response);
                    loadData();
                    done_antrian();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    gagal();
                }
            });
        });
    });
</script>