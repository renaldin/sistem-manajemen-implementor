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
                            <div class="col-12 col-md-12 col-lg-6">
                                <div id="my_camera"></div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 p-4 ">
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
                                    <button class="btn btn-lg text-center btn-success bg-green" id="take" onclick="takePicture()"><i class="bi bi-camera fs-4"></i></button>
                                    <button class="btn btn-lg text-center btn-warning d-none" id="repeat" onclick="repeat()"><i class="bi bi-arrow-repeat fs-4"></i></button>
                                </div>
                                <div class="text-center">
                                    <form action="<?= base_url('liveLocation/insert_hadir') ?>" method="post">
                                        <input type="hidden" name="captured_image_data" id="captured_image_data">
                                        <input type="hidden" name="tgl_absen" value="<?= $date ?>">
                                        <input type="hidden" name="jam" value="<?= $waktu ?>">
                                        <input type="hidden" name="koordinat" id="koordinat">
                                        <button type="submit" class="btn btn-primary d-none mt-3 btn-lg bg-green" id="simpan">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
        // var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        // alert(position.coords.latitude + "," + position.coords.longitude);
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