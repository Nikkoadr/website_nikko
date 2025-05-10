<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('cv', [PageController::class, 'cv'])->name('cv');

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('dokter', DokterController::class);
Route::resource('barang', BarangController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('buku', BukuController::class);

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/tentang', [BlogController::class, 'tentang']);
Route::get('/blog/kontak', [BlogController::class, 'kontak']);
