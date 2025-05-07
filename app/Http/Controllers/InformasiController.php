<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        // Ambil data ruangan
        $ruangans = Ruangan::all();

        // Kirim data ruangan ke tampilan
        return view('informasi.index', compact('ruangans'));
    }
}
