<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-12">

                <!-- Default Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Selamat <?= $ucapan ?> <?= session()->get('nama') ?>,</h5>
                        <p>Silahkan melakukan absen Tanggal <?= $tanggal ?></p>
                        <p>Waktu <?= $waktu ?></p>
                    </div>
                </div><!-- End Default Card -->
                <div class="d-flex justify-content-evenly">
                    <a href="#" class="btn btn-success btn-lg">Hadir</a>
                    <a href="#" class="btn btn-warning btn-lg">Tidak Hadir</a>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->