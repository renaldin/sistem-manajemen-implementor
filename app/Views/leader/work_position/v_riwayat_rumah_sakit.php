<main id="main" class="main" style="min-height: 590px;">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb d-flex">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
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
                    <?php foreach ($data as $row) {
                        if ($row['status'] == 'Cancle') {
                    ?>
                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">

                                    <div class="filter" title="Opsi">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Opsi</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#detail-<?= $row['id_rumah_sakit'] ?>">Detail Rumah Sakit</a></li>
                                            <li><a class="dropdown-item" href="<?= base_url('m_work_position/uncancle_rumah_sakit/' . $row['id_rumah_sakit']) ?>">Kembali Kerja Sama</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Rumah Sakit</h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-medical"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 class="fs-4"><?= $row['nama_rumah_sakit'] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Sales Card -->
                    <?php }
                    } ?>

                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>

</main><!-- End #main -->

<!-- modal tambah -->
<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Rumah Sakit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('m_work_position', ['class' => 'row g-3']) ?>
                <!-- <form class="row g-3"> -->
                <div class="col-12">
                    <label for="nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
                    <input type="text" class="form-control" id="nama_rumah_sakit" name="nama_rumah_sakit" value="<?= old('nama_rumah_sakit') ?>">
                </div>
                <div class="col-12">
                    <label for="alamat_rumah_sakit" class="form-label">Alamat Rumah Sakit</label>
                    <input type="text" class="form-control" id="alamat_rumah_sakit" name="alamat_rumah_sakit" value="<?= old('alamat_rumah_sakit') ?>">
                </div>
                <div class="col-12">
                    <label for="deskripsi_rumah_sakit" class="form-label">Deskripsi Rumah Sakit</label>
                    <textarea class="form-control" name="deskripsi_rumah_sakit" style="height: 100px"><?= old('deskripsi_rumah_sakit') ?></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<!-- modal edit -->
<?php foreach ($data as $row) { ?>
    <div class="modal fade" id="edit-<?= $row['id_rumah_sakit'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Rumah Sakit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= form_open('m_work_position/edit', ['class' => 'row g-3']) ?>
                    <input type="hidden" name="id_rumah_sakit" value="<?= $row['id_rumah_sakit'] ?>">
                    <div class="col-12">
                        <label for="nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" id="nama_rumah_sakit" name="nama_rumah_sakit" value="<?= $row['nama_rumah_sakit'] ?>">
                    </div>
                    <div class="col-12">
                        <label for="alamat_rumah_sakit" class="form-label">Alamat Rumah Sakit</label>
                        <input type="text" class="form-control" id="alamat_rumah_sakit" name="alamat_rumah_sakit" value="<?= $row['alamat_rumah_sakit'] ?>">
                    </div>
                    <div class="col-12">
                        <label for="deskripsi_rumah_sakit" class="form-label">Deskripsi Rumah Sakit</label>
                        <textarea class="form-control" name="deskripsi_rumah_sakit" style="height: 100px"><?= $row['deskripsi_rumah_sakit'] ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- modal detail -->
<?php foreach ($data as $row) { ?>
    <div class="modal fade" id="detail-<?= $row['id_rumah_sakit'] ?>" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Rumah Sakit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Nama Rumah Sakit :</p>
                    <p><?= $row['nama_rumah_sakit'] ?></p>
                    <hr>
                    <p>Alamat Rumah Sakit :</p>
                    <p><?= $row['alamat_rumah_sakit'] ?></p>
                    <hr>
                    <p>Deskripsi Rumah Sakit :</p>
                    <p><?= $row['deskripsi_rumah_sakit'] ?></p>
                    <hr>
                    <p>Implementor :</p>
                    <?php foreach ($implementor as $value) {
                        if ($value['id_rumah_sakit'] == $row['id_rumah_sakit']) { ?>
                            <b><?= $value['nama_user'] ?></b>
                            <p>Tanggal : <?= $value['tanggal_mulai'] ?> - <?= $value['tanggal_selesai'] ?></p>
                    <?php }
                    } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div><!-- End Small Modal-->
<?php } ?>