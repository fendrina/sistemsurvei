<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/survei', 'Home::index');
$routes->get('/dosen', 'User/Dosen::index');
$routes->get('/dosen_s', 'User/Dosen_s::index');
$routes->get('/tendik', 'User/Tendik::index');
$routes->get('/tendik_s', 'User/Tendik_s::index');
$routes->get('/mahasiswa', 'User/Mahasiswa::index');
$routes->get('/mahasiswa_s', 'User/Mahasiswa_s::index');
$routes->get('/end_survei', 'User/End::index');


$routes->get('/', 'Dashboard::index',['filter' =>'role:SAdmin,unit1,unit2,unit3,unit4,unit5']);


//SuperAdmin
$routes->group('sadmin', ['filter' => 'role:SAdmin'], function ($routes){
	$routes->get('hasiltotal', 'SAdmin\HasilSurvei::index');
	$routes->get('hasiltendik', 'SAdmin\HasilTendik::index');
	$routes->get('hasilkmn', 'SAdmin\HasilSurvei\A_hsKmn::index');
	$routes->get('hasilekw', 'SAdmin\HasilSurvei\B_hsEkw::index');
	$routes->get('hasilinf', 'SAdmin\HasilSurvei\C_hsInf::index');
	$routes->get('hasiltek', 'SAdmin\HasilSurvei\D_hsTek::index');
	$routes->get('hasiljmp', 'SAdmin\HasilSurvei\E_hsJmp::index');
	$routes->get('hasilgzi', 'SAdmin\HasilSurvei\F_hsGzi::index');
	$routes->get('hasiltib', 'SAdmin\HasilSurvei\G_hsTib::index');
	$routes->get('hasilikn', 'SAdmin\HasilSurvei\H_hsIkn::index');
	$routes->get('hasiltnk', 'SAdmin\HasilSurvei\I_hsTnk::index');
	$routes->get('hasilmab', 'SAdmin\HasilSurvei\J_hsMab::index');
	$routes->get('hasilmni', 'SAdmin\HasilSurvei\K_hsMni::index');
	$routes->get('hasilkim', 'SAdmin\HasilSurvei\L_hsKim::index');
	$routes->get('hasillnk', 'SAdmin\HasilSurvei\M_hsLnk::index');
	$routes->get('hasilakn', 'SAdmin\HasilSurvei\N_hsAkn::index');
	$routes->get('hasilpvt', 'SAdmin\HasilSurvei\P_hsPvt::index');
	$routes->get('hasiltmp', 'SAdmin\HasilSurvei\T_hsTmp::index');
	$routes->get('hasilppp', 'SAdmin\HasilSurvei\W_hsPpp::index');
	$routes->get('pertanyaan', 'SAdmin\PertSurvei::index');
	$routes->get('daftarunit', 'SAdmin\DaftarUnit::index');
	$routes->get('jadwal', 'SAdmin\JadwalSurvei::index');
	$routes->get('datadmin', 'SAdmin\DataAdmin::index');
	$routes->get('akademik', 'SAdmin\DataAdmin1::index');
	$routes->get('sarpras', 'SAdmin\DataAdmin2::index');
	$routes->get('pelayanan', 'SAdmin\DataAdmin3::index');
	$routes->get('lab', 'SAdmin\DataAdmin4::index');
	$routes->get('perpus', 'SAdmin\DataAdmin5::index');
	$routes->get('unduh', 'SAdmin\UnduhSurvei::index');
});
//Admin 1 Routes
$routes->group('admin', ['filter' => 'role:unit1'], function ($routes){
	$routes->get('hsl1', 'AdminPerUnit\hslUnit1::index');
	$routes->get('unduh1', 'AdminPerUnit\Unduh1::index');
});

//Admin 2 Routes
$routes->group('admin2', ['filter' => 'role:unit2'], function ($routes){
	$routes->get('hsl2', 'AdminPerUnit\hslUnit2::index');
	$routes->get('unduh2', 'AdminPerUnit\Unduh2::index');
});

//Admin 3 Routes
$routes->group('admin3', ['filter' => 'role:unit3'], function ($routes){
	$routes->get('unduh3', 'AdminPerUnit\Unduh3::index');
});

//Admin 4 Routes
$routes->group('admin4', ['filter' => 'role:unit4'], function ($routes){
	$routes->get('unduh4', 'AdminPerUnit\Unduh4::index');
});

//Admin 5 Routes
$routes->group('admin5', ['filter' => 'role:unit5'], function ($routes){
	$routes->get('hsl5', 'AdminPerUnit\hslUnit5::index');
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
