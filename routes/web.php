<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\JasaController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('beranda');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/profil/dokumen', [PageController::class, 'dokumen'])->name('dokumen');
Route::get('/layanan/produk', [PageController::class, 'produk'])->name('produk');
Route::get('/layanan/jasa', [PageController::class, 'jasa'])->name('jasa');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PageController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

Auth::routes();

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');

    Route::get('/jasa', [JasaController::class, 'index'])->name('jasa');
    Route::post('/jasa', [JasaController::class, 'store'])->name('jasa.store');
    Route::put('/jasa/{id}', [JasaController::class, 'update'])->name('jasa.update');
    Route::delete('/jasa/{id}', [JasaController::class, 'destroy'])->name('jasa.delete');

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/create', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.delete');
});
