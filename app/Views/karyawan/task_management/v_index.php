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
                                <h5 class="card-title">Task</h5>
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
                                    <th>Deskripsi Pekerjaan</th>
                                    <th>Nama Rumah Sakit</th>
                                    <th>Batas Tanggal</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $row) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['deskripsi'] ?></td>
                                        <td><?= $row['nama_rumah_sakit'] ?></td>
                                        <td><?= $row['batas_tgl_pekerjaan'] ?></td>
                                        <td>
                                            <?php if ($row['status_pekerjaan'] == 'On Progress') { ?>
                                                <span class="badge rounded-pill bg-warning">Belum</span>
                                            <?php } else { ?>
                                                <span class="badge rounded-pill bg-success">Selesai</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('task_management/' . $row['id_pekerjaan']) ?>" class="btn btn-info btn-sm bg-green">Detail</a>
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

<!-- modal tambah -->