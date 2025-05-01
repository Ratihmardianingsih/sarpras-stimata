<?php

namespace App\Http\Controllers;

use App\Models\Kategori;  // Pastikan model Kategori sudah ada
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $kategoris = Kategori::all();  // Ambil semua kategori dari database
        return view('kategori.index', compact('kategoris')); // Kirim data kategori ke view

        $kategoris = Kategori::orderBy('id', 'asc')->get(); // Mengurutkan berdasarkan id secara ascending
        return view('kategori.index', compact('kategoris'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        // Simpan data kategori ke database
        Kategori::create([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);

        // Redirect ke halaman daftar kategori
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil disimpan');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // Memperbarui kategori di database
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        // Validasi input
        $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        // Perbarui kategori
        $kategori->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);
    
        // Redirect ke halaman daftar kategori
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
    }

    // Menghapus kategori dari database
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
    
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
    
}
