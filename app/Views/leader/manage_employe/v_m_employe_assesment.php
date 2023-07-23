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
                                        if ($row['status'] == null || $row['status'] == 'Diterima') {
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
                                                        <span class="badge rounded-pill bg-success bg-green">Implementor</span>
                                                    <?php } elseif ($row['status'] == 'Tidak Diterima') { ?>
                                                        <span class="badge rounded-pill bg-danger">Not Accepted</span>
                                                    <?php } else { ?>
                                                        <span class="badge rounded-pill bg-info">Rated</span>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align: center !important;">
                                                    <button class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#del-<?= $row['id_user'] ?>"><i class=" bi bi-trash"></i></button>
                                                    <button class="btn btn-primary btn-sm bg-green mb-1" data-bs-toggle="modal" data-bs-target="#detail-<?= $row['id_user'] ?>">Detail</button>
                                                    <?php if ($row['status'] == null && $row['nilai_leader'] == null) { ?>
                                                        <a href="<?= base_url('m_employe_assesment/' . $row['id_user']) ?>" class="btn btn-primary btn-sm bg-green mb-1">Input Appraisal</a>
                                                    <?php } elseif ($row['status'] != null) { ?>
                                                    <?php } ?>
                                                    <?php if ($row['nilai_leader'] != null && $row['nilai_hrd'] != null && $row['status'] == null) { ?>
                                                        <a href="<?= base_url('m_employe_assesment/hasil/' . $row['id_user']) ?>" class="btn btn-success btn-sm bg-green mb-1">Hasil</a>
                                                    <?php } else { ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
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
                    <label for="alamat" class="form-label">Addres</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat') ?>">
                </div>
                <div class="col-12">
                    <label for="tempat_lahir" class="form-label">Place of Birth</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ?>">
                </div>
                <div class="col-12">
                    <label for="tgl_lahir" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir') ?>">
                </div>
                <div class="col-12">
                    <label for="agama" class="form-label">Religion</label>
                    <select name="agama" id="agama" class="form-select">
                        <option value="">~ Choose ~</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Khongucu">Khongucu</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="no_telp" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="no_telp" name="no_telp" value="<?= old('no_telp') ?>">
                </div>
                <div class="col-12">
                    <label for="pendidikan_terakhir" class="form-label">Recent Education</label>
                    <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select">
                        <option value="">~ Choose ~</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="pengalaman_kerja" class="form-label">Work Experience</label>
                    <input type="text" class="form-control" id="pengalaman_kerja" name="pengalaman_kerja" value="<?= old('pengalaman_kerja') ?>">
                </div>
                <div class="col-12">
                    <label for="skill" class="form-label">Skill</label>
                    <input type="text" class="form-control" id="skill" name="skill" value="<?= old('skill') ?>">
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
                    <p>Gender : <?= $row['jenis_kelamin'] ?></p>
                    <p>Address : <?= $row['alamat'] ?></p>
                    <p>Tempat Tanggal Lahir : <?= $row['tempat_lahir'] . ', ' . date('d-m-Y', strtotime($row['tgl_lahir'])) ?></p>
                    <p>Religion : <?= $row['agama'] ?></p>
                    <p>Phone Number : <?= $row['no_telp'] ?></p>
                    <p>Recent Education : <?= $row['pendidikan_terakhir'] ?></p>
                    <p>Skill : <?= $row['skill'] ?></p>
                    <p>Email : <?= $row['email'] ?></p>
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