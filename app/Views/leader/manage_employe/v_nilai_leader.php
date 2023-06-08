<main id="main" class="main" style="min-height: 590px;">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('m_employe_assesment') ?>">Manage Employe</a></li>
                <li class="breadcrumb-item active">Input Nilai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Nilai Leader Implementor</h5>
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
                        <?= form_open('m_employe_assesment/' . $data['id_user'], ['class' => 'row g-3']) ?>
                        <!-- <form class="row g-3"> -->
                        <div class="col-12">
                            <label for="public_speaking" class="form-label">Nilai Public Speaking</label>
                            <select name="public_speaking" id="public_speaking" class="form-select">
                                <option value="">~ Pilih ~</option>
                                <option value="1">Kurang</option>
                                <option value="2">Cukup</option>
                                <option value="3">Baik</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="tanya_jawab" class="form-label">Nilai Tanya Jawab</label>
                            <select name="tanya_jawab" id="tanya_jawab" class="form-select">
                                <option value="">~ Pilih ~</option>
                                <option value="1">Kurang</option>
                                <option value="2">Cukup</option>
                                <option value="3">Baik</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="soal" class="form-label">Nilai Soal</label>
                            <select name="soal" id="soal" class="form-select">
                                <option value="">~ Pilih ~</option>
                                <option value="1">Kurang</option>
                                <option value="2">Cukup</option>
                                <option value="3">Baik</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('m_employe_assesment') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary">Save</button>
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