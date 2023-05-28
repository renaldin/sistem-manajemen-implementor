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
                        <h4>Keterangan</h4>
                        <form action="<?= base_url('liveLocation/insert_tidakhadir') ?>" method="post">
                            <div class="row ">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="keterangan" style="height: 100px"></textarea>
                                    <input type="hidden" name="tgl_absen" value="<?= $date ?>">
                                    <input type="hidden" name="jam" value="<?= $waktu ?>">
                                </div>
                                <div class="col-6">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <h5>Tanggal</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <p><?= $tanggal ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Jam</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <p><?= $waktu ?></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 justify-content-center text-center">
                                    <button type="submit" class="btn btn-success btn-lg">Absen</button>
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