<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;


class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        return view('informasi.index', compact('informasi'));
    }
}
