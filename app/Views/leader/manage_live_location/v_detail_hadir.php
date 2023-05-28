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
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6 pt-3">
                                <img class="w-100" src="<?= base_url('foto_absensi/' . $data['foto']) ?>" alt="">
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 p-4 ">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <h5>Koordinat</h5>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <p><a target="_blank" href="https://www.google.co.id/maps/place/<?= $data['koordinat'] ?>"><?= $data['koordinat'] ?></a></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Tanggal</h5>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <p><?= date('d-m-Y', strtotime($data['tgl_absen'])) ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Jam</h5>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <p><?= $data['jam'] ?></p>
                                        </td>
                                    </tr>
                                </table>
                                <a href="<?= base_url('m_live_location') ?>" class="btn btn-success" style="float: right;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Default Card -->
        </div>

        </div>
    </section>

</main><!-- End #main -->