<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage Work Position</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('m_work_position') ?>">Manage Work Position</a></li>
                <li class="breadcrumb-item active">Tambah Implementor</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $title ?> <?= $data['nama_rumah_sakit'] ?></h5>

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
                                <option selected>~ Pilih ~</option>
                                <?php foreach ($karyawan as $row) {
                                    if ($row['status'] == 'Diterima' && $row['id_user'] != $data_input['id_user']) {
                                ?>
                                        <option value="<?= $row['id_user'] ?>"><?= $row['nama_user'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email_user2" required>
                        </div>
                        <div class="col-12">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai2" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai2" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                        </div>
                        <!-- </form> -->
                        <?= form_close() ?>
                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->