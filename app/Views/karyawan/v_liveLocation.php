<main id="main" class="main" style="min-height: 590px;">

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
                        <?php if ($absen) { ?>
                            <p class="d-flex align-items-center gap-3 fs-5"><i class="bi bi-check-circle text-green fs-1"></i> Anda Sudah Absen Hari Ini !</p>
                            <p>Pukul <?= $absen['jam'] . ' ' . $absen['tgl_absen'] ?></p>
                            <?php if ($absen['keterangan'] == null) { ?>
                                <h3 class="text-green">Selamat Bekerja !</h3>
                            <?php } else { ?>
                                <p>Keterangan : <?= $absen['keterangan'] ?></p>
                            <?php } ?>
                        <?php } else { ?>
                            <p>Silahkan melakukan absen Tanggal <?= $tanggal ?></p>
                            <p>Waktu <?= $waktu ?></p>
                        <?php } ?>
                    </div>
                </div><!-- End Default Card -->
                <?php if (!$absen) { ?>
                    <div class="d-flex justify-content-evenly">
                        <a href="<?= base_url('liveLocation/hadir') ?>" class="btn btn-success btn-lg bg-green">Hadir</a>
                        <a href="<?= base_url('liveLocation/tidak_hadir') ?>" class="btn btn-warning btn-lg">Tidak Hadir</a>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>

</main><!-- End #main -->