<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
            <span class="d-none d-lg-block text-green">SIMI</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="button" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!-- End Search Icon-->



            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?= base_url('foto_profile/default.png') ?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= session()->get('nama') ?></span>
                </a>
                <!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= session()->get('nama') ?></h6>
                        <span><?= session()->get('role') ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profile') ?>">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout') ?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul>
                <!-- End Profile Dropdown Items -->
            </li>
            <!-- End Profile Nav -->

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php if (session()->get('role') == 'Leader') { ?>
            <li class="nav-heading">DASHBOARD</li>
            <li class="nav-item">
                <a class="nav-link <?= ($title == 'Dashboard') ? 'active' : 'collapsed' ?>" href="<?= base_url('dashboard') ?>">
                    <i class="bi bi-grid "></i>
                    <span>Dashboard</span>
                </a>
            </li>
        <?php } ?>
        <!-- End Dashboard Nav -->

        <li class="nav-heading">MASTER DATA</li>

        <?php if (session()->get('role') == 'Karyawan') { ?>
            <li class="nav-item active ">
                <a class="nav-link <?= ($title == 'Live Location') ? 'active' : 'collapsed' ?>" href="<?= base_url('liveLocation') ?>">
                    <i class="bi bi-camera"></i>
                    <span>Live Location</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($title == 'Task Management' || $title == 'Detail Task Management') ? 'active' : 'collapsed' ?>" href="<?= base_url('task_management') ?>">
                    <i class="bi bi-files"></i>
                    <span>Task Management</span>
                </a>
            </li>
        <?php } ?>

        <?php if (session()->get('role') == 'HRD') { ?>
            <li class="nav-item active ">
                <!-- <a class="nav-link <?= ($title == 'Manage Employee Assesment' || $title == 'Input Nilai Employee') ? 'active' : 'collapsed' ?>" href="<?= base_url('hrd') ?>">
                    <i class="bi bi-clipboard2-check"></i>
                    <span>Manage Employe Assesment</span>
                </a> -->
                <a class="nav-link <?= ($title == 'Manage Employee Assesment' || $title == 'Detail Nilai Employee' || $title == 'History Employee') ? 'active' : 'collapsed' ?>" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-clipboard2-check"></i>
                    <span>Manage Employe Assesment</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse <?= ($title == 'Manage Employee Assesment' || $title == 'Tambah Implementor Rumah Sakit' || $title == 'History Employee') ? 'show active' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="<?= ($title == 'Manage Employee Assesment') ? 'active' : '' ?>" href="<?= base_url('hrd') ?>">
                            <i class="bi bi-circle"></i><span>Employee Assesment</span>
                        </a>
                    </li>
                    <li>
                        <a class="<?= ($title == 'History Employee') ? 'active' : '' ?>" href="<?= base_url('hrd/riwayat_employee') ?>">
                            <i class="bi bi-circle"></i><span>History Employee</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php } ?>

        <?php if (session()->get('role') == 'Leader') { ?>
            <li class="nav-item">
                <a class="nav-link <?= ($title == 'Manage Employe Assesment') ? 'active' : 'collapsed' ?>" href="<?= base_url('m_employe_assesment') ?>">
                    <i class="bi bi-clipboard2-check"></i>
                    <span>Manage Employe Assessment</span>
                </a>
            </li>
            <!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link <?= ($title == 'Manage Work Position' || $title == 'Tambah Implementor Rumah Sakit' || $title == 'History Rumah Sakit') ? 'active' : 'collapsed' ?>" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-geo-alt"></i>
                    <span>Manage Work Position</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse <?= ($title == 'Manage Work Position' || $title == 'Tambah Implementor Rumah Sakit' || $title == 'History Rumah Sakit') ? 'show active' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="<?= ($title == 'Manage Work Position' || $title == 'Tambah Implementor Rumah Sakit') ? 'active' : '' ?>" href="<?= base_url('m_work_position') ?>">
                            <i class="bi bi-circle"></i><span>Manage Hospitals</span>
                        </a>
                    </li>
                    <li>
                        <a class="<?= ($title == 'History Rumah Sakit') ? 'active' : '' ?>" href="<?= base_url('m_work_position/riwayat_rumah_sakit') ?>">
                            <i class="bi bi-circle"></i><span>Hospitals History</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End F.A.Q Page Nav -->
            <li class="nav-item">
                <a class="nav-link <?= ($title == 'Manage Live Location' || $title == 'Detail Live Location' || $title == 'History Live Location') ? 'active' : 'collapsed' ?>" data-bs-target="#menu-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-camera"></i>
                    <span>Manage Live Location</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="menu-nav" class="nav-content collapse <?= ($title == 'Manage Live Location' || $title == 'Detail Live Location' || $title == 'History Live Location') ? 'show active' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="<?= ($title == 'Manage Live Location' || $title == 'Detail Live Location') ? 'active' : '' ?>" href="<?= base_url('m_live_location') ?>">
                            <i class="bi bi-circle"></i><span>Live Location</span>
                        </a>
                    </li>
                    <li>
                        <a class="<?= ($title == 'History Live Location') ? 'active' : '' ?>" href="<?= base_url('m_live_location/riwayat_live_location') ?>">
                            <i class="bi bi-circle"></i><span>History Live Location</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link <?= ($title == 'Manage Task Management' || $title == 'Detail Task Management' || $title == 'History Task Management') ? 'active' : 'collapsed' ?>" data-bs-target="#menu_task" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-files"></i>
                    <span>Manage Task Management</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="menu_task" class="nav-content collapse <?= ($title == 'Manage Task Management' || $title == 'Detail Task Management' || $title == 'History Task Management') ? 'show active' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="<?= ($title == 'Manage Task Management') ? 'active' : '' ?>" href="<?= base_url('m_task_management') ?>">
                            <i class="bi bi-circle"></i><span>Task Management</span>
                        </a>
                    </li>
                    <li>
                        <a class="<?= ($title == 'History Task Management') ? 'active' : '' ?>" href="<?= base_url('m_task_management/riwayat_task') ?>">
                            <i class="bi bi-circle"></i><span>History Task</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <!-- End Register Page Nav -->

    </ul>

</aside>
<!-- End Sidebar-->