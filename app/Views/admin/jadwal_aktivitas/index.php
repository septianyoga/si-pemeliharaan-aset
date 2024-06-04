<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="d-flex justify-content-between">
    <h2 class=" page-title"><?= $title ?></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= base_url('/jaswal_aktivitas') ?>">Jadwal Aktivitas</a></li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
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
                            <th>Action</th>
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
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#edit-<?= $jadwal['id_jadwal'] ?>"><i class="fe fe-edit fe-16"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- simple table -->
</div>

<!-- modal edit -->
<?php foreach ($jadwals as $edit_jadwal) { ?>
    <div class="modal fade" id="edit-<?= $edit_jadwal['id_jadwal'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Edit Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('jadwal_aktivitas/' . $edit_jadwal['id_jadwal']) ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tanggal:</label>
                            <div class="input-group">
                                <input type="text" class="form-control drgpicker" id="date-input1" value="<?= $edit_jadwal['tanggal'] ?>" aria-describedby="button-addon2" name="tanggal">
                                <div class="input-group-append">
                                    <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-2"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_driver" class="col-form-label">Driver:</label>
                            <select name="id_driver" id="id_driver" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <?php foreach ($drivers as $driver) { ?>
                                    <option value="<?= $driver['id_user'] ?>" <?= $edit_jadwal['id_driver'] == $driver['id_user'] ? 'selected' : '' ?>><?= $driver['nama_user'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_aset" class="col-form-label">Aset:</label>
                            <select name="id_aset" id="aset" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <?php foreach ($asets as $aset) { ?>
                                    <option value="<?= $aset['id_aset'] ?>" <?= $edit_jadwal['id_aset'] == $aset['id_aset'] ? 'selected' : '' ?>><?= $aset['nama_aset'] ?> (<?= $aset['asal'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="aktivitas" class="col-form-label">Aktivitas:</label>
                            <textarea class="form-control" name="aktivitas" id="aktivitas" placeholder="Masukan Aktivitas" required="" rows="3"><?= $edit_jadwal['aktivitas'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <option value="Diantar" <?= $edit_jadwal['status'] == 'Diantar' ? 'selected' : '' ?>>Diantar</option>
                                <option value="Sampai" <?= $edit_jadwal['status'] == 'Sampai' ? 'selected' : '' ?>>Sampai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn mb-2 btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?= $this->endSection(); ?>