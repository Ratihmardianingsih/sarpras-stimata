<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\RiwayatTransaksi;
use App\Exports\RiwayatTransaksiExport;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

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
public function exportPDF(Request $request)
{
 
    $riwayat = RiwayatTransaksi::query();

    if ($request->has('tanggal_mulai') && $request->has('tanggal_selesai')) {
        $riwayat->whereBetween('tanggal_pinjam', [$request->tanggal_mulai, $request->tanggal_selesai]);
    }

    $riwayat = $riwayat->get();

    $pdf = PDF::loadView('riwayat-transaksi.export_pdf', compact('riwayat'));
    return $pdf->download('riwayat_transaksi.pdf');
}
public function exportExcel(Request $request)
{
    // Ambil data berdasarkan filter
    $riwayat = RiwayatTransaksi::query();

    if ($request->has('tanggal_mulai') && $request->has('tanggal_selesai')) {
        $riwayat->whereBetween('tanggal_pinjam', [$request->tanggal_mulai, $request->tanggal_selesai]);
    }

    $riwayat = $riwayat->get();

    return Excel::download(new RiwayatTransaksiExport($riwayat), 'riwayat_transaksi.xlsx');
}
}

