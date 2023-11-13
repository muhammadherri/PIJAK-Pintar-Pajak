<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/adminregister', [App\Http\Controllers\AdminRegisterController::class, 'index'])->name('adminregister');
Route::get('/adminregister/create', [App\Http\Controllers\AdminRegisterController::class, 'create'])->name('adminregister/create');
Route::post('/adminregister/store', [App\Http\Controllers\AdminRegisterController::class, 'store'])->name('adminregister/store');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('');
Route::get('/registers', [App\Http\Controllers\RegisterNewController::class, 'create'])->name('registers');
// transaksipph21
Route::get('/transaksipph21', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'index'])->name('transaksipph21');
Route::get('/transaksipph21/create', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'create'])->name('transaksipph21/create');
Route::post('/transaksipph21/store', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'store'])->name('transaksipph21/store');

Route::get('/transaksipph21/{id}/destroy', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'destroy']);
Route::get('/transaksipph21/{id}/show', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'show'])->name('transaksipph21/show');
Route::get('/transaksipph21/{id}/edit', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'edit'])->name('transaksipph21/edit');
Route::put('/transaksipph21/{id}', [App\Http\Controllers\TransaksipphduapuluhsatuController::class, 'update'])->name('transaksipph21/update');
// transaksipph21

// transaksipph22
Route::get('/ebupot', [App\Http\Controllers\EbupotController::class, 'index'])->name('ebupot');
Route::get('/ebupot/create', [App\Http\Controllers\EbupotController::class, 'create'])->name('ebupot/create');
Route::post('/ebupot/store', [App\Http\Controllers\EbupotController::class, 'store'])->name('ebupot/store');

Route::get('/ebupot/{id}/destroy', [App\Http\Controllers\EbupotController::class, 'destroy']);
Route::get('/ebupot/{id}/show', [App\Http\Controllers\EbupotController::class, 'show'])->name('ebupot/show');
Route::get('/ebupot/{id}/edit', [App\Http\Controllers\EbupotController::class, 'edit'])->name('ebupot/edit');
Route::put('/ebupot/{id}', [App\Http\Controllers\EbupotController::class, 'update'])->name('ebupot/update');

// transaksipph22

// invoice
Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice');
Route::get('/invoice/create', [App\Http\Controllers\InvoiceController::class, 'create'])->name('invoice/create');
Route::post('/invoice/store', [App\Http\Controllers\InvoiceController::class, 'store'])->name('invoice/store');

Route::get('/invoice/{id}/destroy', [App\Http\Controllers\InvoiceController::class, 'destroy'])->name('invoice/destroy');
Route::get('/invoice/{id}/show', [App\Http\Controllers\InvoiceController::class, 'show'])->name('invoice/show');
Route::get('/invoice/{id}/edit', [App\Http\Controllers\InvoiceController::class, 'edit'])->name('invoice/edit');
Route::put('/invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'update'])->name('invoice/update');

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

//akunlatihan
Route::get('/latihankeuangan', [App\Http\Controllers\AkunLatihanController::class, 'index'])->name('latihankeuangan');
Route::get('/latihankeuangan/create', [App\Http\Controllers\AkunLatihanController::class, 'create'])->name('latihankeuangan/create');
Route::post('/latihankeuangan/store', [App\Http\Controllers\AkunLatihanController::class, 'store'])->name('latihankeuangan/store');

Route::delete('/latihankeuangan/{id}', [App\Http\Controllers\AkunLatihanController::class, 'destroy']);
Route::get('/latihankeuangan/{id}/show', [App\Http\Controllers\AkunLatihanController::class, 'show'])->name('latihankeuangan/show');
Route::get('/latihankeuangan/{id}/edit', [App\Http\Controllers\AkunLatihanController::class, 'edit'])->name('latihankeuangan/edit');
Route::put('/latihankeuangan/{id}', [App\Http\Controllers\AkunLatihanController::class, 'update'])->name('latihankeuangan/update');
//akunlatihan
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

Route::get('/billing/{id}/destroy', [App\Http\Controllers\BillingController::class, 'destroy']);
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

// penandatanganan
Route::get('/penandatanganan', [App\Http\Controllers\PenandatangananController::class, 'index'])->name('penandatanganan');
Route::get('/penandatanganan/create', [App\Http\Controllers\PenandatangananController::class, 'create'])->name('penandatanganan/create');
Route::post('/penandatanganan/store', [App\Http\Controllers\PenandatangananController::class, 'store'])->name('penandatanganan/store');

Route::delete('/penandatanganan/{id}', [App\Http\Controllers\PenandatangananController::class, 'destroy']);
Route::get('/penandatanganan/{id}/show', [App\Http\Controllers\PenandatangananController::class, 'show'])->name('penandatanganan/show');
Route::get('/penandatanganan/{id}/edit', [App\Http\Controllers\PenandatangananController::class, 'edit'])->name('penandatanganan/edit');
Route::put('/penandatanganan/{id}', [App\Http\Controllers\PenandatangananController::class, 'update'])->name('penandatanganan/update');
// penandatanganan

// jenis pph
Route::get('/jenispph', [App\Http\Controllers\JenisPphController::class, 'index'])->name('jenispph');
Route::get('/jenispph/create', [App\Http\Controllers\JenisPphController::class, 'create'])->name('jenispph/create');
Route::post('/jenispph/store', [App\Http\Controllers\JenisPphController::class, 'store'])->name('jenispph/store');

Route::delete('/jenispph/{id}', [App\Http\Controllers\JenisPphController::class, 'destroy']);
Route::get('/jenispph/{id}/show', [App\Http\Controllers\JenisPphController::class, 'show'])->name('jenispph/show');
Route::get('/jenispph/{id}/edit', [App\Http\Controllers\JenisPphController::class, 'edit'])->name('jenispph/edit');
Route::put('/jenispph/{id}', [App\Http\Controllers\JenisPphController::class, 'update'])->name('jenispph/update');
// jenis pph

// nomorseri
Route::get('/noseri', [App\Http\Controllers\NoSeriController::class, 'index'])->name('noseri');
Route::get('/noseri/create', [App\Http\Controllers\NoSeriController::class, 'create'])->name('noseri/create');
Route::post('/noseri/store', [App\Http\Controllers\NoSeriController::class, 'store'])->name('noseri/store');

Route::delete('/noseri/{id}', [App\Http\Controllers\NoSeriController::class, 'destroy']);
Route::get('/noseri/{id}/show', [App\Http\Controllers\NoSeriController::class, 'show'])->name('noseri/show');
Route::get('/noseri/{id}/edit', [App\Http\Controllers\NoSeriController::class, 'edit'])->name('noseri/edit');
Route::put('/noseri/{id}', [App\Http\Controllers\NoSeriController::class, 'update'])->name('noseri/update');

// nomorseri

// prepopulate
Route::get('/prepopulates', [App\Http\Controllers\PrepopulateController::class, 'index'])->name('prepopulates');
Route::get('/prepopulates/create', [App\Http\Controllers\PrepopulateController::class, 'create'])->name('prepopulates/create');
Route::post('/prepopulates/store', [App\Http\Controllers\PrepopulateController::class, 'store'])->name('prepopulates/store');

Route::get('/prepopulates/{id}/destroy', [App\Http\Controllers\PrepopulateController::class, 'destroy'])->name('prepopulates/destroy');
Route::delete('/prepopulates/{id}', [App\Http\Controllers\PrepopulateController::class, 'destroy']);
Route::get('/prepopulates/{id}/show', [App\Http\Controllers\PrepopulateController::class, 'show'])->name('prepopulates/show');
Route::get('/prepopulates/{id}/edit', [App\Http\Controllers\PrepopulateController::class, 'edit'])->name('prepopulates/edit');
Route::put('/prepopulates/{id}', [App\Http\Controllers\PrepopulateController::class, 'update'])->name('prepopulates/update');
// prepopulate

// kelas
Route::get('/namakelas', [App\Http\Controllers\NamaKelasController::class, 'index'])->name('namakelas');
Route::get('/namakelas/create', [App\Http\Controllers\NamaKelasController::class, 'create'])->name('namakelas/create');
Route::post('/namakelas/store', [App\Http\Controllers\NamaKelasController::class, 'store'])->name('namakelas/store');

Route::get('/namakelas/{id}/destroy', [App\Http\Controllers\NamaKelasController::class, 'destroy'])->name('namakelas/destroy');
Route::delete('/namakelas/{id}', [App\Http\Controllers\NamaKelasController::class, 'destroy']);
Route::get('/namakelas/{id}/show', [App\Http\Controllers\NamaKelasController::class, 'show'])->name('namakelas/show');
Route::get('/namakelas/{id}/edit', [App\Http\Controllers\NamaKelasController::class, 'edit'])->name('namakelas/edit');
Route::put('/namakelas/{id}', [App\Http\Controllers\NamaKelasController::class, 'update'])->name('namakelas/update');
// kelas
// listmahasiswa
Route::get('/mahasiswa/{id}/show', [App\Http\Controllers\MahasiswaController::class, 'show'])->name('mahasiswa/show');
// listmahasiswa

// jurnalmanual
Route::get('/jurnalmanual', [App\Http\Controllers\JurnalManualController::class, 'index'])->name('jurnalmanual');
Route::get('/jurnalmanual/create', [App\Http\Controllers\JurnalManualController::class, 'create'])->name('jurnalmanual/create');
Route::post('/jurnalmanual/store', [App\Http\Controllers\JurnalManualController::class, 'store'])->name('jurnalmanual/store');

Route::get('/jurnalmanual/{id}/destroy', [App\Http\Controllers\JurnalManualController::class, 'destroy'])->name('jurnalmanual/destroy');
Route::get('/jurnalmanual/{id}/show', [App\Http\Controllers\JurnalManualController::class, 'show'])->name('jurnalmanual/show');
Route::get('/jurnalmanual/{id}/edit', [App\Http\Controllers\JurnalManualController::class, 'edit'])->name('jurnalmanual/edit');
Route::put('/jurnalmanual/{id}', [App\Http\Controllers\JurnalManualController::class, 'update'])->name('jurnalmanual/update');
// jurnalmanual

// jurnalmanualLatihan
Route::get('/latihan', [App\Http\Controllers\JurnalManualLatihanController::class, 'index'])->name('latihan');
Route::get('/latihan/create', [App\Http\Controllers\JurnalManualLatihanController::class, 'create'])->name('latihan/create');
Route::post('/latihan/store', [App\Http\Controllers\JurnalManualLatihanController::class, 'store'])->name('latihan/store');

Route::get('/latihan/{id}/destroy', [App\Http\Controllers\JurnalManualLatihanController::class, 'destroy'])->name('latihan/destroy');
Route::get('/latihan/{id}/show', [App\Http\Controllers\JurnalManualLatihanController::class, 'show'])->name('latihan/show');
Route::get('/latihan/{id}/edit', [App\Http\Controllers\JurnalManualLatihanController::class, 'edit'])->name('latihan/edit');
Route::put('/latihan/{id}', [App\Http\Controllers\JurnalManualLatihanController::class, 'update'])->name('latihan/update');
// jurnalmanualLatihan

// sptppn
Route::get('/sptPPN', [App\Http\Controllers\SptPpnController::class, 'index'])->name('sptPPN');
Route::get('/sptPPN/create', [App\Http\Controllers\SptPpnController::class, 'create'])->name('sptPPN/create');
Route::post('/sptPPN/store', [App\Http\Controllers\SptPpnController::class, 'store'])->name('sptPPN/store');

Route::get('/sptPPN/{id}/destroy', [App\Http\Controllers\SptPpnController::class, 'destroy'])->name('sptPPN/destroy');
Route::get('/sptPPN/{id}/show', [App\Http\Controllers\SptPpnController::class, 'show'])->name('sptPPN/show');
Route::get('/sptPPN/{id}/edit', [App\Http\Controllers\SptPpnController::class, 'edit'])->name('sptPPN/edit');
Route::put('/sptPPN/{id}', [App\Http\Controllers\SptPpnController::class, 'update'])->name('sptPPN/update');
// sptppn

// spt1770s
Route::get('/sptS', [App\Http\Controllers\Spt1770SController::class, 'index'])->name('sptS');
Route::get('/sptS/create', [App\Http\Controllers\Spt1770SController::class, 'create'])->name('sptS/create');
Route::post('/sptS/store', [App\Http\Controllers\Spt1770SController::class, 'store'])->name('sptS/store');

Route::get('/sptS/{id}/destroy', [App\Http\Controllers\Spt1770SController::class, 'destroy'])->name('sptS/destroy');
Route::get('/sptS/{id}/show', [App\Http\Controllers\Spt1770SController::class, 'show'])->name('sptS/show');
Route::get('/sptS/{id}/edit', [App\Http\Controllers\Spt1770SController::class, 'edit'])->name('sptS/edit');
Route::put('/sptS/{id}', [App\Http\Controllers\Spt1770SController::class, 'update'])->name('sptS/update');
// spt1770s

// spt1770ss
Route::get('/sptSS', [App\Http\Controllers\Spt1770SSController::class, 'index'])->name('sptSS');
Route::get('/sptSS/create', [App\Http\Controllers\Spt1770SSController::class, 'create'])->name('sptSS/create');
Route::post('/sptSS/store', [App\Http\Controllers\Spt1770SSController::class, 'store'])->name('sptSS/store');

Route::get('/sptSS/{id}/destroy', [App\Http\Controllers\Spt1770SSController::class, 'destroy'])->name('sptSS/destroy');
Route::get('/sptSS/{id}/show', [App\Http\Controllers\Spt1770SSController::class, 'show'])->name('sptSS/show');
Route::get('/sptSS/{id}/edit', [App\Http\Controllers\Spt1770SSController::class, 'edit'])->name('sptSS/edit');
Route::put('/sptSS/{id}', [App\Http\Controllers\Spt1770SSController::class, 'update'])->name('sptSS/update');
// spt1770ss

// spttahunan
Route::get('/spttahunan', [App\Http\Controllers\SptTahunanController::class, 'index'])->name('spttahunan');
Route::get('/spttahunan/create', [App\Http\Controllers\SptTahunanController::class, 'create'])->name('spttahunan/create');
Route::post('/spttahunan/store', [App\Http\Controllers\SptTahunanController::class, 'store'])->name('spttahunan/store');

Route::get('/spttahunan/{id}/destroy', [App\Http\Controllers\SptTahunanController::class, 'destroy'])->name('spttahunan/destroy');
Route::get('/spttahunan/{id}/show', [App\Http\Controllers\SptTahunanController::class, 'show'])->name('spttahunan/show');
Route::get('/spttahunan/{id}/edit', [App\Http\Controllers\SptTahunanController::class, 'edit'])->name('spttahunan/edit');
Route::put('/spttahunan/{id}', [App\Http\Controllers\SptTahunanController::class, 'update'])->name('spttahunan/update');
// spttahunan

// spt1721
Route::get('/sptmasapajak', [App\Http\Controllers\SptMasaPajakPenghasilanController::class, 'index'])->name('sptmasapajak');
Route::get('/sptmasapajak/create', [App\Http\Controllers\SptMasaPajakPenghasilanController::class, 'create'])->name('sptmasapajak/create');
Route::post('/sptmasapajak/store', [App\Http\Controllers\SptMasaPajakPenghasilanController::class, 'store'])->name('sptmasapajak/store');

Route::get('/sptmasapajak/{id}/destroy', [App\Http\Controllers\SptMasaPajakPenghasilanController::class, 'destroy'])->name('sptmasapajak/destroy');
Route::get('/sptmasapajak/{id}/show', [App\Http\Controllers\SptMasaPajakPenghasilanController::class, 'show'])->name('sptmasapajak/show');
Route::get('/sptmasapajak/{id}/edit', [App\Http\Controllers\SptMasaPajakPenghasilanController::class, 'edit'])->name('sptmasapajak/edit');
Route::put('/sptmasapajak/{id}', [App\Http\Controllers\SptMasaPajakPenghasilanController::class, 'update'])->name('sptmasapajak/update');
// spt1721

// pphfinal
Route::get('/pphfinal', [App\Http\Controllers\PphFinalController::class, 'index'])->name('pphfinal');
Route::get('/pphfinal/create', [App\Http\Controllers\PphFinalController::class, 'create'])->name('pphfinal/create');
Route::post('/pphfinal/store', [App\Http\Controllers\PphFinalController::class, 'store'])->name('pphfinal/store');

Route::get('/pphfinal/{id}/destroy', [App\Http\Controllers\PphFinalController::class, 'destroy'])->name('pphfinal/destroy');
Route::get('/pphfinal/{id}/show', [App\Http\Controllers\PphFinalController::class, 'show'])->name('pphfinal/show');
Route::get('/pphfinal/{id}/edit', [App\Http\Controllers\PphFinalController::class, 'edit'])->name('pphfinal/edit');
Route::put('/pphfinal/{id}', [App\Http\Controllers\PphFinalController::class, 'update'])->name('pphfinal/update');
// pphfinal

// pphtidakfinal
Route::get('/pphtidakfinal', [App\Http\Controllers\PphTidakFinalController::class, 'index'])->name('pphtidakfinal');
Route::get('/pphtidakfinal/create', [App\Http\Controllers\PphTidakFinalController::class, 'create'])->name('pphtidakfinal/create');
Route::post('/pphtidakfinal/store', [App\Http\Controllers\PphTidakFinalController::class, 'store'])->name('pphtidakfinal/store');

Route::get('/pphtidakfinal/{id}/destroy', [App\Http\Controllers\PphTidakFinalController::class, 'destroy'])->name('pphtidakfinal/destroy');
Route::get('/pphtidakfinal/{id}/show', [App\Http\Controllers\PphTidakFinalController::class, 'show'])->name('pphtidakfinal/show');
Route::get('/pphtidakfinal/{id}/edit', [App\Http\Controllers\PphTidakFinalController::class, 'edit'])->name('pphtidakfinal/edit');
Route::put('/pphtidakfinal/{id}', [App\Http\Controllers\PphTidakFinalController::class, 'update'])->name('pphtidakfinal/update');
// pphtidakfinal

// penerimapenghasilan
Route::get('/penerimapenghasilan', [App\Http\Controllers\PenerimaHasilController::class, 'index'])->name('penerimapenghasilan');
Route::get('/penerimapenghasilan/create', [App\Http\Controllers\PenerimaHasilController::class, 'create'])->name('penerimapenghasilan/create');
Route::post('/penerimapenghasilan/store', [App\Http\Controllers\PenerimaHasilController::class, 'store'])->name('penerimapenghasilan/store');

Route::get('/penerimapenghasilan/{id}/destroy', [App\Http\Controllers\PenerimaHasilController::class, 'destroy'])->name('penerimapenghasilan/destroy');
Route::get('/penerimapenghasilan/{id}/show', [App\Http\Controllers\PenerimaHasilController::class, 'show'])->name('penerimapenghasilan/show');
Route::get('/penerimapenghasilan/{id}/edit', [App\Http\Controllers\PenerimaHasilController::class, 'edit'])->name('penerimapenghasilan/edit');
Route::put('/penerimapenghasilan/{id}', [App\Http\Controllers\PenerimaHasilController::class, 'update'])->name('penerimapenghasilan/update');
// penerimapenghasilan

// jenispajak
Route::get('/jenis_pajak', [App\Http\Controllers\JenisPajakController::class, 'index'])->name('jenis_pajak');
Route::get('/jenis_pajak/create', [App\Http\Controllers\JenisPajakController::class, 'create'])->name('jenis_pajak/create');
Route::post('/jenis_pajak/store', [App\Http\Controllers\JenisPajakController::class, 'store'])->name('jenis_pajak/store');

Route::get('/jenis_pajak/{id}/destroy', [App\Http\Controllers\JenisPajakController::class, 'destroy'])->name('jenis_pajak/destroy');
Route::get('/jenis_pajak/{id}/show', [App\Http\Controllers\JenisPajakController::class, 'show'])->name('jenis_pajak/show');
Route::get('/jenis_pajak/{id}/edit', [App\Http\Controllers\JenisPajakController::class, 'edit'])->name('jenis_pajak/edit');
Route::put('/jenis_pajak/{id}', [App\Http\Controllers\JenisPajakController::class, 'update'])->name('jenis_pajak/update');

// jenispajak

// pembayaran
Route::get('/pembayaran', [App\Http\Controllers\PembayaranController::class, 'index'])->name('pembayaran');
Route::post('/pembayaran/show', [App\Http\Controllers\PembayaranController::class, 'show'])->name('pembayaran/show');
// pembayaran

// hutangppn
Route::get('/hutangppn', [App\Http\Controllers\HutangPpnController::class, 'index'])->name('hutangppn');
Route::get('/hutangppn/create', [App\Http\Controllers\HutangPpnController::class, 'create'])->name('hutangppn/create');
Route::post('/hutangppn/store', [App\Http\Controllers\HutangPpnController::class, 'store'])->name('hutangppn/store');

// hutangppn

// laporan
Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');
Route::get('/laporankeuanganfiskal', [App\Http\Controllers\LaporanController::class, 'laporankeuanganfiskal'])->name('laporankeuanganfiskal');
Route::get('/laporankeuangankomersil', [App\Http\Controllers\LaporanController::class, 'laporankeuangankomersil'])->name('laporankeuangankomersil');
Route::get('/laporankeuanganlabarugikomersil', [App\Http\Controllers\LaporanController::class, 'laporankeuanganlabarugikomersil'])->name('laporankeuanganlabarugikomersil');
Route::get('/laporankeuanganlabarugifiskal', [App\Http\Controllers\LaporanController::class, 'laporankeuanganlabarugifiskal'])->name('laporankeuanganlabarugifiskal');
// laporan

// ALL IN ONE
Route::get('/dokref', [App\Http\Controllers\AllInController::class,'dokrefindex'])->name('get.dokref');
Route::get('/mahasiswaList', [App\Http\Controllers\AllInController::class,'listMahasiswa'])->name('data.mahasiswa');
Route::get('/invList', [App\Http\Controllers\AllInController::class,'listInvoice'])->name('data.inv');
Route::get('/bupotList', [App\Http\Controllers\AllInController::class,'listBupot'])->name('data.ebupot');
Route::get('/list1771', [App\Http\Controllers\AllInController::class,'listSpt1771'])->name('data.1771');
Route::get('/list1721', [App\Http\Controllers\AllInController::class,'listSpt1721'])->name('data.1721');
Route::get('/listPPN', [App\Http\Controllers\AllInController::class,'listSptPPN'])->name('data.sptppn');
Route::get('/pphList', [App\Http\Controllers\AllInController::class,'listPph'])->name('data.pph');
Route::get('/fiskalList', [App\Http\Controllers\AllInController::class,'listFiskal'])->name('data.fiskal');
Route::get('/latihanList', [App\Http\Controllers\AllInController::class,'listLatihan'])->name('data.latihan');
Route::get('/prepopulate', [App\Http\Controllers\AllInController::class,'listPrepopulate'])->name('data.prepopulate');
Route::get('/ebilling', [App\Http\Controllers\AllInController::class,'listBilling'])->name('data.billing');
Route::get('/hutangppnlist', [App\Http\Controllers\AllInController::class,'listHutangppn'])->name('data.hutangppn');
Route::get('/sptppnlist', [App\Http\Controllers\AllInController::class,'listSpt1111'])->name('data.spt1111');
Route::get('/pphfinallist', [App\Http\Controllers\AllInController::class,'listPphfinal'])->name('data.pphfinal');
Route::get('/pphtidakfinallist', [App\Http\Controllers\AllInController::class,'listPphtidakfinal'])->name('data.pphtidakfinal');
Route::get('/spt1770sllist', [App\Http\Controllers\AllInController::class,'listspt1770s'])->name('data.spt1770s');
Route::get('/spt1770ssllist', [App\Http\Controllers\AllInController::class,'listspt1770ss'])->name('data.spt1770ss');
Route::get('/listDosen', [App\Http\Controllers\AllInController::class,'listDosen'])->name('data.dosen');
// SEARCH
Route::get('/search/resultPtkp', [App\Http\Controllers\AllInController::class,'resultPtkp'])->name('get.ptkp');
Route::get('/search/resultNoakun', [App\Http\Controllers\AllInController::class,'akun_kredit'])->name('get.nokredit');
Route::get('/search/resultnamadebit', [App\Http\Controllers\AllInController::class,'nama_debit'])->name('get.namadebit');
Route::get('/search/resultnamakreditfirst', [App\Http\Controllers\AllInController::class,'nama_kreditpertama'])->name('get.namakreditfirst');
Route::get('/search/resultnamakredit', [App\Http\Controllers\AllInController::class,'nama_kredit'])->name('get.namakredit');
Route::get('/search/pphduapuluhsatu', [App\Http\Controllers\AllInController::class,'indexpphduasatu']);
Route::get('/search/akun', [App\Http\Controllers\AllInController::class,'cariakun'])->name('get.akun');
Route::get('/latihankeuanganfiskal', [App\Http\Controllers\AllInController::class,'latihankeuanganfiskal'])->name('latihankeuanganfiskal');
Route::get('/latihankeuanganlabarugifiskal', [App\Http\Controllers\AllInController::class,'latihankeuanganlabarugifiskal'])->name('latihankeuanganlabarugifiskal');
Route::get('/latihankeuangankomersil', [App\Http\Controllers\AllInController::class,'latihankeuangankomersil'])->name('latihankeuangankomersil');
Route::get('/latihankeuanganlabarugikomersil', [App\Http\Controllers\AllInController::class,'latihankeuanganlabarugikomersil'])->name('latihankeuanganlabarugikomersil');
Route::get('/search/resultNoakunlatihan', [App\Http\Controllers\AllInController::class,'latihanakun_kredit'])->name('get.latihannokredit');
Route::get('/search/resultnamadebitlatihan', [App\Http\Controllers\AllInController::class,'latihannama_debit'])->name('get.latihannamadebit');
Route::get('/search/resultnamakreditfirstlatihan', [App\Http\Controllers\AllInController::class,'latihannama_kreditpertama'])->name('get.latihannamakreditfirst');
Route::get('/search/resultnamakreditlatihan', [App\Http\Controllers\AllInController::class,'latihannama_kredit'])->name('get.latihannamakredit');
// ALL IN ONE
Route::post('/pembayaranpdf', [App\Http\Controllers\PDFController::class,'pembarayanPDF']);
Route::post('/printpdflabarugifiskal', [App\Http\Controllers\PDFController::class,'labarugifiskalPDF']);
Route::post('/printpdfneracafiskal', [App\Http\Controllers\PDFController::class,'neracafiskalPDF']);

Route::post('/formulirpertama', [App\Http\Controllers\AllInController::class,'formulirpertama']);
Route::post('/formulirkedua', [App\Http\Controllers\AllInController::class,'formulirkedua']);
Route::post('/formulirketiga', [App\Http\Controllers\AllInController::class,'formulirketiga']);
Route::post('/formulirkeempat', [App\Http\Controllers\AllInController::class,'formulirkeempat']);
Route::post('/formulirkelima', [App\Http\Controllers\AllInController::class,'formulirkelima']);
Route::post('/formulirkeenam', [App\Http\Controllers\AllInController::class,'formulirkeenam']);

Route::post('/masanext', [App\Http\Controllers\AllInController::class,'masanext']);
Route::post('/masapertama', [App\Http\Controllers\AllInController::class,'masapertama']);
Route::post('/masakedua', [App\Http\Controllers\AllInController::class,'masakedua']);
Route::post('/masaketiga', [App\Http\Controllers\AllInController::class,'masaketiga']);
Route::post('/masakeempat', [App\Http\Controllers\AllInController::class,'masakeempat']);
Route::post('/masakelima', [App\Http\Controllers\AllInController::class,'masakelima']);
Route::post('/masakeenam', [App\Http\Controllers\AllInController::class,'masakeenam']);
Route::post('/masaketujuh', [App\Http\Controllers\AllInController::class,'masaketujuh']);
Route::post('/masakeasatu', [App\Http\Controllers\AllInController::class,'masakeasatu']);
Route::post('/masakeadua', [App\Http\Controllers\AllInController::class,'masakeadua']);

Route::post('/formulirAB', [App\Http\Controllers\AllInController::class,'formulirAB']);
Route::post('/formulirA1', [App\Http\Controllers\AllInController::class,'formulirA1']);
Route::post('/formulirA2', [App\Http\Controllers\AllInController::class,'formulirA2']);
Route::post('/formulirB1', [App\Http\Controllers\AllInController::class,'formulirB1']);
Route::post('/formulirB2', [App\Http\Controllers\AllInController::class,'formulirB2']);
Route::post('/formulirB3', [App\Http\Controllers\AllInController::class,'formulirB3']);
