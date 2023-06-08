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
                        <h5 class="text-center p-2"><?= $subtitle ?></h5>
                        <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    <?php foreach ($errors as $key => $value) { ?>
                                        <li><?= esc($value); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php  } ?>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="nama_implementor" class="form-label">Deskripsi Pekerjaan</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 100px" readonly><?= $data['deskripsi'] ?></textarea>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="rumah_sakit" class="form-label">Nama Rumah Sakit</label>
                                <input type="text" class="form-control" id="rumah_sakit" name="rumah_sakit" value="<?= $data['nama_rumah_sakit'] ?>" readonly>
                            </div>
                            <div class=" col-12 mb-2">
                                <label for="batas_tgl_pekerjaan" class="form-label">Batas Tanggal Pekerjaan</label>
                                <input type="date" class="form-control" id="batas_tgl_pekerjaan" name="batas_tgl_pekerjaan" value="<?= $data['batas_tgl_pekerjaan'] ?>" readonly>
                            </div>
                            <form action="<?= base_url('task_management/insert') ?>" method="post">
                                <input type="hidden" name="id_pekerjaan" value="<?= $data['id_pekerjaan'] ?>">
                                <div class="col-12 mb-2">
                                    <label for="tgl_pengumpulan" class="form-label">Tanggal Pengumpulan</label>
                                    <input type="date" class="form-control" id="tgl_pengumpulan" name="tgl_pengumpulan" value="<?= $data['tgl_pengumpulan'] ? $data['tgl_pengumpulan'] : date('Y-m-d') ?>" readonly>
                                </div>
                                <div class="col-12 mb-2 d-block">
                                    <label for="link" class="form-label">Link Spreadsheet</label><br>
                                    <input type="text" class="form-control" id="link" name="link" value="<?= $data['link'] ? $data['link'] : '' ?>" <?= $data['link'] ? 'readonly' : '' ?>>
                                </div>
                                <div class="modal-footer justify-content-evenly pt-3">
                                    <a href="<?= base_url('task_management') ?>" class="btn btn-success">Back</a>
                                    <?php if ($data['status_pekerjaan'] == 'On Progress') { ?>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    <?php } ?>
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