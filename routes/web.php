<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SekolahController;
use Illuminate\Support\Facades\Route;

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

// --- Rute Publik (Tidak Membutuhkan Login) ---

// Rute utama akan mengarah ke halaman WebGIS/Peta
Route::get('/', [MapController::class, 'index'])->name('map.index');

// Rute untuk mendapatkan data sekolah dalam format GeoJSON untuk peta
Route::get('/map-data', [MapController::class, 'data'])->name('map.data');

// Rute untuk menampilkan halaman data tabel sekolah
Route::get('/data-tabel', [SekolahController::class, 'index'])->name('sekolah.table');


// --- Rute yang Membutuhkan Autentikasi (Setelah Login) ---

// Rute Dashboard
Route::get('/dashboard', function () {
    return view('dashboard'); // Anda bisa pass data statistik di sini jika ingin
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup rute untuk profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute manajemen CRUD sekolah (hanya untuk user yang login)
    // Ini adalah halaman manajemen data sekolah untuk admin/pengguna terautentikasi
    Route::get('/sekolah/manage', [SekolahController::class, 'manage'])->name('sekolah.manage'); // Contoh halaman manajemen
    Route::get('/sekolah/create', [SekolahController::class, 'create'])->name('sekolah.create');
    Route::post('/sekolah', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::get('/sekolah/{sekolah}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/sekolah/{sekolah}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('/sekolah/{sekolah}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');
});

// Otentikasi routes dari Laravel Breeze/Jetstream
require __DIR__.'/auth.php';
