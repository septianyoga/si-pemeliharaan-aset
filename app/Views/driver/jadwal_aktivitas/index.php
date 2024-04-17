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
                <!-- table -->
                <table class="table datatables" id="dataTable-1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Nama Driver</th>
                            <th>Nama Aset</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwals as $key => $jadwal) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($jadwal['tanggal'])) ?></td>
                                <td><?= $jadwal['nama_user'] ?></td>
                                <td><?= $jadwal['nama_aset'] ?></td>
                                <td><?= $jadwal['aktivitas'] ?></td>
                                <td><span class="badge badge-pill badge-<?= $jadwal['status'] == 'Diantar' ? 'warning' : 'success' ?>"><?= $jadwal['status'] ?></span></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- simple table -->
</div>

<?= $this->endSection(); ?>