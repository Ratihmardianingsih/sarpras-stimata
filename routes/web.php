<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KetersediaanController;
use App\Http\Controllers\Transaksi\RiwayatTransaksiController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\InformasiController;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RuanganExport;



/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Di sini Anda dapat mendaftarkan rute-rute web untuk aplikasi Anda. 
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan 
| diberikan ke grup middleware "web". Buat sesuatu yang hebat!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Hanya satu route untuk '/dashboard'
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role == 'admin') {
            return view('dashboard.admin'); // Dashboard untuk admin
        } else {
            return view('dashboard.peminjam'); // Dashboard untuk peminjam
        }
    })->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

    


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
        Route::get('/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
        Route::post('/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');
        Route::get('/ruangan/{ruangan}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
        Route::put('/ruangan/{ruangan}', [RuanganController::class, 'update'])->name('ruangan.update');
        Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');

        Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/data-peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');});

        Route::middleware(['auth', 'role:peminjam'])->group(function () {
        Route::get('/pinjam-ruangan', [PeminjamanController::class, 'index'])->name('pinjamruangan.index');
        Route::get('/pinjam-ruangan/create', [PeminjamanController::class, 'createPinjam'])->name('pinjamruangan.create');});
        Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::post('/pinjam-ruangan/kembalikan/{id}', [PeminjamanController::class, 'kembalikan'])->name('pinjamruangan.kembalikan');

        Route::post('/peminjaman/{id}/terima', [PeminjamanController::class, 'terima'])->name('peminjaman.terima');
        Route::post('/peminjaman/{id}/tolak', [PeminjamanController::class, 'tolak'])->name('peminjaman.tolak');

        Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');

        Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
        Route::resource('kategori', KategoriController::class);

        Route::get('/ketersediaan', [KetersediaanController::class, 'index'])->name('ketersediaan.index');
        Route::get('/ketersediaan-ruangan', [RuanganController::class, 'availability'])->name('ketersediaan.ruangan');

        Route::get('/riwayat-transaksi', [RiwayatTransaksiController::class, 'index'])->name('riwayat-transaksi.index');
        Route::resource('riwayat-transaksi', RiwayatTransaksiController::class);
        Route::get('/riwayat-transaksi', [PeminjamanController::class, 'riwayatTransaksi'])->name('riwayat.transaksi');

        Route::get('/ruangan/export/pdf', [RuanganController::class, 'exportPDF'])->name('ruangan.export.pdf');
        Route::get('/ruangan/export/excel', [RuanganController::class, 'exportExcel'])->name('ruangan.export.excel');

        // Rute untuk logout
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });


Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});





require __DIR__.'/auth.php';
