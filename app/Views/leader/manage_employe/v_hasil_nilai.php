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
        <div class="row ">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Hasil Nilai <b><?= $hasil['nilai'] ?></b>. <?= $hasil['employe']['nama_user'] ?> <b><?= $hasil['status'] ?></b> menjadi Implementor di PT Inovasi Kesehatan Indonesia</h5>
                        <a href="<?= base_url('m_employe_assesment/kirim_email/' . $hasil['employe']['email']) ?>" class="btn btn-primary">Kirim Email</a>
                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->