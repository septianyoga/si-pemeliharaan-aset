<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<h2 class="h3 mb-4 page-title">Profil</h2>
<div class="my-4">
    <form action="<?= base_url('/profil') ?>" method="post">
        <div class="row mt-5 align-items-center">
            <div class="col-md-3 text-center mb-5">
                <div class="avatar avatar-xl">
                    <i class="fe fe-user fe-16 h1"></i>
                </div>
            </div>
            <div class="col">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h4 class="mb-1"><?= $user['nama_user'] ?></h4>
                        <p class="small mb-3"><span class="badge badge-dark"><?= $user['role'] ?></span></p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-7">
                        <p class="text-muted"> Akun dibuat pada tanggal : <?= date('d-m-Y H:i:s', strtotime($user['created_at'])) ?>. </p>
                        <p class="text-muted"> Terakhir update pada tanggal : <?= $user['updated_at'] == null ? 'belum pernah update akun' : date('d-m-Y H:i:s', strtotime($user['updated_at'])) ?>. </p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
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
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_user">Nama</label>
                <input type="text" id="nama_user" name="nama_user" class="form-control" placeholder="Masukan Nama User" value="<?= $user['nama_user'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Masukan Username">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $user['email'] ?>" placeholder="Masukan Email">
        </div>
        <hr class="my-4">
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pwlama">Password Lama</label>
                    <input type="password" name="password_lama" class="form-control" id="pwlama" placeholder="Masukan Password Lama..">
                </div>
                <div class="form-group">
                    <label for="pwbaru">Password Baru</label>
                    <input type="password" name="password_baru" class="form-control" id="pwbaru" placeholder="Masukan Password Baru..">
                </div>
                <div class="form-group">
                    <label for="pwkonf">Password Konfirmasi</label>
                    <input type="password" name="passwordkonf" class="form-control" id="pwkonf" placeholder="Masukan Password Konfirmasi..">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div> <!-- /.card-body -->
<?= $this->endSection(); ?>