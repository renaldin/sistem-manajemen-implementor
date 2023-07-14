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
                        <h5 class="text-center p-2">Detail Task</h5>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="nama_implementor" class="form-label">Implementer Name</label>
                                <input type="text" class="form-control" id="nama_implementor" name="nama_implementor" value="<?= $data['nama_user'] ?>" readonly>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="rumah_sakit" class="form-label">Hospital Name</label>
                                <input type="text" class="form-control" id="rumah_sakit" name="rumah_sakit" value="<?= $data['nama_rumah_sakit'] ?>" readonly>
                            </div>
                            <form action="<?= base_url('m_task_management/edit') ?>" method="post">
                                <div class=" col-12 mb-2">
                                    <label for="batas_tgl_pekerjaan" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" id="batas_tgl_pekerjaan" name="batas_tgl_pekerjaan" value="<?= $data['batas_tgl_pekerjaan'] ?>">
                                </div>
                                <input type="hidden" name="id_pekerjaan" value="<?= $data['id_pekerjaan'] ?>">
                                <div class="col-12 mb-2">
                                    <label for="deskripsi" class="form-label">Submission Date <?= $data['tgl_pengumpulan'] ? '' : '<small class="text-danger">(Not Submitted)</small>' ?></label>
                                    <input type="date" class="form-control" id="tgl_pengumpulan" name="tgl_pengumpulan" value="<?= $data['tgl_pengumpulan'] ? $data['tgl_pengumpulan'] : '' ?>" readonly>
                                </div>
                                <div class="col-12 mb-2 d-block">
                                    <label for="deskripsi" class="form-label">Link Spreadsheet <?= $data['link'] ? '' : '<small class="text-danger">(Not Submitted)</small>' ?></label><br>
                                    <?php if ($data['link']) { ?> <a target="_blank" href="<?= $data['link'] ?>"><?= substr($data['link'], 0, 80) . "...." ?></a><?php } ?>
                                </div>
                                <div class="modal-footer justify-content-evenly pt-3">
                                    <?php if ($return == 'task') { ?>
                                        <a href="<?= base_url('m_task_management') ?>" class="btn btn-outline-success">Back</a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('m_task_management/riwayat_task') ?>" class="btn btn-outline-success">Back</a>
                                    <?php } ?>
                                    <button type="submit" class="btn btn-primary bg-green">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Default Card -->
        </div>

        </div>
    </section>

</main><!-- End #main -->