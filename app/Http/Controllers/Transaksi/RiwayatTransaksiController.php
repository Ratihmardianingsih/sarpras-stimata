<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\RiwayatTransaksi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  // Pastikan Controller di-include dengan benar

class RiwayatTransaksiController extends Controller
{
    public function index()
{
    $riwayat = RiwayatTransaksi::with('peminjaman')->get();
    return view('riwayat-transaksi.index', compact('riwayat'));
}

    
    public function create()
    {
        return view('riwayat-transaksi.create');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id',
            'status' => 'required|string',
        ]);

        // Menyimpan data riwayat transaksi
        RiwayatTransaksi::create([
            'peminjaman_id' => $validatedData['peminjaman_id'],
            'status' => $validatedData['status'],
        ]);

        
        return redirect()->route('riwayat.index')->with('success', 'Riwayat transaksi berhasil disimpan!');
    }

}

