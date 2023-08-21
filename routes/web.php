<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('');
// transaksipph21
Route::get('/transaksipph21', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'index'])->name('transaksipph21');
Route::get('/transaksipph21/create', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'create'])->name('transaksipph21/create');
Route::post('/transaksipph21/store', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'store'])->name('transaksipph21/store');

Route::delete('/transaksipph21/{id}', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'destroy']);
Route::get('/transaksipph21/{id}/show', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'show'])->name('transaksipph21/show');
Route::get('/transaksipph21/{id}/edit', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'edit'])->name('transaksipph21/edit');
Route::put('/transaksipph21/{id}', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'update'])->name('transaksipph21/update');
// transaksipph21

// transaksipph22
Route::get('/ebupot', [App\Http\Controllers\EbupotController::class, 'index'])->name('ebupot');
Route::get('/ebupot/create', [App\Http\Controllers\EbupotController::class, 'create'])->name('ebupot/create');
Route::post('/ebupot/store', [App\Http\Controllers\EbupotController::class, 'store'])->name('ebupot/store');

Route::delete('/ebupot/{id}', [App\Http\Controllers\EbupotController::class, 'destroy']);
Route::get('/ebupot/{id}/show', [App\Http\Controllers\EbupotController::class, 'show'])->name('ebupot/show');
Route::get('/ebupot/{id}/edit', [App\Http\Controllers\EbupotController::class, 'edit'])->name('ebupot/edit');
Route::put('/ebupot/{id}', [App\Http\Controllers\EbupotController::class, 'update'])->name('ebupot/update');

// transaksipph22

// invoice
Route::get('/invoice/create', [App\Http\Controllers\InvoiceController::class, 'create'])->name('invoice/create');
// invoice

// fasilitas
Route::get('/fasilitas', [App\Http\Controllers\FasilitasController::class, 'index'])->name('fasilitas');
Route::get('/fasilitas/create', [App\Http\Controllers\FasilitasController::class, 'create'])->name('fasilitas/create');
Route::post('/fasilitas/store', [App\Http\Controllers\FasilitasController::class, 'store'])->name('fasilitas/store');

Route::delete('/fasilitas/{id}', [App\Http\Controllers\FasilitasController::class, 'destroy']);
Route::get('/fasilitas/{id}/show', [App\Http\Controllers\FasilitasController::class, 'show'])->name('fasilitas/show');
Route::get('/fasilitas/{id}/edit', [App\Http\Controllers\FasilitasController::class, 'edit'])->name('fasilitas/edit');
Route::put('/fasilitas/{id}', [App\Http\Controllers\FasilitasController::class, 'update'])->name('fasilitas/update');
// fasilitas

// kodeobjekpajak
Route::get('/kodeobjekpajak', [App\Http\Controllers\KodeObjekPajakController::class, 'index'])->name('kodeobjekpajak');
Route::get('/kodeobjekpajak/create', [App\Http\Controllers\KodeObjekPajakController::class, 'create'])->name('kodeobjekpajak/create');
Route::post('/kodeobjekpajak/store', [App\Http\Controllers\KodeObjekPajakController::class, 'store'])->name('kodeobjekpajak/store');

Route::delete('/kodeobjekpajak/{id}', [App\Http\Controllers\KodeObjekPajakController::class, 'destroy']);
Route::get('/kodeobjekpajak/{id}/show', [App\Http\Controllers\KodeObjekPajakController::class, 'show'])->name('kodeobjekpajak/show');
Route::get('/kodeobjekpajak/{id}/edit', [App\Http\Controllers\KodeObjekPajakController::class, 'edit'])->name('kodeobjekpajak/edit');
Route::put('/kodeobjekpajak/{id}', [App\Http\Controllers\KodeObjekPajakController::class, 'update'])->name('kodeobjekpajak/update');

// kodeobjekpajak

// neraca
Route::get('/neraca', [App\Http\Controllers\NeracaController::class, 'index'])->name('neraca');
Route::get('/neraca/create', [App\Http\Controllers\NeracaController::class, 'create'])->name('neraca/create');
Route::post('/neraca/store', [App\Http\Controllers\NeracaController::class, 'store'])->name('neraca/store');

Route::delete('/neraca/{id}', [App\Http\Controllers\NeracaController::class, 'destroy']);
Route::get('/neraca/{id}/show', [App\Http\Controllers\NeracaController::class, 'show'])->name('neraca/show');
Route::get('/neraca/{id}/edit', [App\Http\Controllers\NeracaController::class, 'edit'])->name('neraca/edit');
Route::put('/neraca/{id}', [App\Http\Controllers\NeracaController::class, 'update'])->name('neraca/update');
// neraca

// top
Route::get('/top', [App\Http\Controllers\TopController::class, 'index'])->name('top');
Route::get('/top/create', [App\Http\Controllers\TopController::class, 'create'])->name('top/create');
Route::post('/top/store', [App\Http\Controllers\TopController::class, 'store'])->name('top/store');

Route::delete('/top/{id}', [App\Http\Controllers\TopController::class, 'destroy']);
Route::get('/top/{id}/show', [App\Http\Controllers\TopController::class, 'show'])->name('top/show');
Route::get('/top/{id}/edit', [App\Http\Controllers\TopController::class, 'edit'])->name('top/edit');
Route::put('/top/{id}', [App\Http\Controllers\TopController::class, 'update'])->name('top/update');

// top

// vendor
Route::get('/vendor', [App\Http\Controllers\VendorController::class, 'index'])->name('vendor');
Route::get('/vendor/create', [App\Http\Controllers\VendorController::class, 'create'])->name('vendor/create');
Route::post('/vendor/store', [App\Http\Controllers\VendorController::class, 'store'])->name('vendor/store');

Route::delete('/vendor/{id}', [App\Http\Controllers\VendorController::class, 'destroy']);
Route::get('/vendor/{id}/show', [App\Http\Controllers\VendorController::class, 'show'])->name('vendor/show');
Route::get('/vendor/{id}/edit', [App\Http\Controllers\VendorController::class, 'edit'])->name('vendor/edit');
Route::put('/vendor/{id}', [App\Http\Controllers\VendorController::class, 'update'])->name('vendor/update');

// vendor

//dokumen referensi
Route::get('/dokumenreferensi', [App\Http\Controllers\DokumenReferensiController::class, 'index'])->name('dokumenreferensi');
Route::get('/dokumenreferensi/create', [App\Http\Controllers\DokumenReferensiController::class, 'create'])->name('dokumenreferensi/create');
Route::post('/dokumenreferensi/store', [App\Http\Controllers\DokumenReferensiController::class, 'store'])->name('dokumenreferensi/store');

Route::delete('/dokumenreferensi/{id}', [App\Http\Controllers\DokumenReferensiController::class, 'destroy']);
Route::get('/dokumenreferensi/{id}/show', [App\Http\Controllers\DokumenReferensiController::class, 'show'])->name('dokumenreferensi/show');
Route::get('/dokumenreferensi/{id}/edit', [App\Http\Controllers\DokumenReferensiController::class, 'edit'])->name('dokumenreferensi/edit');
Route::put('/dokumenreferensi/{id}', [App\Http\Controllers\DokumenReferensiController::class, 'update'])->name('dokumenreferensi/update');
// //dokumen referensi

// billing
Route::get('/billing', [App\Http\Controllers\BillingController::class, 'index'])->name('billing');
Route::get('/billing/create', [App\Http\Controllers\BillingController::class, 'create'])->name('billing/create');
Route::post('/billing/store', [App\Http\Controllers\BillingController::class, 'store'])->name('billing/store');

Route::delete('/billing/{id}', [App\Http\Controllers\BillingController::class, 'destroy']);
Route::get('/billing/{id}/show', [App\Http\Controllers\BillingController::class, 'show'])->name('billing/show');
Route::get('/billing/{id}/edit', [App\Http\Controllers\BillingController::class, 'edit'])->name('billing/edit');
Route::put('/billing/{id}', [App\Http\Controllers\BillingController::class, 'update'])->name('billing/update');
// billing

// ptkp
Route::get('/ptkp', [App\Http\Controllers\PtkpController::class, 'index'])->name('ptkp');
Route::get('/ptkp/create', [App\Http\Controllers\PtkpController::class, 'create'])->name('ptkp/create');
Route::post('/ptkp/store', [App\Http\Controllers\PtkpController::class, 'store'])->name('ptkp/store');

Route::delete('/ptkp/{id}', [App\Http\Controllers\PtkpController::class, 'destroy']);
Route::get('/ptkp/{id}/show', [App\Http\Controllers\PtkpController::class, 'show'])->name('ptkp/show');
Route::get('/ptkp/{id}/edit', [App\Http\Controllers\PtkpController::class, 'edit'])->name('ptkp/edit');
Route::put('/ptkp/{id}', [App\Http\Controllers\PtkpController::class, 'update'])->name('ptkp/update');

// ptkp
// ALL IN ONE
Route::get('/dokref', [App\Http\Controllers\AllInController::class,'dokrefindex'])->name('get.dokref');

// ALL IN ONE

