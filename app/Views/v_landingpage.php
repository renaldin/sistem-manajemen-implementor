<!-- ======= Hero Section ======= -->
<section id="home" class="d-flex align-items-center">

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 pt-5 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-right">
                <h1 style="font-weight: bolder;">Website Implementor</h1>
                <h2>PT Inovasi Kesehatan Indonesia</h2>
                <div class="d-flex">
                    <a href="<?= base_url('login') ?>" class="btn-get-started btn btn-success bg-green">Login</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main>
    <!-- ======= Featured Services Section ======= -->
    <section id="about" class="featured-services">
        <div class="container">

            <div class="row justify-content-evenly mt-4">
                <div class="col-lg-5 col-sm-6 col-12 " style="background-color: #f7f7f7;" data-aos="zoom-in-up">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-people text-green" style="font-size: 3vw;"></i></div>
                        <h4 class="title">Implementor</h4>
                        <p class="description">Suatu bagian yang ditugaskan oleh
                            perusahaan untuk menjelaskan
                            tentang product tersebut supaya
                            bisa digunakan dengan baik
                            sesuai dengan kebutuhannya.</p>
                    </div>
                </div>

                <div class="col-lg-5 col-sm-6 col-12 mt-4 mt-lg-0 " style="background-color: #f7f7f7;" data-aos="zoom-in-up">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-info-circle text-green" style="font-size: 3vw;"></i></div>
                        <h4 class="title">Info</h4>
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
    <section id="" class="about">
        <div class="container">

            <div class="row justify-content-evenly mt-4">
                <div class="col-lg-5" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <img src=" assets/img/about.png" class="img-fluid w-100" alt="">
                </div>
                <div class="col-lg-5 pt-4 pt-lg-0 content" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <h3>Tugas Implementor</h3>
                    <p class="fst-italic">
                        Tugas Utama Implementor pada PT Inovasi Kesehatan Indonesia.
                    </p>
                    <ul style="list-style-type: none;">
                        <li><i class="bi bi-check-circle text-green p-1"></i> Menjelaskan product kesia.id kepada admin rumah sakit</li>
                        <li><i class="bi bi-check-circle text-green p-1"></i> Mempermudah pihak rumah sakit untuk mengelola product kesia.id</li>
                        <li><i class="bi bi-check-circle text-green p-1"></i> Memastikan product kesia.id sudah sesuai dengan kebutuhan dari rumah sakit</li>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="row counters justify-content-evenly">


                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in-right">
                    <h1 style="font-size: 5vw; font-weight: bolder;" class="text-green"><?= $count_rumahsakit ?></h1>
                    <h4>Rumah Sakit</h4>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in-left">
                    <h1 style="font-size: 5vw; font-weight: bolder;" class="text-green"><?= $count_implementor ?></h1>
                    <h4>Karyawan Implementor</h4>
                </div>


            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg text-center mt-3">
        <div class="container">

            <div class="section-title">
                <h2 style="font-size: 4vw; font-weight: bolder; color: darkgray;" data-aos="fade-up">CONTACT</h2>
                <h3 style="font-size: 3.5vw; font-weight: bolder; margin-top: -55px;" data-aos="fade-up" data-aos-duration="1500">CONTACT</h3>
            </div>


        </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact container">
        <div class="row gy-4">

            <div class="col-xl-6 " data-aos="fade-right" data-aos-duration="2000">

                <div class="card p-4" style="border-top: #00bfa6 solid 10px; border-bottom: #00bfa6 solid 10px;">
                    <form action="forms/contact.php" method="post" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-12 d-flex align-items-center">
                                <i class="bi bi-geo-alt fs-4 p-3 text-green"></i>
                                <div class="">
                                    <h4>Location</h4>
                                    <span>Jakarta</span>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-items-center">
                                <i class="bi bi-geo-alt fs-4 p-3 text-green"></i>
                                <div class="">
                                    <h4>Email</h4>
                                    <span>kesia.id@gmail.com</span>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-items-center">
                                <i class="bi bi-geo-alt fs-4 p-3 text-green"></i>
                                <div class="">
                                    <h4>Location</h4>
                                    <span>-6.2031675,106.85765</span>
                                </div>
                            </div>
                            <style>
                                @media (max-width: 991px) {
                                    #frame {
                                        width: 320px;
                                        height: 280px;
                                    }
                                }
                            </style>
                            <div class="col-md-12 text-center">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.456651449093!2d106.8551086102822!3d-6.203333660741261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5362d4268f1%3A0x3e1ed000345c62c3!2sKesia%20Indonesia!5e0!3m2!1sen!2sus!4v1686749525004!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="frame"></iframe>
                                <!-- <iframe src="https://www.google.com/maps/place/Downtown+Conference+Center/@40.710059,-74.006138,14z/data=!4m6!3m5!1s0x89c25a22a3bda30d:0xb89d1fe6bc499443!8m2!3d40.7100586!4d-74.0061377!16s%2Fg%2F1tfm2cg6?hl=en-US&entry=ttu" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
                            </div>

                        </div>
                    </form>
                </div>

            </div>

            <div class="col-xl-6" data-aos="fade-left" data-aos-duration="2000">
                <div class="card p-4" style="border-top: #00bfa6 solid 10px; border-bottom: #00bfa6 solid 10px;">

                    <form class="row g-3">
                        <div class="col-6">
                            <label for="inputNanme4" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="inputNanme4">
                        </div>
                        <div class="col-6">
                            <label for="inputEmail4" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-12">
                            <label for="inputPassword4" class="form-label">Subject</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Message</label>
                            <textarea class="form-control" id="floatingTextarea" style="height: 100px;"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary bg-green">Send Message</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>

            </div>

        </div>
    </section>
</main><!-- End #main -->