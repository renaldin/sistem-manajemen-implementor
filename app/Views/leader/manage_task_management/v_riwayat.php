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
                                <h5 class="card-title">History Task</h5>
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
                                    <th>Status</th>
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
                                        <td><?= $row['batas_tgl_pekerjaan'] ?></td>
                                        <td>
                                            <?php if ($row['tgl_pengumpulan'] == null && date('Y-m-d') > $row['batas_tgl_pekerjaan']) { ?>
                                                <span class="badge rounded-pill bg-danger">Late</span>
                                            <?php } elseif ($row['status_pekerjaan'] == 'Uploaded') { ?>
                                                <span class="badge rounded-pill bg-info"><?= $row['status_pekerjaan'] ?></span>
                                            <?php } elseif ($row['status_pekerjaan'] == 'Done') { ?>
                                                <span class="badge rounded-pill bg-green">
                                                    <?= $row['status_pekerjaan'] ?>
                                                </span>
                                            <?php } else { ?>
                                                <span class="badge rounded-pill bg-warning">
                                                    <?= $row['status_pekerjaan'] ?>
                                                </span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('m_task_management/' . $row['id_pekerjaan'] . '/riwayat_task') ?>" class="btn btn-info btn-sm bg-green">Detail</a>
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