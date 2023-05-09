<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/asset/img/logo.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/animated-headline.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/style.css">

    <!-- aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- hijau primary background-color: #08b4ac !important; -->
    <!-- hijau btn #07847e; -->
    <!-- hijau a hover  #07695d-->

    <!-- sweet alerts -->
    <script src="<?= base_url() ?>/asset/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/sweetalert2.min.css">

    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- library slide splidejs -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    <!-- or link to the CDN -->
    <link rel="stylesheet" href="url-to-cdn/splide.min.css">

    <!-- css dadakan -->
    <style>
        .swal2-container .swal2-popup .nice-select {
            display: none;
        }

        @media (min-width: 991px) {
            #login {
                display: none !important;
            }
        }

        .profil {
            position: relative;
            display: inline-block;
            cursor: pointer;
            padding: 20px 0;
        }

        button {
            cursor: pointer;
        }

        #myDropdown {
            display: none;
            position: absolute;
            background-color: #08b4ac;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
            margin-top: 20px;
        }

        #myDropdown li {
            padding: 3px;
        }

        #myDropdown li a:hover {
            color: #07695d;
        }

        /* .profil:hover #myDropdown {
            display: block;
        } */

        .show {
            display: block !important;
        }

        .active a {
            color: #07695d !important;
        }

        @media (max-width: 991px) {
            #dropbtn span {
                /* background-color: red; */
                display: none !important;
            }
        }
    </style>

</head>

<body>

    <?php if (session()->getFlashdata('login')) { ?>
        <script>
            // alerttt();
            // alert('login berhasil')
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
                title: '<?= session()->getFlashdata('login') ?>'
            })
            // Swal.fire('Any fool can use a computer')
        </script>
    <?php } ?>