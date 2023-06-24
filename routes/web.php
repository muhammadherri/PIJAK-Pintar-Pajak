<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('categories/create');
Route::post('/categories/store', [App\Http\Controllers\CategoriesController::class, 'store'])->name('categories/store');
Route::delete('/categories/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy']);
Route::get('/categories/{id}/show', [App\Http\Controllers\CategoriesController::class, 'show'])->name('categories/show');
Route::put('/categories/{id}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('categories/update');

Route::get('/categorypengeluaran', [App\Http\Controllers\CategoriesPengeluaranController::class, 'index'])->name('categorypengeluaran');
Route::get('/categorypengeluaran/create', [App\Http\Controllers\CategoriesPengeluaranController::class, 'create'])->name('categorypengeluaran/create');
Route::delete('/categorypengeluaran/{id}', [App\Http\Controllers\CategoriesPengeluaranController::class, 'destroy']);
Route::get('/categorypengeluaran/{id}/show', [App\Http\Controllers\CategoriesPengeluaranController::class, 'show'])->name('categorypengeluaran/show');
Route::put('/categorypengeluaran/{id}', [App\Http\Controllers\CategoriesPengeluaranController::class, 'update'])->name('categorypengeluaran/update');
Route::post('/categorypengeluaran/store', [App\Http\Controllers\CategoriesPengeluaranController::class, 'store'])->name('categorypengeluaran/store');

Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi');
Route::delete('/transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'destroy']);
Route::get('/transaksi/create', [App\Http\Controllers\TransaksiController::class, 'create'])->name('transaksi/create');
Route::get('/transaksi/{id}/show', [App\Http\Controllers\TransaksiController::class, 'show'])->name('transaksi/show');
Route::put('/transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'update'])->name('transaksi/update');
Route::post('/transaksi/store', [App\Http\Controllers\TransaksiController::class, 'store'])->name('transaksi/store');
Route::post('/transaksi/filter', [App\Http\Controllers\TransaksiController::class, 'filter'])->name('transaksi/filter');

