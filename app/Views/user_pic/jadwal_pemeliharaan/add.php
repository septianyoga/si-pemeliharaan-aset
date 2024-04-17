<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="d-flex justify-content-between">
    <h2 class="mb-2 page-title"><?= $title ?></h2>
</div>
<div class="row my-4">
    <!-- Small table -->
    <div class="col-md-12">
        <div class="card shadow">
            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $key => $value) { ?>
                            <li><?= esc($value); ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php  } ?>
            <div class="card-body">
                <form action="<?= base_url('/jadwal_pemeliharaan') ?>" method="post">
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan deskripsi" required="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="date-input1">Pilih Tanggal dan Waktu</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control drgpicker" id="date-input1" value="<?= date('Y-m-d H:i:s') ?>" aria-describedby="button-addon2" name="tanggal">
                                        <div class="input-group-append">
                                            <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-2"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="aset" class="col-sm-3 col-form-label">Aset</label>
                        <div class="col-sm-9">
                            <select name="id_aset" id="aset" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <?php foreach ($asets as $aset) { ?>
                                    <option value="<?= $aset['id_aset'] ?>"><?= $aset['nama_aset'] ?> (<?= $aset['asal'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-2 float-right ">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- simple table -->
</div>


<?= $this->endSection(); ?>