<main id="main" class="main">

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
                        <h5 class="card-title">Form Nilai HRD</h5>

                        <!-- Vertical Form -->
                        <?= form_open('m_employe_assesment/hasil', ['class' => 'row g-3']) ?>
                        <!-- <form class="row g-3"> -->
                        <input type="hidden" name="id" value="<?= $data['id_user'] ?>">
                        <input type="hidden" name="ps_leader" value="<?= $input_employe['public_speaking'] ?>">
                        <input type="hidden" name="tj_leader" value="<?= $input_employe['tanya_jawab'] ?>">
                        <input type="hidden" name="ns_leader" value="<?= $input_employe['soal'] ?>">
                        <div class="col-12">
                            <label for="public_speaking" class="form-label">Nilai Public Speaking</label>
                            <input type="text" class="form-control" id="public_speaking" name="public_speaking">
                        </div>
                        <div class="col-12">
                            <label for="tanya_jawab" class="form-label">Nilai Tanya Jawab</label>
                            <input type="text" class="form-control" id="tanya_jawab" name="tanya_jawab">
                        </div>
                        <div class="col-12">
                            <label for="soal" class="form-label">Nilai Soal</label>
                            <input type="text" class="form-control" id="soal" name="soal">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Hasil</button>
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