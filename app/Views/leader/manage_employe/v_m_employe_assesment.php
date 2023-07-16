<main id="main" class="main" style="min-height: 590px;">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
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
                                <h5 class="card-title">Data Employe</h5>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-primary mt-3 bg-green" data-bs-toggle="modal" data-bs-target="#add">Create Employe</button>
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
                                        <th>Appraisal</th>
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
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nama_user'] ?></td>
                                            <td><?= $row['jenis_kelamin'] == 'Laki-laki' ? 'Male' : 'Female' ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td>
                                                <?php if ($row['nilai_leader'] == null && $row['nilai_hrd'] == null) { ?>
                                                    0/2
                                                <?php } elseif ($row['nilai_leader'] != null && $row['nilai_hrd'] != null) { ?>
                                                    2/2
                                                <?php } else { ?>
                                                    1/2
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($row['status'] ==  null && $row['nilai_leader']    == null && $row['nilai_hrd'] == null) { ?>
                                                    <span class="badge rounded-pill bg-warning">Not Rated Yet</span>
                                                <?php } elseif ($row['status'] == 'Diterima') { ?>
                                                    <span class="badge rounded-pill bg-primary">Accepted</span>
                                                <?php } elseif ($row['status'] == 'Implementor') { ?>
                                                    <span class="badge rounded-pill bg-success bg-green">Implementer</span>
                                                <?php } elseif ($row['status'] == 'Tidak Diterima') { ?>
                                                    <span class="badge rounded-pill bg-danger">Not Accepted</span>
                                                <?php } else { ?>
                                                    <span class="badge rounded-pill bg-info">Rated</span>
                                                <?php } ?>
                                            </td>
                                            <td style="text-align: center !important;">
                                                <button class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#del-<?= $row['id_user'] ?>"><i class=" bi bi-trash"></i></button>
                                                <?php if ($row['status'] == null && $row['nilai_leader'] == null) { ?>
                                                    <a href="<?= base_url('m_employe_assesment/' . $row['id_user']) ?>" class="btn btn-primary btn-sm bg-green mb-1">Input Appraisal</a>
                                                <?php } elseif ($row['status'] != null) { ?>
                                                    <button class="btn btn-primary btn-sm bg-green mb-1" data-bs-toggle="modal" data-bs-target="#detail-<?= $row['id_user'] ?>">Detail</button>
                                                <?php } ?>
                                                <?php if ($row['nilai_leader'] != null && $row['nilai_hrd'] != null && $row['status'] == null) { ?>
                                                    <a href="<?= base_url('m_employe_assesment/hasil/' . $row['id_user']) ?>" class="btn btn-success btn-sm bg-green mb-1">Hasil</a>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- modal tambah -->
<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Employe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('m_employe_assesment/insert_employe', ['class' => 'row g-3']) ?>
                <!-- <form class="row g-3"> -->
                <div class="col-12">
                    <label for="nama_user" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= old('nama_user') ?>">
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <label for="jenis_kelamin" class="form-label">Gender :</label>
                        </div>
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="Laki-laki" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="Perempuan">
                                <label class="form-check-label" for="gridRadios2">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>">
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= old('alamat_rumah_sakit') ?>">
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
<!-- modal hapus -->
<?php foreach ($data as $row) { ?>
    <div class="modal fade" id="del-<?= $row['id_user'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <?= $row['nama_user'] ?> Employee ?</p>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url('m_employe_assesment/' . $row['id_user']) ?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- modal detail -->
<?php foreach ($data as $row) { ?>
    <div class="modal fade" id="detail-<?= $row['id_user'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Employee Appraisal Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Name : <?= $row['nama_user'] ?></p>
                    <p>Email : <?= $row['email'] ?></p>
                    <hr>
                    <p><b>Implementer Value of Leader</b></p>
                    <?php if ($row['leader_public_speaking']) { ?>
                        <p>Value Public Speaking : <?= $row['leader_public_speaking'] == 1 ? 'Less' : ($row['leader_public_speaking'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                        <p>Value Debriefing : <?= $row['leader_tanya_jawab'] == 1 ? 'Less' : ($row['leader_tanya_jawab'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                        <p>Value Question : <?= $row['leader_soal'] == 1 ? 'Less' : ($row['leader_soal'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                    <?php } else { ?>
                        <p>Leader haven't made an assessment yet</p>
                    <?php } ?>
                    <hr>
                    <p><b>Implementer Value of HRD</b></p>
                    <?php if ($row['hrd_public_speaking']) { ?>
                        <p>Value Public Speaking : <?= $row['hrd_public_speaking'] == 1 ? 'Less' : ($row['hrd_public_speaking'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                        <p>Value Debriefing : <?= $row['hrd_tanya_jawab'] == 1 ? 'Less' : ($row['hrd_tanya_jawab'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                        <p>Value Question : <?= $row['hrd_soal'] == 1 ? 'Less' : ($row['hrd_soal'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                    <?php } else { ?>
                        <p>HRD haven't made an assessment yet</p>
                    <?php } ?>
                    <hr>
                    <?php if ($row['leader_public_speaking'] != null && $row['hrd_public_speaking'] != null && $row['status'] != null) { ?>
                        <p>Value <?= $row['nama_user'] ?> : <?= $row['nilai_leader'] + $row['nilai_hrd'] ?> <?= $row['nilai_leader'] + $row['nilai_hrd'] >= 10 ? '(Good) accepted as an Implementer employee at PT Inovasi Kesehatan Indonesia' : '(Less) not accepted as an Implementer employee at PT Inovasi Kesehatan Indonesia' ?></p>
                    <?php } else { ?>
                        <p>Value Temporary <?= $row['nama_user'] . ' : ' . $row['nilai_leader'] + $row['nilai_hrd'] ?></p>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url('m_employe_assesment/' . $row['id_user']) ?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>