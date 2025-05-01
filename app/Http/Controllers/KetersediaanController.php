<?php

namespace App\Http\Controllers;

use App\Models\Ruangan; 
use Illuminate\Http\Request;

class KetersediaanController extends Controller
{
    public function index()
    {
        // Ambil data ruangan dari database
        $ruangans = Ruangan::all(); // Mengambil semua data ruangan
        
        // Menambahkan logika untuk menampilkan status ketersediaan
        foreach ($ruangans as $ruangan) {
            // Tentukan status ketersediaan berdasarkan kapasitas atau kondisi lainnya
            $ruangan->status_ketersediaan = $ruangan->kapasitas > 0 ? 'Tersedia' : 'Tidak Tersedia';
        }
        
        return view('ketersediaan.index', compact('ruangans')); // Mengirim data ke view
    }
}