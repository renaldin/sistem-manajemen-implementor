<main id="main" class="main" style="min-height: 590px;">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-8">
                <!-- Default Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Good <?= $ucapan ?> <?= session()->get('nama') ?>,</h5>
                        <?php if ($absen) { ?>
                            <p class="d-flex align-items-center gap-3 fs-5"><i class="bi bi-check-circle text-green fs-1"></i> You have been absent today !</p>
                            <p>Hour and Date <?= $absen['jam'] . ' ' . $absen['tgl_absen'] ?></p>
                            <?php if ($absen['keterangan'] == null) { ?>
                                <h3 class="text-green">Enjoy the work !</h3>
                            <?php } else { ?>
                                <p>Description : <?= $absen['keterangan'] ?></p>
                            <?php } ?>
                        <?php } else { ?>
                            <p>Please do absent date <?= $tanggal ?></p>
                            <p>Hour <?= $waktu ?></p>
                        <?php } ?>
                        <p class="text-danger">Can only do absences from 08:00 to 09:00 AM</p>
                    </div>
                </div><!-- End Default Card -->
                <?php if (!$absen) {
                    if (date('H:i') >= '08:00' && date('H:i') <= '09:00') {
                ?>
                        <div class="d-flex justify-content-evenly">
                            <a href="<?= base_url('liveLocation/hadir') ?>" class="btn btn-success btn-lg bg-green">Attend</a>
                            <a href="<?= base_url('liveLocation/tidak_hadir') ?>" class="btn btn-warning btn-lg">Not Attend</a>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body p-3">
                        <?php foreach ($pekerjaan as $val) { ?>
                            <?php
                            $date1 = date('Y-m-d');
                            $date2 = $val['batas_tgl_pekerjaan'];
                            $timestamp1 = strtotime($date1);
                            $timestamp2 = strtotime($date2);
                            $diffInSeconds = $timestamp2 - $timestamp1;
                            $diffInDays = floor($diffInSeconds / (60 * 60 * 24));
                            ?>
                            <p class="text-danger">Task <?= substr($val['deskripsi'], 0, 10) . "..." ?> <?= $diffInDays < 0 ? 'Lewat Jatuh Tempo' : ($diffInDays == '0' ? 'Jatuh Tempo Hari Ini' : ($diffInDays == '1' ? 'Akan Jatuh Tempo Esok' : 'Belum Dikerjakan')) ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->