<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//agen
Route::apiResource('agen', 'Api\AgenController');
Route::get('search-agen', 'Api\AgenController@search');

//pegawai
Route::post('loginPegawai', 'Api\PegawaiController@loginPegawai');

//kategori dan produk
Route::get('getKategori', 'Api\KategoriController@getAll');
Route::post('getProduk', 'Api\ProdukController@getProdukKategori');

//keranjang dan transaksi
Route::post('addCart', 'Api\TransaksiController@addCart');
Route::post('get_cart', 'Api\TransaksiController@get_cart');
Route::post('deleteItemCart', 'Api\TransaksiController@deleteItemCart');
Route::post('deleteCart', 'Api\TransaksiController@deleteCart');
Route::post('checkOut', 'Api\TransaksiController@checkOut');
Route::post('get_transaksi', 'Api\TransaksiController@get_transaksi');
Route::post('get_detail_transaksi', 'Api\TransaksiController@get_detail_transaksi');
