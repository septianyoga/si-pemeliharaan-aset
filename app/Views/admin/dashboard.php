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
                                <p class="small text-muted mb-0">Orders</p>
                                <span class="h3 mb-0">1,869</span>
                                <span class="small text-success">+16.5%</span>
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
                                <p class="small text-muted mb-0">Orders</p>
                                <span class="h3 mb-0">1,869</span>
                                <span class="small text-success">+16.5%</span>
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
                                <p class="small text-muted mb-0">Orders</p>
                                <span class="h3 mb-0">1,869</span>
                                <span class="small text-success">+16.5%</span>
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
                                <p class="small text-muted mb-0">Conversion</p>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <span class="h3 mr-2 mb-0"> 86.6% </span>
                                    </div>
                                    <div class="col-md-12 col-lg">
                                        <div class="progress progress-sm mt-2" style="height:3px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
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
                                <p class="small text-muted mb-0">AVG Orders</p>
                                <span class="h3 mb-0">$80</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end section -->
        <div class="row align-items-center my-2">
            <h2 class="h5 page-title mx-3">Aktivitas Aset</h2>
            <div class="col-auto ml-auto">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="reportrange" class="sr-only">Date Ranges</label>
                        <div id="reportrange" class="px-2 py-2 text-muted">
                            <i class="fe fe-calendar fe-16 mx-2"></i>
                            <span class="small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
                        <button type="button" class="btn btn-sm"><span class="fe fe-filter fe-12 text-muted"></span></button>
                    </div>
                </form>
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