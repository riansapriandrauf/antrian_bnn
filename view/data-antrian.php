<div class="row">
    <div class="col-12">
        <form action="" method="POST">
            <div class="form-group">
                <label for="" class="text-white">Pilih Tanggal</label>
                <input type="date" class="form-control" id="tgl_antrian" name="tgl_antrian" onchange="loadData()" value="<?=date('Y-m-d')?>">
            </div>
        </form>
        <div class="card mb-4" id="dataku"></div>
    </div>
</div>