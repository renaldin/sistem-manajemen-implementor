<!-- ? Preloader Start -->
<!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= base_url() ?>/template/frontend/assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="<?= base_url('/') ?>"><img src="<?= base_url() ?>/asset/img/logo.png" alt="" width="60"><span style="font-weight: 500;">SIPFOR</span></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li class="<?= ($title == 'Home') ? 'active' : '' ?>"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="<?= ($title == 'About') ? 'active' : '' ?>"><a href="<?= base_url('about') ?>">About</a></li>
                                <?php if (session()->get('log')) { ?>
                                    <li class="<?= ($title == 'Pesanan') ? 'active' : '' ?>"><a href="<?= base_url('pesanan') ?>">Pesanan</a></li>
                                <?php } else { ?>
                                    <div id="login">
                                        <li><a href="<?= base_url('login') ?>" class="mr-40 login"><i class="ti-user"></i> Log in</a></li>
                                        <li><a href="<?= base_url('register') ?>" class="mr-40 login"><i class="ti-pencil"></i> Daftar</a></li>
                                    </div>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header-btn -->
                    <?php
                    if (session()->get('log')) { ?>
                        <div class="header-btns d-lg-block f-right text-white">
                            <span class="profil">
                                <button id="dropbtn" class="d-block" style="background-color: transparent; border-style: none;" onclick="myFunction()">
                                    <img src="<?= base_url() ?>/asset/img/user.png" width="30" alt=""> <span><?= (session()->get('nama')) ?></span>
                                </button>
                                <!-- <div id="dropbtn" class="d-block"> -->
                                <!-- </div> -->
                                <ul class="" id="myDropdown">
                                    <li><a href="<?= base_url('profil') ?>"><i class="bi bi-person-lines-fill"></i> Profil</a></li>
                                    <li><a href="<?= base_url('daftarOwner') ?>"><i class="bi bi-node-plus"></i> Daftar Fasilitas</a></li>
                                    <li><a href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                                </ul>
                            </span>
                        </div>

                        <!-- <a href="<?= base_url('logout') ?>" class="mr-40 login"><i class="ti-user"></i> Log out</a> -->
                    <?php } else { ?>
                        <div class="header-btns d-none d-lg-block f-right">
                            <a href="<?= base_url('login') ?>" class="mr-40 login"><i class="ti-user"></i> Log in</a>
                            <a href="<?= base_url('register') ?>" class="btn" style="background-color: unset; border: 1px solid #fff !important;">Daftar</a>
                        </div>
                    <?php } ?>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<script>
    function myFunction() {
        // alert('tes');
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    // window.onclick = function(event) {
    //     if (!event.target.matches('#dropbtn')) {
    //         // alert('tksjkdfjds')
    //         var dropdowns = document.getElementById("myDropdown");
    //         // dropdowns.classList.remove('show');
    //         var i;
    //         for (i = 0; i < dropdowns.length; i++) {
    //             var openDropdown = dropdowns[i];
    //             alert(dropdowns[i]);
    //             if (openDropdown.classList.contains('show')) {
    //                 alert('hapus')
    //                 openDropdown.classList.remove('show');
    //             }
    //         }
    //     }
    // }
</script>