<?php

namespace App\Http\Controllers\Transaksi; // Namespace sesuai dengan subfolder

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Mengimpor Controller yang benar
use App\Models\Transaksi;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = $transaksis = [
            (object)[ 'id' => 1, 'nama_peminjam' => 'John Doe', 'jumlah' => 100000, 'status' => 'Selesai', 'created_at' => now() ],
            (object)[ 'id' => 2, 'nama_peminjam' => 'Jane Doe', 'jumlah' => 200000, 'status' => 'Menunggu Pembayaran', 'created_at' => now()->subDays(1) ],
            (object)[ 'id' => 3, 'nama_peminjam' => 'Alice Smith', 'jumlah' => 150000, 'status' => 'Dibatalkan', 'created_at' => now()->subDays(2) ]
        ];
         
       
        return view('riwayat-transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        return view('riwayat-transaksi.create');
    }

    public function store(Request $request)
    {
        // Menyimpan riwayat transaksi
    }

    public function show($id)
    {
        // Menampilkan detail transaksi
    }

    public function edit($id)
    {
        // Mengedit transaksi
    }

    public function destroy($id)
    {
        // Menghapus transaksi
    }
}
