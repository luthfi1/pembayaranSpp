<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::match(["GET","post"],"/register", function(){
    return redirect('login');
});

Route::resource('/kelas','KelasController');
Route::resource('/spp','SppController');
Route::resource('/siswa','SiswaController');
Route::resource('/pembayaran','PembayaranController');
Route::resource('/petugas','UserController');

Route::get('/cetak','ReportController@report');
Route::get('/excel','ReportController@excel');


