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
                                <h5 class="card-title">Data Employee</h5>
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
                                        <th>Implementor Name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
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
                                            <td><?= $row['jenis_kelamin'] == 'Laki-laki' ? 'Male' : 'Female' ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm bg-green" data-bs-toggle="modal" data-bs-target="#detail-<?= $row['id_user'] ?>">Detail</button>
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
                    <p><b>Implementor Value of Leader</b></p>
                    <?php if ($row['leader_public_speaking']) { ?>
                        <p>Value Public Speaking : <?= $row['leader_public_speaking'] == 1 ? 'Less' : ($row['leader_public_speaking'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                        <p>Value Debriefing : <?= $row['leader_tanya_jawab'] == 1 ? 'Less' : ($row['leader_tanya_jawab'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                        <p>Value Question : <?= $row['leader_soal'] == 1 ? 'Less' : ($row['leader_soal'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                    <?php } else { ?>
                        <p>Leader haven't made an assessment yet</p>
                    <?php } ?>
                    <hr>
                    <p><b>Implementor Value of HRD</b></p>
                    <?php if ($row['hrd_public_speaking']) { ?>
                        <p>Value Public Speaking : <?= $row['hrd_public_speaking'] == 1 ? 'Less' : ($row['hrd_public_speaking'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                        <p>Value Debriefing : <?= $row['hrd_tanya_jawab'] == 1 ? 'Less' : ($row['hrd_tanya_jawab'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                        <p>Value Question : <?= $row['hrd_soal'] == 1 ? 'Less' : ($row['hrd_soal'] == 2 ? 'Satisfactory' : 'Good')  ?></p>
                    <?php } else { ?>
                        <p>HRD haven't made an assessment yet</p>
                    <?php } ?>
                    <hr>
                    <?php if ($row['leader_public_speaking'] != null && $row['hrd_public_speaking'] != null && $row['status'] != null) { ?>
                        <p>Value <?= $row['nama_user'] ?> : <?= $row['nilai_leader'] + $row['nilai_hrd'] ?> <?= $row['nilai_leader'] + $row['nilai_hrd'] >= 10 ? '(Good) accepted as an Implementor employee at PT Inovasi Kesehatan Indonesia' : '(Less) not accepted as an Implementor employee at PT Inovasi Kesehatan Indonesia' ?></p>
                    <?php } else { ?>
                        <p>Value Sementara <?= $row['nama_user'] . ' : ' . $row['nilai_leader'] + $row['nilai_hrd'] ?></p>
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