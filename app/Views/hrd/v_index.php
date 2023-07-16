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
                            Wellcome <?= session()->get('nama') ?>, <?= session()->get('role') ?>
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
                        <div class="responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                        if ($row['nilai_hrd'] == null || $row['status'] == null || $row['send_email'] != true) {
                                    ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row['nama_user'] ?></td>
                                                <td><?= $row['jenis_kelamin'] == 'Laki-laki' ? 'Male' : 'Female' ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td class="text-center">
                                                    <?php if ($row['nilai_hrd'] == null) { ?>
                                                        <a href="<?= base_url('hrd/' . $row['id_user']) ?>" class="btn btn-primary btn-sm bg-green mb-1">Input Appraisal</a>
                                                    <?php } elseif ($row['nilai_hrd'] != null && $row['nilai_leader'] != null) { ?>
                                                        <a href="<?= base_url('hrd/detail/' . $row['id_user']) ?>" class="btn btn-primary btn-sm bg-green mb-1">Detail</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Default Card -->
            </div>

        </div>
    </section>

</main><!-- End #main -->