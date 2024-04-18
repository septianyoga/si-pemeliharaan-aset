<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="form-inline mr-auto searchform text-muted">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
    </form>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="<?= base_url('assets/user.png') ?>" alt="..." class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?= base_url('/profil') ?>">Profile</a>
                <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
            </div>
        </li>
    </ul>
</nav>


<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="<?= base_url('dashboard') ?>" class=" nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Pages</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <?php if (session()->get('role') == 'Admin') { ?>
                <li class="nav-item w-100 <?= $title == 'Kelola User' ? 'active' : '' ?> ">
                    <a class="nav-link" href="<?= base_url('user') ?>">
                        <i class="fe fe-user fe-16"></i>
                        <span class="ml-3 item-text">User</span>
                    </a>
                </li>
                <li class="nav-item dropdown <?= $title == 'Tambah Aset' || $title == 'Aset PT LEN' || $title == 'Aset PT DAHANA' || $title == 'Aset PT PAL' || $title == 'Aset PT DI' || $title == 'Aset PT PINDAD' ? 'active' : '' ?>">
                    <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-settings fe-16"></i>
                        <span class="ml-3 item-text">Aset</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100 <?= $title == 'Tambah Aset' || $title == 'Aset PT LEN' || $title == 'Aset PT DAHANA' || $title == 'Aset PT PAL' || $title == 'Aset PT DI' || $title == 'Aset PT PINDAD' ? 'show' : '' ?>" id="fileman">
                        <a class="nav-link pl-3 <?= $title == 'Tambah Aset' ? 'active' : '' ?> " href="<?= base_url('/aset/add') ?>"><span class="ml-1">Tambah Aset</span></a>
                        <a class="nav-link pl-3 <?= $title == 'Aset PT LEN' ? 'active' : '' ?>" href="<?= base_url('/aset?pt=PT LEN') ?>"><span class="ml-1">PT LEN</span></a>
                        <a class="nav-link pl-3 <?= $title == 'Aset PT DAHANA' ? 'active' : '' ?>" href="<?= base_url('/aset?pt=PT DAHANA') ?>"><span class="ml-1">PT DAHANA</span></a>
                        <a class="nav-link pl-3 <?= $title == 'Aset PT PAL' ? 'active' : '' ?>" href="<?= base_url('/aset?pt=PT PAL') ?>"><span class="ml-1">PT PAL</span></a>
                        <a class="nav-link pl-3 <?= $title == 'Aset PT DI' ? 'active' : '' ?>" href="<?= base_url('/aset?pt=PT DI') ?>"><span class="ml-1">PT DI</span></a>
                        <a class="nav-link pl-3 <?= $title == 'Aset PT PINDAD' ? 'active' : '' ?>" href="<?= base_url('/aset?pt=PT PINDAD') ?>"><span class="ml-1">PT PINDAD</span></a>
                    </ul>
                </li>
                <li class="nav-item w-100 <?= $title == 'Lihat Jadwal Aktivitas' ? 'active' : '' ?> ">
                    <a class="nav-link" href="<?= base_url('jadwal_aktivitas') ?>">
                        <i class="fe fe-activity fe-16"></i>
                        <span class="ml-3 item-text">Lihat Jadwal Aktivitas</span>
                    </a>
                </li>
                <li class="nav-item w-100 <?= $title == 'Buat Jadwal Aktivitas Terkini' ? 'active' : '' ?> ">
                    <a class="nav-link" href="<?= base_url('jadwal_aktivitas/add') ?>">
                        <i class="fe fe-file-plus fe-16"></i>
                        <span class="ml-3 item-text">Buat Jadwal Aktivitas</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (session()->get('role') == 'Driver') { ?>
                <li class="nav-item w-100 <?= $title == 'Lihat Jadwal Aktivitas Terkini' ? 'active' : '' ?> ">
                    <a class="nav-link" href="<?= base_url('lihat_jadwal') ?>">
                        <i class="fe fe-activity fe-16"></i>
                        <span class="ml-3 item-text">Lihat Jadwal Aktivitas</span>
                    </a>
                </li>
                <li class="nav-item w-100 <?= $title == 'Riwayat Aktivitas' ? 'active' : '' ?> ">
                    <a class="nav-link" href="<?= base_url('riwayat_aktivitas') ?>">
                        <i class="fe fe-clock fe-16"></i>
                        <span class="ml-3 item-text">Riwayat Aktivitas</span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item w-100 <?= $title == 'Lihat Status Kondisi Aset' ? 'active' : '' ?> ">
                <a class="nav-link" href="<?= base_url('lihat_kondisi_aset') ?>">
                    <i class="fe fe-eye fe-16"></i>
                    <span class="ml-3 item-text">Lihat Status Kondisi Aset</span>
                </a>
            </li>
            <li class="nav-item w-100 <?= $title == 'Lihat Jadwal Pemeliharaan Aset' ? 'active' : '' ?> ">
                <a class="nav-link" href="<?= base_url('jadwal_pemeliharaan') ?>">
                    <i class="fe fe-calendar fe-16"></i>
                    <span class="ml-3 item-text">Lihat Jadwal Pemeliharaan</span>
                </a>
            </li>
            <?php if (session()->get('role') == 'User PIC') { ?>
                <li class="nav-item w-100 <?= $title == 'Buat Jadwal Pemeliharaan Aset' ? 'active' : '' ?> ">
                    <a class="nav-link" href="<?= base_url('jadwal_pemeliharaan/add') ?>">
                        <i class="fe fe-file-plus fe-16"></i>
                        <span class="ml-3 item-text">Buat Jadwal Pemeliharaan</span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item dropdown <?= $title == 'Laporan Pemeliharaan Aset' || $title == 'Laporan Monitoring Aset' ? 'active' : '' ?>">
                <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-file-text fe-16"></i>
                    <span class="ml-3 item-text">Laporan</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100 <?= $title == 'Laporan Pemeliharaan Aset' || $title == 'Laporan Monitoring Aset' ? 'show' : '' ?>" id="fileman">
                    <a class="nav-link pl-3 <?= $title == 'Laporan Pemeliharaan Aset' ? 'active' : '' ?> " href="<?= base_url('/laporan_pemeliharaan') ?>"><span class="ml-1">Pemeliharaan Aset</span></a>
                    <a class="nav-link pl-3 <?= $title == 'Laporan Monitoring Aset' ? 'active' : '' ?>" href="<?= base_url('/laporan_monitoring') ?>"><span class="ml-1">Monitoring Aset</span></a>
                </ul>
            </li>
        </ul>
    </nav>
</aside>