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
                        <button type="button" class="btn btn-primary bg-green" data-bs-toggle="modal" data-bs-target="#kirimEmail">Kirim E-mail</button>
                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->
<div class="modal fade" id="kirimEmail" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kirim Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('m_employe_assesment/kirim_email') ?>" method="post" class="row g-3">
                <div class="modal-body">
                    <input type="hidden" name="email" value="<?= $hasil['employe']['email'] ?>">
                    <div class="col-12">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Masukan subject email">
                    </div>
                    <div class="col-12">
                        <label for="pesan" class="form-label">Isi Pesan</label>
                        <textarea class="form-control" placeholder="Masukan pesan email" name="pesan" id="pesan" style="height: 100px;" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary bg-green" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>