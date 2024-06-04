<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="d-flex justify-content-between">
    <h2 class="mb-2 page-title"><?= $title ?></h2>
    <div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo"><i class="fe fe-user-plus fe-16"></i> Tambah</button>
    </div>
</div>
<div class="d-flex justify-content-end">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= base_url('/user') ?>"><?= $title ?></a></li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
        </ol>
    </nav>
</div>
<div class="row">
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
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $key => $user) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $user['nama_user'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['role'] ?></td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#edit-<?= $user['id_user'] ?>"><i class="fe fe-edit fe-16"></i></button>
                                    <button onclick="handleDelete('/user/<?= $user['id_user'] ?>')" class="btn btn-danger"><i class="fe fe-trash-2 fe-16"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- simple table -->
</div>

<!-- modal add -->
<div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama User:</label>
                        <input type="text" name="nama_user" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username:</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-form-label">Role:</label>
                        <select name="role" id="role" class="form-control">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="Admin">Admin</option>
                            <option value="Driver">Driver</option>
                            <option value="User PIC">User PIC</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn mb-2 btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit -->
<?php foreach ($users as $user_edit) { ?>
    <div class="modal fade" id="edit-<?= $user_edit['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/edit') ?>" method="post">
                    <input type="hidden" name="id_user" class="form-control" id="id" value="<?= $user_edit['id_user'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama User:</label>
                            <input type="text" name="nama_user" class="form-control" id="nama" value="<?= $user_edit['nama_user'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= $user_edit['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?= $user_edit['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <small>*Kosongkan jika tidak diganti.</small>
                        </div>
                        <div class="form-group">
                            <label for="role" class="col-form-label">Role:</label>
                            <select name="role" id="role" class="form-control">
                                <option value="Admin" <?= $user_edit['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="Driver" <?= $user_edit['role'] == 'Driver' ? 'selected' : '' ?>>Driver</option>
                                <option value="User PIC" <?= $user_edit['role'] == 'User PIC' ? 'selected' : '' ?>>User PIC</option>
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