<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="d-flex justify-content-between">
    <h2 class="mb-2 page-title"><?= $title ?></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Aset</li>
            <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= base_url('/jadwal_pemeliharaan') ?>">Jadwal Pemeliharaan</a></li>
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
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Nama Aset</th>
                            <?php if (session()->get('role') == 'User PIC') { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemeliharaans as $key => $jadwal) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $jadwal['deskripsi'] ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($jadwal['tanggal'])) ?></td>
                                <td><?= $jadwal['nama_aset'] ?></td>
                                <?php if (session()->get('role') == 'User PIC') { ?>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#edit-<?= $jadwal['id_pemeliharaan'] ?>"><i class="fe fe-edit fe-16"></i></button>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- simple table -->
</div>

<!-- modal edit -->
<?php foreach ($pemeliharaans as $edit_jadwal) { ?>
    <div class="modal fade" id="edit-<?= $edit_jadwal['id_pemeliharaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Edit Jadwal Pemeliharaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('jadwal_pemeliharaan/' . $edit_jadwal['id_pemeliharaan']) ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan Aktivitas" required="" rows="3"><?= $edit_jadwal['deskripsi'] ?></textarea>
                        </div>
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
                            <label for="id_aset" class="col-form-label">Aset:</label>
                            <select name="id_aset" id="aset" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <?php foreach ($asets as $aset) { ?>
                                    <option value="<?= $aset['id_aset'] ?>" <?= $edit_jadwal['id_aset'] == $aset['id_aset'] ? 'selected' : '' ?>><?= $aset['nama_aset'] ?> (<?= $aset['asal'] ?>)</option>
                                <?php } ?>
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