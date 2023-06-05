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
                        <form action="<?= base_url('liveLocation/insert_tidakhadir') ?>" method="post">
                            <div class="row ">
                                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                    <div id="my_camera"></div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6 col-xl-6 d-flex justify-content-center align-items-center">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-lg text-center btn-success" id="take" onclick="takePicture()"><i class="bi bi-camera fs-4"></i></button>
                                        <button type="button" class="btn btn-lg text-center btn-warning d-none" id="repeat"><i class="bi bi-arrow-repeat fs-4"></i></button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12 p-4 ">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <h4>Titik Koordinat </h4>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <p id="lokasi"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Tanggal </h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <p><?= $tanggal ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Jam</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <p><?= $waktu ?></p>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="text-center">
                                        <input type="hidden" name="captured_image_data" id="captured_image_data">
                                        <input type="hidden" name="tgl_absen" value="<?= $date ?>">
                                        <input type="hidden" name="jam" value="<?= $waktu ?>">
                                        <input type="hidden" name="koordinat" id="koordinat">
                                        <!-- <button type="submit" class="btn btn-primary d-none mt-3 btn-lg" id="simpan">Simpan</button> -->
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="ket">Keterangan :</label>
                                    <textarea class="form-control" id="ket" name="keterangan" style="height: 100px"></textarea>
                                </div>
                                <div class="col-12 justify-content-center text-center">
                                    <button type="submit" class="btn btn-primary d-none mt-3 btn-lg" id="simpan">Absen</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><!-- End Default Card -->
        </div>

        </div>
    </section>

</main><!-- End #main -->

<script>
    Webcam.set({
        width: 540,
        height: 480,
        image_format: 'jpeg',
        jpeg_quality: 90,

    });
    Webcam.attach('#my_camera');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }

    function showPosition(position) {
        var x = document.getElementById("lokasi");
        var y = document.getElementById("koordinat");
        x.innerHTML = position.coords.latitude + "," + position.coords.longitude;
        y.value = position.coords.latitude + "," + position.coords.longitude;
        // alert(koor)
    }

    function takePicture() {
        Webcam.snap(function(data_uri) {
            // display results in page
            document.getElementById('my_camera').innerHTML =
                '<img class="after_capture_frame" src="' + data_uri + '" style="width:540px; height:400px; margin-top:35px;"/>';
            $("#captured_image_data").val(data_uri);
            var base64data = $("#captured_image_data").val();
            // alert(base64data);

            $('#take').addClass('d-none');
            $('#repeat').removeClass('d-none');
            $('#simpan').removeClass('d-none');
        });
    }

    $('#repeat').on('click', function() {
        repeat()
    })

    function repeat() {
        Webcam.attach('#my_camera');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
        $('#take').removeClass('d-none');
        $('#repeat').addClass('d-none');
        $('#simpan').addClass('d-none');
    }
</script>