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
                <!-- <form action="<?= base_url('laporan_pemeliharaan') ?>" method="get">
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="mb-2"><strong>Pilih Tanggal</strong></p>
                            <div class="form-group">
                                <label for="date-input1">Rentang Tanggal</label>
                                <div class="d-flex">
                                    <input type="text" name="tanggal" class="form-control datetimes" />
                                    <button type="submit" class="btn btn-primary ml-2">Tampilkan</button>
                                    <?php if (isset($_GET['tanggal'])) { ?>
                                        <a href="<?= base_url('/cetak_pemeliharaan?tanggal=' . $_GET['tanggal']) ?>" class="btn btn-success mx-2">Cetak</a>
                                        <a href="<?= base_url('/laporan_pemeliharaan') ?>" class="btn btn-secondary">Reset</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> -->
                <!-- table -->
                <table class="table datatables" id="dataTable-1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Aset</th>
                            <th>Jenis Aset</th>
                            <th>Asal</th>
                            <th>Kondisi</th>
                            <th>History Maps</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($asets as $key => $monitor) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $monitor['nama_aset'] ?></td>
                                <td><?= $monitor['jenis_aset'] ?></td>
                                <td><?= $monitor['asal'] ?></td>
                                <td><?= $monitor['kondisi'] ?></td>
                                <td>
                                    <ul>
                                        <?php foreach ($maps as $map) { ?>
                                            <?php if ($map['id_aset'] == $monitor['id_aset']) { ?>
                                                <li><?= $map['latitude'] ?>,<?= $map['longitude'] ?></li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="<?= base_url('cetak_monitoring') ?>" class="btn btn-success float-right my-2">Cetak</a>
            </div>
        </div>
    </div> <!-- simple table -->
</div>

<!-- modal edit -->

<?= $this->endSection(); ?>