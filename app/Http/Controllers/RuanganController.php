<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request; 
use App\Models\Kategori; // Ini yang benar untuk mengakses model Kategori



class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::all();
        return view('ruangan.index', compact('ruangans'));
    }

    public function create()
    {
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('ruangan.create', compact('kategoris')); // Menampilkan view form untuk membuat ruangan
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_kategori' => 'required|string|max:255',
            'nama_kategori' => 'required|string|max:255',
            'nama_ruangan' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);
    
        // Ambil nama kategori berdasarkan kode_kategori yang dipilih
        $kategori = Kategori::where('kode_kategori', $request->kode_kategori)->first();
    
        // Jika kategori ditemukan, simpan ruangan baru
        if ($kategori) {
            Ruangan::create([
                'kode_kategori' => $request->kode_kategori,
                'nama_kategori' => $kategori->nama_kategori, // Mengambil nama kategori dari model Kategori
                'nama_ruangan' => $request->nama_ruangan,
                'kapasitas' => $request->kapasitas,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
            ]);
        } else {
            return redirect()->route('ruangan.create')->with('error', 'Kategori tidak ditemukan!');
        }
    
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan');
    }    

    
    public function edit($id)
    {
      
        $ruangan = Ruangan::findOrFail($id);
        $kategori = Kategori::where('kode_kategori', $ruangan->kode_kategori)->first();
        $kategoris = Kategori::all();
        
        return view('ruangan.edit', compact('ruangan', 'kategoris', 'kategori'));
    }
    
public function update(Request $request, $id)
{
    // Validasi data yang diinputkan
    $validatedData = $request->validate([
        'kode_kategori' => 'required',
        'nama_kategori' => 'required',
        'nama_ruangan' => 'required',
        'deskripsi' => 'required',
        'kapasitas' => 'required|numeric',
        'lokasi' => 'required',
    ]);

    // Menemukan ruangan berdasarkan ID
    $ruangan = Ruangan::findOrFail($id);

    // Ambil nama kategori berdasarkan kode_kategori yang dipilih
    $kategori = Kategori::where('kode_kategori', $request->kode_kategori)->first();
    
    // Pastikan kategori ditemukan sebelum memperbarui data
    if ($kategori) {
        // Memperbarui data ruangan
        $ruangan->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $kategori->nama_kategori, // Memperbarui nama_kategori sesuai kategori yang dipilih
            'nama_ruangan' => $request->nama_ruangan,
            'kapasitas' => $request->kapasitas,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
        ]);
        
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diperbarui');
    } else {
        return redirect()->route('ruangan.edit', $id)->with('error', 'Kategori tidak ditemukan');
    }
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
    
