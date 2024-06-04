<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?= $title ?></title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?= base_url('admin/css/simplebar.css') ?>">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?= base_url('admin/css/feather.css') ?>">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?= base_url('admin/css/daterangepicker.css') ?>">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?= base_url('admin/css/app-light.css') ?>" id="lightTheme">
    <link rel="stylesheet" href="<?= base_url('admin/css/app-dark.css') ?>" id="darkTheme" disabled>
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default@4/default.css">
    <style>
        #togglePassword:hover {
            cursor: pointer;
        }
    </style>
</head>

<body class="light ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100 m-0 p-0">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="<?= base_url('/login') ?>" method="post">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                    <img src="<?= base_url('/assets/logo.png') ?>" alt="Logo SIAP" class="w-50">
                </a>
                <h1 class="h6 mb-3">Sign in</h1>
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
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Username</label>
                    <input type="text" id="inputEmail" name="username" class="form-control form-control-lg" placeholder="Username" autofocus="">
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text"><span id="togglePassword" class="fe fe-eye fe-24"></span></span>
                    </div>
                </div>
                <!-- <div class="checkbox mb-3">
                    <a href="" class="text-decoration-none ">Lupa Password?</a>
                </div> -->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <div class="checkbox mt-3">
                    <a class="text-decoration-none " href="<?= base_url('registrasi') ?>">Belum mempunyai akun? Registrasi! </a>
                </div>
                <p class="mt-5 mb-3 text-muted">Copyright © <?= date('Y') ?> SIAP</p>
            </form>
        </div>
    </div>
    <script src="<?= base_url('admin/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('admin/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('admin/js/moment.min.js') ?>"></script>
    <script src="<?= base_url('admin/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('admin/js/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('admin/js/daterangepicker.js') ?>"></script>
    <script src="<?= base_url('admin/js/jquery.stickOnScroll.js') ?>"></script>
    <script src="<?= base_url('admin/js/tinycolor-min.js') ?>"></script>
    <script src="<?= base_url('admin/js/config.js') ?>"></script>
    <script src="<?= base_url('admin/js/apps.js') ?>"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <!-- sweet alert js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
    <?php if (session()->get('pesan')) { ?>
        <script>
            Swal.fire({
                title: "Gagal",
                text: "Username atau Password Salah!",
                icon: "warning"
            });
        </script>
    <?php } ?>
    <?php if (session()->get('success')) { ?>
        <script>
            Swal.fire({
                title: "Sukses",
                text: "<?= session()->get('success') ?>",
                icon: "success"
            });
        </script>
    <?php } ?>
    <script>
        $(document).ready(function() {
            $('#togglePassword').on('click', function() {
                var passwordField = $('#inputPassword');
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).removeClass('fe-eye').addClass('fe-eye-off');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).removeClass('fe-eye-off').addClass('fe-eye');
                }
            });
        });
    </script>
</body>

</html>
</body>

</html>