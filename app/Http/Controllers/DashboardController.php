<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah pengguna adalah admin atau peminjam
        if(auth()->user()->role == 'admin') {
            // Ambil data dari model Ruangan
            $totalRuangan = Ruangan::count();  // Total jumlah ruangan
            $ruanganTersedia = Ruangan::where('status_ketersediaan', 'tersedia')->count();  // Ketersediaan ruangan
            $ruanganDipinjam = Ruangan::where('status_ketersediaan', 'Tidak Tersedia')->count();  // Ruangan yang sedang dipinjam
            $totalruanganProses = Peminjaman::where('status', 'Menunggu')->count();  // Ruangan yang sedang dipinjam

            // Kirim data ke view dashboard admin
            return view('dashboard.admin', compact(
                'totalRuangan', 
                'ruanganTersedia', 
                'ruanganDipinjam',
                'totalruanganProses',
            ));
        } else {
            // Untuk peminjam, tampilkan dashboard peminjam
            $totalRuangan = Ruangan::count();  // Total jumlah ruangan
            $ruanganTersedia = Ruangan::where('status_ketersediaan', 'tersedia')->count();

            return view('dashboard.peminjam', compact(
               'totalRuangan', 
                'ruanganTersedia', 
            ));
        }
    }
}