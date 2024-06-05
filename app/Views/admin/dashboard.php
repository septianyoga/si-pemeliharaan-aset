<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Welcome!</h2>
    </div>
    <div class="col-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= base_url('/dashboard') ?>"><?= $title ?></a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
            </ol>
        </nav>
    </div>
    <?php if (session()->get('login')) { ?>
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <span class="fe fe-check-circle fe-16 mr-2"></span> Selamat datang <?= session()->get('nama') ?>, anda login sebagai <?= session()->get('role') ?>!
            </div>
        </div>
    <?php } ?>
</div>
<div class="row justify-content-center">
    <div class="col-12">
        <h2 class="h5 page-title">Total Aset</h2>
        <div class="row">
            <div class="col-md-6 col-xl mb-4">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-settings text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small mb-0">PT LEN</p>
                                <span class="h3 mb-0"><?= $aset['len'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl mb-4">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-settings text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small mb-0">PT DAHANA</p>
                                <span class="h3 mb-0"><?= $aset['dahana'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl mb-4">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-settings text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small mb-0">PT PINDAD</p>
                                <span class="h3 mb-0"><?= $aset['pindad'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl mb-4">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-settings text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col">
                                <p class="small mb-0">PT PAL</p>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <span class="h3 mr-2 mb-0"><?= $aset['pal'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl mb-4">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-settings text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col">
                                <p class="small mb-0">PT DI</p>
                                <span class="h3 mb-0"><?= $aset['di'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end section -->
        <div class="row align-items-center my-2">
            <h2 class="h5 page-title mx-3">Aktivitas Aset</h2>
            <div class="col-auto ml-auto">
                <span>2 Minggu Terakhir</span>
            </div>
        </div>
        <!-- charts-->
        <div class="row my-4">
            <div class="col-md-12">
                <div class="chart-box">
                    <div id="columnChartCustom"></div>
                </div>
            </div> <!-- .col -->
        </div> <!-- end section -->
        <!-- info small box -->
    </div>
</div>


<?= $this->endSection(); ?>