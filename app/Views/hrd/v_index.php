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
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            Selamat Datang <?= session()->get('nama') ?>, <?= session()->get('role') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">Data Employe</h5>
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
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $row) {
                                    if ($row['nilai_hrd'] == null) {
                                ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nama_user'] ?></td>
                                            <td><?= $row['jenis_kelamin'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('hrd/' . $row['id_user']) ?>" class="btn btn-primary btn-sm">Input Value</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- End Default Card -->
            </div>

        </div>
    </section>

</main><!-- End #main -->