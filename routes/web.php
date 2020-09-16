<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    // return view('welcome');
    return redirect('login');
});

Auth::routes();

//disable register
Route::match(['get', 'post'], '/register', function () {
    return redirect('login');
})->name('register');

//disable register
// Auth::routes([
//     'register' => false
// ]);


//untuk mengatur hak akses
Route::group(['middleware' => ['auth']], function () {


    //view home
    Route::get('/home', 'HomeController@index')->name('home');

    //view layouts template
    Route::view('template', 'layouts.template');

    //route user
    Route::resource('user', 'UserController');

    //route supplier
    Route::resource('supplier', 'SupplierController')->except(['show']);

    //route pegawai
    Route::resource('pegawai', 'PegawaiController')->except(['show']);

    //route kategori
    Route::resource('kategori', 'KategoriController')->except(['show']);

    //route produk
    Route::resource('produk', 'ProdukController')->except(['show']); //except yaitu yang tidak dijalankan

    //route transaksi masuk
    Route::resource('transaksi_masuk', 'TransaksiMasukController')->only(['index', 'create', 'store', 'destroy']); //only yaitu yang digunakan

    //route agen
    Route::get('agen', 'AgenController@index')->name('agen');

    //route report penjualan
    Route::get('report_penjualan', 'ReportPenjualanController@index')->name('report_penjualan');
    //route cetak pdf
    Route::get('cetak_pdf', 'ReportPenjualanController@cetak_pdf')->name('cetak_pdf');
    //route cetak excel
    Route::get('cetak_excel', 'ReportPenjualanController@cetak_excel')->name('cetak_excel');
});
