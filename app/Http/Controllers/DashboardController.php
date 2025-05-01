<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah pengguna adalah admin atau peminjam
        if(auth()->user()->role == 'admin') {
            return view('dashboard.admin'); // Jika admin, tampilkan dashboard admin
        } else {
            return view('dashboard.peminjam'); // Jika peminjam, tampilkan dashboard peminjam
        }
    {
        // Ambil data dari model Ruangan
        $totalRuangan = Ruangan::count();  // Total jumlah ruangan
        $ruanganTersedia = Ruangan::where('status', 'tersedia')->count();  // Ketersediaan ruangan
        $ruanganDipinjam = Ruangan::where('status', 'dipinjam')->count();  // Ruangan yang sedang dipinjam

        // Kirim data ke view dashboard
        return view('dashboard', compact(
            'totalRuangan', 
            'ruanganTersedia', 
            'ruanganDipinjam'
        ));
        }
    }
}