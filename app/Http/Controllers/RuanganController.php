<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request; 

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::with('kategori')->get();
        return view('ruangan.index', compact('ruangans'));
    }

    public function create()
    {
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('ruangan.create', compact('kategoris')); // Menampilkan view form untuk membuat ruangan
    }

    public function store(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'kode_kategori' => 'required|string|max:255',
            'nama_kategori' => 'required|string|max:255',
            'nama_ruangan' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'lokasi' => 'required|string|max:255',
        ]);
        
        Ruangan::create([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
            'nama_ruangan' => $request->nama_ruangan,
            'kapasitas' => $request->kapasitas,
            'lokasi' => $request->lokasi,
        ]);

        // Redirect setelah berhasil menyimpan
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }
    public function edit($id)
{
    // Mengambil data ruangan berdasarkan ID
    $ruangan = Ruangan::findOrFail($id);
    return view('ruangan.edit', compact('ruangan'));
}

public function update(Request $request, $id)
{
    // Validasi data yang diinputkan
    $validatedData = $request->validate([
        'kode_kategori' => 'required',
        'nama_kategori' => 'required',
        'nama_ruangan' => 'required',
        'kapasitas' => 'required|numeric',
        'lokasi' => 'required',
    ]);

    // Menemukan ruangan berdasarkan ID dan memperbarui datanya
    $ruangan = Ruangan::findOrFail($id);
    $ruangan->update($validatedData);

    return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diperbarui');
}

public function destroy($id)
{
    // Menemukan ruangan berdasarkan ID
    $ruangan = Ruangan::findOrFail($id);
    $ruangan->delete();

    // Redirect setelah berhasil menghapus
    return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus');
}

}
    
