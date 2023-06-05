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
                        <form action="<?= base_url('liveLocation/insert_tidakhadir') ?>" method="post">
                            <div class="row ">
                                <div class="col-12 col-md-6 col-lg-6 pt-3">
                                    <img class="w-100" src="<?= base_url('foto_absensi/' . $data['foto']) ?>" alt="">
                                </div>
                                <h4 class="pt-2">Keterangan</h4>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="keterangan" style="height: 100px" readonly><?= $data['keterangan'] ?></textarea>
                                </div>
                                <div class="col-6 p-3">
                                    <h5>Tanggal : <?= $data['tgl_absen'] ?></h5>
                                    <h5>Jam : <?= $data['jam'] ?></h5>
                                </div>
                                <div class="col-12 justify-content-center text-center">
                                    <a href="<?= base_url('m_live_location') ?>" class="btn btn-success">Back</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><!-- End Default Card -->
        </div>

        </div>
    </section>

</main><!-- End #main -->