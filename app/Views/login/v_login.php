<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?> | SIMI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/img/logo.ico') ?>" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendorr CSS Files -->
    <link href="<?= base_url() ?>assets/vendorr/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendorr/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendorr/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendorr/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendorr/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendorr/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendorr/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- jquery -->
    <script src="<?= base_url() ?>assets/js/jquery-3.6.4.min.js"></script>

    <!-- Sweet Alert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/sweetalert2.min.css">
    <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>

    <style>
        .text-green {
            color: #00bfa6 !important;
        }

        .bg-green {
            background-color: #00bfa6 !important;
            border-color: #00bfa6;
        }
    </style>

</head>

<body>

    <!-- Sweet Alert -->
    <?php if (session()->getFlashdata('pesan')) { ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('pesan') ?>',
                // footer: "<a href='<?= base_url('forget') ?>'>Lupa Password?</a>"
            })
        </script>
    <?php }
    if (session()->getFlashdata('logout')) { ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Logout successfully'
            })
        </script>
    <?php } ?>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <!-- <img src="<?= base_url() ?>assets/img/logo.png" alt=""> -->

                                    <body class="col-12" style="background: url(<?= base_url() ?>assets/img/login.jpg);">
                                        <!-- <span class="d-lg-block">NiceAdmin</span> -->
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h1 class="card-title text-center pb-0 fs-1 text-green" style="font-weight: bolder !important;">LOGIN</h1>
                                        <p class="text-center small text-green">Enter your email & password to login</p>
                                    </div>
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
                                    <?= form_open('cek_login', ['class' => 'row g-3 needs-validation']); ?>
                                    <div class="col-12 pb-3">
                                        <label for="yourUsername" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control" id="yourUsername" value="<?= old('email') ?>" placeholder="Masukan Email" required>
                                        </div>
                                    </div>

                                    <div class="col-12 pb-3">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" value="<?= old('password') ?>" placeholder="Masukan Password" required>
                                    </div>

                                    <div class="col-12 pb-3">
                                        <button class="btn btn-primary w-100 bg-green" type="submit">Login</button>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- Vendorr JS Files -->
    <script src="<?= base_url() ?>assets/vendorr/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/vendorr/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/vendorr/chart.js/chart.umd.js"></script>
    <script src="<?= base_url() ?>assets/vendorr/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>assets/vendorr/quill/quill.min.js"></script>
    <script src="<?= base_url() ?>assets/vendorr/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url() ?>assets/vendorr/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>assets/vendorr/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>


    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 4000);
    </script>
</body>

</html>