<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil data laporan yang sesuai dengan user yang sedang login
        $laporanData = Laporan::with(['user', 'ruangan'])
                            ->where('user_id', Auth::id()) // Filter berdasarkan ID user yang login
                            ->get();

        return view('laporan.index', compact('laporanData'));
    }
}