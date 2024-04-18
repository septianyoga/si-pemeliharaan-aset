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
                <form action="<?= base_url('laporan_pemeliharaan') ?>" method="get">
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
                </form>
                <!-- table -->
                <table class="table datatables" id="dataTable-1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Nama Aset</th>
                            <th>Jenis Aset</th>
                            <th>Asal</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemeliharaans as $key => $jadwal) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $jadwal['deskripsi'] ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($jadwal['tanggal'])) ?></td>
                                <td><?= $jadwal['nama_aset'] ?></td>
                                <td><?= $jadwal['jenis_aset'] ?></td>
                                <td><?= $jadwal['asal'] ?></td>
                                <td><?= $jadwal['kondisi'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- simple table -->
</div>

<!-- modal edit -->

<?= $this->endSection(); ?>