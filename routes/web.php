<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/adminregister/create', [App\Http\Controllers\AdminRegisterController::class, 'create'])->name('adminregister');
Route::post('/adminregister/store', [App\Http\Controllers\AdminRegisterController::class, 'store'])->name('adminregister/store');
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

// prepopulate
Route::get('/prepopulates', [App\Http\Controllers\PrepopulateController::class, 'index'])->name('prepopulates');
Route::get('/prepopulates/create', [App\Http\Controllers\PrepopulateController::class, 'create'])->name('prepopulates/create');
Route::post('/prepopulates/store', [App\Http\Controllers\PrepopulateController::class, 'store'])->name('prepopulates/store');

Route::delete('/prepopulates/{id}', [App\Http\Controllers\PrepopulateController::class, 'destroy']);
Route::get('/prepopulates/{id}/show', [App\Http\Controllers\PrepopulateController::class, 'show'])->name('prepopulates/show');
Route::get('/prepopulates/{id}/edit', [App\Http\Controllers\PrepopulateController::class, 'edit'])->name('prepopulates/edit');
Route::put('/prepopulates/{id}', [App\Http\Controllers\PrepopulateController::class, 'update'])->name('prepopulates/update');
// prepopulate

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

// pembayaran
Route::get('/pembayaran', [App\Http\Controllers\PembayaranController::class, 'index'])->name('pembayaran');
Route::post('/pembayaran/show', [App\Http\Controllers\PembayaranController::class, 'show'])->name('pembayaran/show');
// pembayaran

// hutangppn
Route::get('/hutangppn', [App\Http\Controllers\HutangPpnController::class, 'index'])->name('hutangppn');
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
Route::get('/pphList', [App\Http\Controllers\AllInController::class,'listPph'])->name('data.pph');
Route::get('/fiskalList', [App\Http\Controllers\AllInController::class,'listFiskal'])->name('data.fiskal');
Route::get('/prepopulate', [App\Http\Controllers\AllInController::class,'listPrepopulate'])->name('data.prepopulate');
Route::get('/ebilling', [App\Http\Controllers\AllInController::class,'listBilling'])->name('data.billing');
// SEARCH
Route::get('/search/resultPtkp', [App\Http\Controllers\AllInController::class,'resultPtkp'])->name('get.ptkp');
Route::get('/search/resultNoakun', [App\Http\Controllers\AllInController::class,'akun_kredit'])->name('get.nokredit');
Route::get('/search/resultnamadebit', [App\Http\Controllers\AllInController::class,'nama_debit'])->name('get.namadebit');
Route::get('/search/resultnamakreditfirst', [App\Http\Controllers\AllInController::class,'nama_kreditpertama'])->name('get.namakreditfirst');
Route::get('/search/resultnamakredit', [App\Http\Controllers\AllInController::class,'nama_kredit'])->name('get.namakredit');
Route::get('/search/pphduapuluhsatu', [App\Http\Controllers\AllInController::class,'indexpphduasatu']);
Route::get('/search/akun', [App\Http\Controllers\AllInController::class,'cariakun'])->name('get.akun');
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
