<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIMI - Kesia.id</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin') ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{<?= base_url('NiceAdmin') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{<?= base_url('NiceAdmin') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{<?= base_url('NiceAdmin') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{<?= base_url('NiceAdmin') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('NiceAdmin') ?>/assets/css/style.css" rel="stylesheet">

    <!-- css custom navbar -->
    <style>
        /* .menu-nav {
            display: block;
        } */

        @media (min-width: 991px) {
            .menu-nav {
                display: none !important;
            }

            .header-nav {
                display: none !important;
            }

            .nav-dekstop {
                display: block !important;
            }

        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class=" d-lg-block fs-2">SIMI Kesia</span>
            </a>
        </div><!-- End Logo -->

        <!-- nav on dekstop-->
        <div class="ms-auto nav-dekstop d-none">
            <ul class="nav me-5" style="gap: 10px;">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('/') ?>">
                        <span class="fw-semibold fs-6">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <span class="fw-semibold fs-6">About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <span class="fw-semibold fs-6">Team</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <span class="fw-semibold fs-6">Contact</span>
                    </a>
                </li>
            </ul>
        </div>


        <!-- navbar on mobile -->
        <div class="search-bar menu-nav">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('/') ?>">
                        <i class="bi bi-grid"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="">
                        <i class="bi bi-grid"></i>
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="">
                        <i class="bi bi-grid"></i>
                        <span>Team</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="">
                        <i class="bi bi-grid"></i>
                        <span>C0ntact</span>
                    </a>
                </li>
            </ul>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-list toggle-sidebar-btn"></i>
                    </a>
                </li>

            </ul>
        </nav>

    </header><!-- End Header -->
    <!-- ======= Header ======= -->
    <!-- <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">SIMI kesia</a></h1>
           

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header> -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 pt-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Website Implementor</h1>
                    <h2>PT Inovasi Kesehatan Indonesia</h2>
                    <div class="d-flex">
                        <a href="<?= base_url('login') ?>" class="btn-get-started btn btn-success">Login</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main>

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">

                <div class="row justify-content-evenly">
                    <div class="col-lg-5 col-sm-6 col-12 bg-light">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-laptop"></i></div>
                            <h4 class="title"><a href="">Implementor</a></h4>
                            <p class="description">Suatu bagian yang ditugaskan oleh
                                perusahaan untuk menjelaskan
                                tentang product tersebut supaya
                                bisa digunakan dengan baik
                                sesuai dengan kebutuhannya.</p>
                        </div>
                    </div>

                    <div class="col-lg-5 col-sm-6 col-12 mt-4 mt-lg-0 bg-light">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-clipboard-data"></i></div>
                            <h4 class="title"><a href="">Info</a></h4>
                            <p class="description">Implementor harus siap ditempatkan
                                oleh perusahaan dimana saja.
                                Lama waktunya implementor diempatkan
                                selama 2-3 bulan.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="assets/img/about.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>Tugas Implementor</h3>
                        <p class="fst-italic">
                            Tugas Utama Implementor pada PT Inovasi Kesehatan Indonesia.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Menjelaskan product kesia.id kepada admin rumah sakit</li>
                            <li><i class="bi bi-check-circle"></i> Mempermudah pihak rumah sakit untuk mengelola product kesia.id</li>
                            <li><i class="bi bi-check-circle"></i> Memastikan product kesia.id sudah sesuai dengan kebutuhan dari rumah sakit</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row counters">


                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Rumah Sakit</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Karyawan Implementor</p>
                    </div>


                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title">
                    <span>Team</span>
                    <h2>Team</h2>
                    <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="assets/img/team/team-1.jpg" alt="">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            <p>
                                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="assets/img/team/team-2.jpg" alt="">
                            <h4>Sarah Jhinson</h4>
                            <span>Product Manager</span>
                            <p>
                                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="assets/img/team/team-3.jpg" alt="">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                            <p>
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div> -->

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <span>Contact</span>
                    <h2>Contact</h2>
                    <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="name">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">

            <div class="container">

                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <h3>eNno</h3>
                        <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
                    </div>
                </div>

                <div class="row footer-newsletter justify-content-center">
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>

            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>eNno</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/enno-free-simple-bootstrap-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('NiceAdmin') ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('NiceAdmin') ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('NiceAdmin') ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('NiceAdmin') ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('NiceAdmin') ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('NiceAdmin') ?>/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('NiceAdmin') ?>/assets/js/main.js"></script>

</body>

</html>