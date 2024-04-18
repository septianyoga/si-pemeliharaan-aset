<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<h2 class="mb-2 page-title"><?= $title ?></h2>
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
                            <th>Nama Aset</th>
                            <th>Jenis Aset</th>
                            <th>Kondisi</th>
                            <th>Asal</th>
                            <th>Nomor Plat</th>
                            <th>Pemeliharaan</th>
                            <th>Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($asets as $key => $aset) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $aset['nama_aset'] ?></td>
                                <td><?= $aset['jenis_aset'] ?></td>
                                <td><span class="badge badge-pill badge-<?= $aset['kondisi'] == 'Baik' ? 'success' : ($aset['kondisi'] == 'Rusak' ? 'danger' : 'warning') ?>"><?= $aset['kondisi'] ?></span></td>
                                <td><?= $aset['asal'] ?></td>
                                <td><?= $aset['nomor_plat'] ?></td>
                                <td>
                                    <ul>
                                        <?php foreach ($pemeliharaans as $p) { ?>
                                            <?php if ($p['id_aset'] == $aset['id_aset']) { ?>
                                                <li><?= $p['deskripsi'] ?></li>
                                                <span class="">Tanggal : <?= date('d-m-Y H:i:s', strtotime($p['tanggal'])) ?></span>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <?php foreach ($aktivitass as $aktivitas) { ?>
                                            <?php if ($aktivitas['id_aset'] == $aset['id_aset']) { ?>
                                                <li><?= $aktivitas['aktivitas'] ?></li>
                                                <span class="">Tanggal : <?= date('d-m-Y H:i:s', strtotime($aktivitas['tanggal'])) ?></span>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
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
<?php foreach ($asets as $edit_aset) { ?>
    <div class="modal fade" id="edit-<?= $edit_aset['id_aset'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('aset/edit') ?>" method="post">
                    <input type="hidden" name="id_aset" class="form-control" id="id" value="<?= $edit_aset['id_aset'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_aset" class="col-form-label">Nama Aset:</label>
                            <input type="text" name="nama_aset" class="form-control" id="nama_aset" value="<?= $edit_aset['nama_aset'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis_aset" class="col-form-label">Jenis Aset:</label>
                            <select name="jenis_aset" id="jenis_aset" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <option value="Tetap" <?= $edit_aset['jenis_aset'] == 'Tetap' ? 'selected' : '' ?>>Tetap</option>
                                <option value="Bergerak" <?= $edit_aset['jenis_aset'] == 'Bergerak' ? 'selected' : '' ?>>Bergerak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kondisi" class="col-form-label">Kondisi:</label>
                            <select name="kondisi" id="kondisi" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <option value="Baik" <?= $edit_aset['kondisi'] == 'Baik' ? 'selected' : '' ?>>Baik</option>
                                <option value="Rusak" <?= $edit_aset['kondisi'] == 'Rusak' ? 'selected' : '' ?>>Rusak</option>
                                <option value="Dalam Perawatan" <?= $edit_aset['kondisi'] == 'Dalam Perawatan' ? 'selected' : '' ?>>Dalam Perawatan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nomor_plat" class="col-form-label">Nomor Plat:</label>
                            <input type="text" name="nomor_plat" class="form-control" id="nomor_plat" value="<?= $edit_aset['nomor_plat'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="asal" class="col-form-label">Asal:</label>
                            <select name="asal" id="asal" class="form-control">
                                <option value="" hidden>--Pilih--</option>
                                <option value="PT LEN" <?= $edit_aset['asal'] == 'PT LEN'  ? 'selected' : '' ?>>PT LEN</option>
                                <option value="PT DAHANA" <?= $edit_aset['asal'] == 'PT DAHANA'  ? 'selected' : '' ?>>PT DAHANA</option>
                                <option value="PT PAL" <?= $edit_aset['asal'] == 'PT PAL'  ? 'selected' : '' ?>>PT PAL</option>
                                <option value="PT DI" <?= $edit_aset['asal'] == 'PT DI'  ? 'selected' : '' ?>>PT DI</option>
                                <option value="PT PINDAD" <?= $edit_aset['asal'] == 'PT PINDAD'  ? 'selected' : '' ?>>PT PINDAD</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn mb-2 btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<?= $this->endSection(); ?>