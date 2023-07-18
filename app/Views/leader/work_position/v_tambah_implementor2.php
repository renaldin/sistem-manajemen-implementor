<main id="main" class="main" style="min-height: 590px;">

    <div class="pagetitle">
        <h1>Manage Work Position</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('m_work_position') ?>">Manage Work Position</a></li>
                <li class="breadcrumb-item active">Add Implementor</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Implementers to <?= $data['nama_rumah_sakit'] ?> Hospital</h5>
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
                        <!-- Vertical Form -->
                        <?= form_open('m_work_position/simpan_implementor/' . $data['id_rumah_sakit'], ['class' => 'row g-3']) ?>
                        <!-- data dari form implementor 1 -->
                        <input type="hidden" name="id_user1" value="<?= $data_input['id_user'] ?>">
                        <input type="hidden" name="email_user1" value="<?= $data_input['email'] ?>">
                        <input type="hidden" name="tanggal_mulai1" value="<?= $data_input['tanggal_mulai'] ?>">
                        <input type="hidden" name="tanggal_selesai1" value="<?= $data_input['tanggal_selesai'] ?>">

                        <div class="col-12">
                            <label for="implementor" class="form-label">Implementor 2</label>
                            <select name="id_user2" id="impelementor" class="form-select" aria-label="Default select example" required>
                                <option value="" selected>~ Choose ~</option>
                                <?php foreach ($karyawan as $row) {
                                    if (date('Y-m-d') >= $row['tanggal_selesai'] || $row['status'] == null || $row['status_rumah_sakit'] == 'Cancle') {
                                        if ($row['id_user'] != $data_input['id_user']) {
                                ?>
                                            <option value="<?= $row['id_user'] ?>"><?= $row['nama_user'] ?></option>
                                <?php }
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email_user2" required>
                        </div>
                        <div class="col-12">
                            <label for="tanggal_mulai" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai2" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="tanggal_selesai" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai2" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-primary bg-hijau" data-bs-toggle="modal" data-bs-target="#kirimEmail">Save</button>
                            <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                        </div>
                        <!-- </form> -->
                        <!-- modal kirim email -->
                        <div class="modal fade" id="kirimEmail" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Send Email For both Implementor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-12">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Input subject email">
                                        </div>
                                        <div class="col-12">
                                            <label for="pesan" class="form-label">Message</label>
                                            <textarea class="form-control" placeholder="Input pesan email" name="pesan" id="pesan" style="height: 100px;" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary bg-green" type="submit">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->