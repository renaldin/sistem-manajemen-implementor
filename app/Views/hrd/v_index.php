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
                                        <th>Appraisal</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                        if ($row['nilai_hrd'] == null || $row['status'] == null || $row['send_email'] != true || $row['status'] == 'Diterima') {
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
                                                <td class="text-center">
                                                    <?php if ($row['nilai_hrd'] == null) { ?>
                                                        <a href="<?= base_url('hrd/' . $row['id_user']) ?>" class="btn btn-primary btn-sm bg-green mb-1">Input Appraisal</a>
                                                    <?php } elseif ($row['approve_hrd'] == null && $row['nilai_hrd'] != null) { ?>
                                                        <button class="btn btn-primary bg-green btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#upd-<?= $row['id_user'] ?>">Update Appraisal</button>
                                                        <a href="<?= base_url('hrd/approve/' . $row['id_user']) ?>" class="btn btn-primary btn-sm bg-green mb-1">Approve</a>
                                                    <?php } elseif ($row['approve_hrd'] == null) { ?>
                                                        <a href="<?= base_url('hrd/approve/' . $row['id_user']) ?>" class="btn btn-primary btn-sm bg-green mb-1">Approve</a>
                                                    <?php } else { ?>
                                                        <button class="btn btn-primary btn-sm bg-green mb-1" data-bs-toggle="modal" data-bs-target="#detail-<?= $row['id_user'] ?>">Detail</button>
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

<!-- modal edit penilaian -->
<?php foreach ($data as $row) { ?>
    <div class="modal fade" id="upd-<?= $row['id_user'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Appraisal <?= $row['nama_user'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('hrd/edit_nilai/' . $row['id_user']) ?>" method="post">
                    <div class="modal-body">
                        <!-- <form class="row g-3"> -->
                        <div class="row">
                            <div class="col-12">
                                <label for="public_speaking" class="form-label">Value Public Speaking</label>
                                <select name="hrd_public_speaking" id="public_speaking" class="form-select">
                                    <option value="1" <?= $row['hrd_public_speaking'] == '1' ? 'selected' : '' ?>>Less (1)</option>
                                    <option value="2" <?= $row['hrd_public_speaking'] == '2' ? 'selected' : '' ?>>Satisfactory (2)</option>
                                    <option value="3" <?= $row['hrd_public_speaking'] == '3' ? 'selected' : '' ?>>Good (3)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="tanya_jawab" class="form-label">Value Debriefing</label>
                                <select name="hrd_tanya_jawab" id="tanya_jawab" class="form-select">
                                    <option value="1" <?= $row['hrd_tanya_jawab'] == '1' ? 'selected' : '' ?>>Less (1)</option>
                                    <option value="2" <?= $row['hrd_tanya_jawab'] == '2' ? 'selected' : '' ?>>Satisfactory (2)</option>
                                    <option value="3" <?= $row['hrd_tanya_jawab'] == '3' ? 'selected' : '' ?>>Good (3)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="soal" class="form-label">Value Question</label>
                                <select name="hrd_soal" id="soal" class="form-select">
                                    <option value="1" <?= $row['hrd_soal'] == '1' ? 'selected' : '' ?>>Less (1)</option>
                                    <option value="2" <?= $row['hrd_soal'] == '2' ? 'selected' : '' ?>>Satisfactory (2)</option>
                                    <option value="3" <?= $row['hrd_soal'] == '3' ? 'selected' : '' ?>>Good (3)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary bg-green">Update</button>
                    </div>
                </form>
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
                    <hr>
                    <p><b>Implementor Value of Leader</b></p>
                    <?php if ($row['leader_public_speaking']) { ?>
                        <p>Value Public Speaking : <?= $row['leader_public_speaking'] == 1 ? 'Less (1)' : ($row['leader_public_speaking'] == 2 ? 'Satisfactory (2)' : 'Good (3)')  ?></p>
                        <p>Value Debriefing : <?= $row['leader_tanya_jawab'] == 1 ? 'Less (1)' : ($row['leader_tanya_jawab'] == 2 ? 'Satisfactory (2)' : 'Good (3)')  ?></p>
                        <p>Value Question : <?= $row['leader_soal'] == 1 ? 'Less (1)' : ($row['leader_soal'] == 2 ? 'Satisfactory (2)' : 'Good (3)')  ?></p>
                    <?php } else { ?>
                        <p>Leader haven't made an assessment yet</p>
                    <?php } ?>
                    <hr>
                    <p><b>Implementor Value of HRD</b></p>
                    <?php if ($row['hrd_public_speaking']) { ?>
                        <p>Value Public Speaking : <?= $row['hrd_public_speaking'] == 1 ? 'Less (1)' : ($row['hrd_public_speaking'] == 2 ? 'Satisfactory (2)' : 'Good (3)')  ?></p>
                        <p>Value Debriefing : <?= $row['hrd_tanya_jawab'] == 1 ? 'Less (1)' : ($row['hrd_tanya_jawab'] == 2 ? 'Satisfactory (2)' : 'Good (3)')  ?></p>
                        <p>Value Question : <?= $row['hrd_soal'] == 1 ? 'Less (1)' : ($row['hrd_soal'] == 2 ? 'Satisfactory (2)' : 'Good (3)')  ?></p>
                    <?php } else { ?>
                        <p>HRD haven't made an assessment yet</p>
                    <?php } ?>
                    <hr>
                    <?php if ($row['leader_public_speaking'] != null && $row['hrd_public_speaking'] != null && $row['status'] != null) { ?>
                        <p>Value <?= $row['nama_user'] ?> : <?= $row['nilai_leader'] + $row['nilai_hrd'] ?> <?= $row['nilai_leader'] + $row['nilai_hrd'] >= 10 ? '(Good) accepted as an Implementor employee at PT Inovasi Kesehatan Indonesia' : '(Less) not accepted as an Implementor employee at PT Inovasi Kesehatan Indonesia' ?></p>
                    <?php } else { ?>
                        <p>Value Temporary <?= $row['nama_user'] . ' : ' . $row['nilai_leader'] + $row['nilai_hrd'] ?></p>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url('m_employe_assesment/' . $row['id_user']) ?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Back</button>
                    </form>
                    <a href="<?= base_url('hrd/detail/' . $row['id_user']) ?>" class="btn btn-primary bg-green mb-1">Send Email</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>