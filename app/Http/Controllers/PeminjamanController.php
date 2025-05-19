<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\RiwayatTransaksi;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\LaporanController;

class PeminjamanController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin') {
       
            $peminjaman = Peminjaman::where('status', 'Menunggu')->get();

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
        $ruangans = Ruangan::where('status_ketersediaan', 'Tersedia')->get();

        // $ruangans = Ruangan::all();
        return view('pinjamruangan.create', compact('ruangans'));
    }


    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'kode_ruangan' => 'required|exists:ruangans,id',
            'tanggal_peminjaman' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            'keterangan' => 'nullable|string',
        ]);
    
        Peminjaman::create([
            'user_id' => auth()->user()->id,
            'ruangan_id' => $request->kode_ruangan,
            'kode_kategori' => $request->kode_kategori,
            'kapasitas' => $request->kapasitas,
            'tanggal_pinjam' => $request->tanggal_peminjaman,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
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

    $ruangan = Ruangan::find($peminjaman->ruangan_id);
    $ruangan->status_ketersediaan = 'Tidak Tersedia';
    $ruangan->save();

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
    public function riwayatTransaksi(Request $request)
    {
        $query = RiwayatTransaksi::with('peminjaman');
    
        // Filter berdasarkan tanggal mulai dan tanggal selesai
        if ($request->has('tanggal_mulai') && $request->has('tanggal_selesai')) {
            $tanggalMulai = $request->input('tanggal_mulai');
            $tanggalSelesai = $request->input('tanggal_selesai');
    
            $query->whereHas('peminjaman', function ($query) use ($tanggalMulai, $tanggalSelesai) {
                $query->whereBetween('tanggal_pinjam', [$tanggalMulai, $tanggalSelesai]);
            });
        }
    
        $riwayat = $query->get();
    
        return view('riwayat-transaksi.index', compact('riwayat'));
    }
   public function kembalikan($id)
{
   
    $pinjam = Peminjaman::findOrFail($id);
    $pinjam->status = 'Dikembalikan';
    $pinjam->save();

    \App\Models\Laporan::create([
        'kode_kategori' => $pinjam->kode_kategori,
        'kapasitas' => $pinjam->kapasitas,
        'tanggal_pinjam' => $pinjam->tanggal_pinjam,
        'waktu_mulai' => $pinjam->waktu_mulai,
        'waktu_selesai' => $pinjam->waktu_selesai,
        'keterangan' => $pinjam->keterangan,
        'status' => 'Dikembalikan',
        'user_id' => $pinjam->user_id,
        'ruangan_id' => $pinjam->ruangan_id
    ]);

    $ruangan = Ruangan::findOrFail($pinjam->ruangan_id);
    $ruangan->status_ketersediaan = 'Tersedia';
    $ruangan->save();

    return redirect()->route('pinjamruangan.index')->with('success', 'Ruangan telah dikembalikan dan masuk laporan');
}
   
public function exportExcel()
{
    
    return Excel::download(new PeminjamanExport, 'data_peminjaman.xlsx');
}
}
