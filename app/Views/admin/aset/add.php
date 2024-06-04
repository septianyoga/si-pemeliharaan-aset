<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="d-flex justify-content-between">
    <h2 class="page-title"><?= $title ?></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Aset</li>
            <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= base_url('/aset/add') ?>"><?= $title ?></a></li>
        </ol>
    </nav>
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
                <form action="<?= base_url('/aset') ?>" method="post">
                    <div class="form-group row">
                        <label for="nama_aset" class="col-sm-3 col-form-label">Nama Aset</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_aset" id="nama_aset" placeholder="Masukan Nama Aset" value="<?= old('nama_aset') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_aset" class="col-sm-3 col-form-label">Jenis Aset</label>
                        <div class="col-sm-9">
                            <select name="jenis_aset" id="jenis_aset" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <option value="Tetap" <?= old('jenis_aset') == 'Tetap' ? 'selected' : '' ?>>Tetap</option>
                                <option value="Bergerak" <?= old('jenis_aset') == 'Bergerak' ? 'selected' : '' ?>>Bergerak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="asal" class="col-sm-3 col-form-label">Asal Aset</label>
                        <div class="col-sm-9">
                            <select name="asal" id="asal" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <option value="PT LEN" <?= old('asal') == 'PT LEN' || (isset($_GET['pt']) ? $_GET['pt'] : '') == 'PT LEN' ? 'selected' : '' ?>>PT LEN</option>
                                <option value="PT DAHANA" <?= old('asal') == 'PT DAHANA' || (isset($_GET['pt']) ? $_GET['pt'] : '') == 'PT DAHANA' ? 'selected' : '' ?>>PT DAHANA</option>
                                <option value="PT PAL" <?= old('asal') == 'PT PAL' || (isset($_GET['pt']) ? $_GET['pt'] : '') == 'PT PAL' ? 'selected' : '' ?>>PT PAL</option>
                                <option value="PT DI" <?= old('asal') == 'PT DI' || (isset($_GET['pt']) ? $_GET['pt'] : '') == 'PT DI' ? 'selected' : '' ?>>PT DI</option>
                                <option value="PT PINDAD" <?= old('asal') == 'PT PINDAD' || (isset($_GET['pt']) ? $_GET['pt'] : '') == 'PT PINDAD' ? 'selected' : '' ?>>PT PINDAD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kondisi" class="col-sm-3 col-form-label">Kondisi</label>
                        <div class="col-sm-9">
                            <select name="kondisi" id="kondisi" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <option value="Baik" <?= old('kondisi') == 'Baik' ? 'selected' : '' ?>>Baik</option>
                                <option value="Rusak" <?= old('kondisi') == 'Rusak' ? 'selected' : '' ?>>Rusak</option>
                                <option value="Dalam Perawatan" <?= old('kondisi') == 'Dalam Perawatan' ? 'selected' : '' ?>>Dalam Perawatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor_plat" class="col-sm-3 col-form-label">Nomor Plat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nomor_plat" id="nomor_plat" placeholder="Masukan Nomor Plat" value="<?= old('nomor_plat') ?>">
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