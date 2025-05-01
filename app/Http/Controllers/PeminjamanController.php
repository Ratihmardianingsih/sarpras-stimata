<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function create()
    {
        $ruangans = Ruangan::all();
        return view('peminjaman.create', compact('ruangans'));
    }

    public function index()
    {
    $peminjamans = Peminjaman::with('ruangan', 'user')->latest()->get(); // assuming relasi sudah ada
    return view('peminjaman.index', compact('peminjamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruangan_id' => 'required',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
        ]);

        Peminjaman::create([
            'user_id' => auth()->id(),
            'ruangan_id' => $request->ruangan_id,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'status' => 'menunggu',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diajukan!');
    }
}

