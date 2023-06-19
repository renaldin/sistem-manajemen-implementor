<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Landingpage::index');

$routes->get('/login', 'Login::index');
$routes->post('/cek_login', 'Login::cek_login');
$routes->get('/logout', 'Login::logout');

// Route Leader (admin)
$routes->get('/dashboard', 'Leader::index');

$routes->get('/m_employe_assesment', 'Leader::m_employe_assesment');
$routes->post('/m_employe_assesment/insert_employe', 'Leader::insert_employe');
$routes->get('/m_employe_assesment/(:num)', 'Leader::nilai_employe/$1');
$routes->post('/m_employe_assesment/(:num)', 'Leader::nilai_employe/$1');
$routes->delete('/m_employe_assesment/(:num)', 'Leader::delete_employe/$1');
$routes->get('/m_employe_assesment/hasil/(:num)', 'Leader::hasil/$1');
$routes->post('/m_employe_assesment/kirim_email', 'Leader::kirim_email');

$routes->get('/m_work_position', 'Leader::m_work_position');
$routes->get('/m_work_position/(:num)', 'Leader::tambah_implementor_rs/$1');
$routes->post('/m_work_position/(:num)', 'Leader::tambah_implementor_rs/$1');
$routes->post('/m_work_position', 'Leader::insert_work_position');
$routes->post('/m_work_position/edit', 'Leader::edit_work_position');
$routes->post('/m_work_position/simpan_implementor/(:num)', 'Leader::simpan_implementor/$1');
// $routes->post('/m_work_position/kirim_email/(:num)/(:num)', 'Leader::kirim_email_implementor/$1/$2');
$routes->get('/m_work_position/cancle_rumah_sakit/(:num)', 'Leader::cancle_rumah_sakit/$1');
$routes->get('/m_work_position/riwayat_rumah_sakit', 'Leader::riwayat_rumah_sakit');
$routes->get('/m_work_position/uncancle_rumah_sakit/(:num)', 'Leader::uncancle_rumah_sakit/$1');

$routes->get('/m_live_location', 'Leader::m_live_location');
$routes->get('/m_live_location/(:num)', 'Leader::detail_absen/$1');
$routes->get('/m_live_location/selesai/(:num)', 'Leader::selesaiAbsen/$1');
$routes->get('/m_live_location/riwayat_live_location', 'Leader::riwayat_live_location');

$routes->get('/m_task_management', 'Leader::m_task_management');
$routes->get('/m_task_management/getRS/(:num)', 'Leader::get_RS_ajax/$1');
$routes->post('/m_task_management/insert_task', 'Leader::insert_task');
$routes->get('/m_task_management/(:num)/(:any)', 'Leader::detail/$1/$2');
$routes->post('/m_task_management/edit', 'Leader::ubah_batas_tgl_pekerjaan');
$routes->get('/m_task_management/selesai/(:num)', 'Leader::selesai_task/$1');
$routes->get('/m_task_management/riwayat_task', 'Leader::riwayat_task');

// Route Karyawan
$routes->get('/liveLocation', 'Karyawan::live_location');
$routes->get('/liveLocation/(:any)', 'Karyawan::absen/$1');
$routes->post('/liveLocation/insert_hadir/', 'Karyawan::insert_hadir');
$routes->post('/liveLocation/insert_tidakhadir/', 'Karyawan::insert_tidakhadir');

$routes->get('/task_management', 'Karyawan::task_management');
$routes->get('/task_management/(:num)', 'Karyawan::detail_task_management/$1');
$routes->post('/task_management/insert', 'Karyawan::upload_task');

// Route HRD
$routes->get('/hrd', 'HRD::index');
$routes->get('/hrd/(:num)', 'HRD::input_nilai/$1');
$routes->post('/hrd/save_nilai', 'HRD::save_nilai');

// Route Profile
$routes->get('/profile', 'Profile::index');
$routes->get('/profile/edit', 'Profile::edit');
$routes->get('/profile/change_password', 'Profile::change_password');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
