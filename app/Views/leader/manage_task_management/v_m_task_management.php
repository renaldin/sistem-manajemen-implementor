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
                                <h5 class="card-title">Data Task</h5>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-success mt-3 bg-green" data-bs-toggle="modal" data-bs-target="#add"><i class="bi bi-plus-lg"></i> Task Karyawan</button>
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
                                    <th>Nama Implementor</th>
                                    <th>Tanggal</th>
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
                                        <td><?= $row['nama_user'] ?></td>
                                        <td><?= $row['batas_tgl_pekerjaan'] ?></td>
                                        <td>
                                            <?php if ($row['tgl_pengumpulan'] == null && date('Y-m-d') > $row['batas_tgl_pekerjaan']) { ?>
                                                <span class="badge rounded-pill bg-danger">Late</span>
                                            <?php } elseif ($row['status_pekerjaan'] == 'Uploaded') { ?>
                                                <span class="badge rounded-pill bg-info"><?= $row['status_pekerjaan'] ?></span>
                                            <?php } elseif ($row['status_pekerjaan'] == 'Done') { ?>
                                                <span class="badge rounded-pill bg-success">
                                                    <?= $row['status_pekerjaan'] ?>
                                                </span>
                                            <?php } else { ?>
                                                <span class="badge rounded-pill bg-warning">
                                                    <?= $row['status_pekerjaan'] ?>
                                                </span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#selesai-<?= $row['id_pekerjaan'] ?>" class="btn btn-warning btn-sm">Selesai</a>
                                            <a href="<?= base_url('m_task_management/' . $row['id_pekerjaan'] . '/task') ?>" class="btn btn-info btn-sm bg-green">Detail</a>
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
<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Task Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('m_task_management/insert_task', ['class' => 'row g-3']) ?>
                <!-- <form class="row g-3"> -->
                <div class="col-12">
                    <label for="nama_implementor" class="form-label">Nama Implementor</label>
                    <select name="nama_implementor" id="nama_implementor" class="form-select" onchange="getRS()">
                        <option value="">~ Pilih ~</option>
                        <?php foreach ($implementor as $row) { ?>
                            <option value="<?= $row['id_implementor'] ?>"><?= $row['nama_user'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-12">
                    <label for="rumah_sakit" class="form-label">Nama Rumah Sakit</label>
                    <input type="text" class="form-control" id="rumah_sakit" name="rumah_sakit" readonly>
                </div>
                <div class=" col-12">
                    <label for="batas_tgl_pekerjaan" class="form-label">Batas Tanggal Pekerjaan</label>
                    <input type="date" class="form-control" id="batas_tgl_pekerjaan" name="batas_tgl_pekerjaan" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-12">
                    <label for="deskripsi" class="form-label">Deskripsi Pekerjaan</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 100px"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success bg-green">Create</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Selesai -->
<?php foreach ($data as $row) { ?>
    <div class="modal fade" id="selesai-<?= $row['id_pekerjaan'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Selesai Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menyelesaikan task <?= $row['nama_user'] ?> ?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                        <a href="<?= base_url('m_task_management/selesai/' . $row['id_pekerjaan']) ?>" class="btn btn-success bg-green">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    function getRS() {
        var nama = $('#nama_implementor').val();
        if (nama != '') {
            $.ajax({
                url: "<?= base_url('m_task_management/getRS/') ?>" + nama,
                success: function(result) {
                    $("#rumah_sakit").val(result);
                    // alert(result)
                }
            });
        } else {
            $("#rumah_sakit").val("");
        }
    }
</script>