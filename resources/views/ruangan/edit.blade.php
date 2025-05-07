@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Ruangan</h1>

        <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Kode Kategori -->
            <div class="mb-3">
                <label for="kode_kategori" class="form-label">Kode Kategori</label>
                <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" 
                       value="{{ old('kode_kategori', $kategori->kode_kategori) }}" require>

            <!-- Nama Kategori -->
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" 
                       value="{{ old('nama_kategori', $kategori->nama_kategori) }}" require>
            </div>

            <!-- Nama Ruangan -->
            <div class="mb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}" re>
            </div>

            <!-- Kapasitas Ruangan -->
            <div class="mb-3">
                <label for="kapasitas_ruangan" class="form-label">Kapasitas Ruangan</label>
                <input type="number" class="form-control" id="kapasitas_ruangan" name="kapasitas" value="{{ old('kapasitas', $ruangan->kapasitas) }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $ruangan->deskripsi) }}" required>
            </div>

            <!-- Lokasi Ruangan -->
            <div class="mb-3">
                <label for="lokasi_ruangan" class="form-label">Lokasi Ruangan</label>
                <input type="text" class="form-control" id="lokasi_ruangan" name="lokasi" value="{{ old('lokasi', $ruangan->lokasi) }}" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Update Ruangan</button>
        </form>
    </div>
@endsection
