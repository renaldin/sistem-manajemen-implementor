<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?> | SIMI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('NiceAdmin') ?>/assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('NiceAdmin') ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendorr CSS Files -->
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendorr/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendorr/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendorr/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendorr/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendorr/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendorr/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendorr/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('NiceAdmin') ?>/assets/css/style.css" rel="stylesheet">

    <!-- jquery -->
    <script src="<?= base_url() ?>/assets/js/jquery-3.6.4.min.js"></script>

    <!-- Sweet Alert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/sweetalert2.min.css">
    <script src="<?= base_url() ?>/assets/js/sweetalert2.all.min.js"></script>

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- Sweet Alert -->
    <?php if (session()->getFlashdata('pesan')) { ?>
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
                title: '<?= session()->getFlashdata('pesan') ?>'
            })
        </script>
    <?php } ?>