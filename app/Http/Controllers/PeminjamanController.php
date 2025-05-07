<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\RiwayatTransaksi;

class PeminjamanController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin') {
       
            $peminjaman = Peminjaman::where('status', 'Menunggu')->get();

            // dd($peminjaman);
            return view('peminjaman.index', compact('peminjaman'));  
        } else {
            // Untuk peminjam, tampilkan data peminjamannya sendiri
            $peminjaman = Peminjaman::where('user_id', auth()->user()->id)->get(); 
            return view('pinjamruangan.index', compact('peminjaman'));  
        }
    }

    // Halaman untuk form pinjam ruangan
    public function createPinjam()
    {
        // Ambil data ruangan yang tersedia
        $ruangans = Ruangan::all();
        return view('pinjamruangan.create', compact('ruangans'));
    }


    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_ruangan' => 'required|exists:ruangans,id',
            'tanggal_peminjaman' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);
    
        Peminjaman::create([
            'user_id' => auth()->user()->id,
            'ruangan_id' => $request->kode_ruangan,
            'kode_kategori' => $request->kode_kategori,
            'kapasitas' => $request->kapasitas,
            'tanggal_pinjam' => $request->tanggal_peminjaman,
            'status' => 'Menunggu',
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diajukan!');
    }    
    
    public function terima($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->status = 'Diterima';
    $peminjaman->save();

    RiwayatTransaksi::create([
        'peminjaman_id' => $peminjaman->id,
        'status' => 'Diterima'
    ]);
    
    return redirect()->route('peminjaman.index')->with('success', 'Peminjaman diterima!');
}
    public function tolak($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'Ditolak'; // Ubah status menjadi ditolak
        $peminjaman->save();
    
        // Simpan ke Riwayat Transaksi
        RiwayatTransaksi::create([
            'peminjaman_id' => $peminjaman->id,
            'status' => 'Ditolak',
        ]);
    
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman ditolak');
    }

}
