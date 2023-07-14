<main id="main" class="main" style="min-height: 590px;">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Master Data</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">Manage</h5>
                            </div>
                        </div>
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
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Implementer Name</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Option</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $row) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_user'] ?></td>
                                        <td><?= $row['tgl_absen'] ?></td>
                                        <td><?= $row['keterangan'] == null ? 'Attend' : 'Not Attend' ?></td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#selesai-<?= $row['id_absen'] ?>">Finished</a>
                                            <a href="<?= base_url('m_live_location/' . $row['id_absen']) ?>" class="btn btn-info btn-sm bg-green">Detail</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php foreach ($data as $val) { ?>
    <div class="modal fade" id="selesai-<?= $val['id_absen'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finished Attend</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to complete the attended from <?= $val['nama_user'] ?> ?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                        <a href="<?= base_url('m_live_location/selesai/' . $val['id_absen']) ?>" class="btn btn-success bg-green">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>