<?php

use App\Http\Controllers\Dashboard\BarangKeluarController;
use App\Http\Controllers\Dashboard\BarangMasukController;
use App\Http\Controllers\Dashboard\ReturController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->name('dashboard.')->group(function(){
        // barang masuk
        Route::get('barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk');
        Route::get('barang-masuk/create', [BarangMasukController::class, 'create'])->name('barang-masuk.create');
        Route::post('barang-masuk/create', [BarangMasukController::class, 'store'])->name('barang-masuk.create');
        Route::get('barang-masuk/{id}/cek', [BarangMasukController::class, 'cekKualitas'])->name('barang-masuk.cek');
        Route::post('barang-masuk/{id}/cek', [BarangMasukController::class, 'cekKualitasStore'])->name('barang-masuk.cek');

        // retur
        Route::get('retur/supplier', [ReturController::class, 'index'])->name('retur.supplier');
        Route::get('retur/supplier/{namaSupplier}/barang-rusak', [ReturController::class, 'detailBarangRusak'])->name('retur.supplier.barang-rusak');
        Route::post('retur/supplier/{namaSupplier}/create-laporan', [ReturController::class, 'createRetur'])->name('retur.laporan.create');
        // laporan retur
        Route::get('retur/laporan/{id}', [ReturController::class, 'detailLaporanRetur'])->name('retur.laporan');
        // barang keluar
        Route::get('barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar');
        Route::get('barang-keluar/create', [BarangKeluarController::class, 'create'])->name('barang-keluar.create');
        Route::post('barang-keluar/create', [BarangKeluarController::class, 'store'])->name('barang-keluar.store');
        // user
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user/create', [UserController::class, 'store'])->name('user.store');
        Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('user/{id}/edit', [UserController::class, 'update'])->name('user.update');
        Route::delete('user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');

    });
});

require __DIR__ . '/auth.php';
