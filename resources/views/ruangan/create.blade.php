@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Tambah Ruangan</h1>

        <!-- Form untuk Menambah Ruangan -->
        <form action="{{ route('ruangan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_kategori">Kode Kategori</label>
                <select name="kode_kategori" class="form-control" id="kode_kategori" required>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->kode_kategori }}" 
                                data-nama="{{ $kategori->nama_kategori }}" 
                                data-nama-ruangan="{{ $kategori->nama_ruangan }}" 
                                data-kapasitas="{{ $kategori->kapasitas }}">
                            {{ $kategori->kode_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kolom untuk Nama Kategori-->
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" require>
            </div>

            <!-- Kolom untuk Nama Ruangan -->
            <div class="mb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required>
            </div>

            <!-- Kolom untuk Kapasitas Ruangan -->
            <div class="mb-3">
                <label for="kapasitas_ruangan" class="form-label">Kapasitas Ruangan</label>
                <input type="number" class="form-control" id="kapasitas_ruangan" name="kapasitas" required>
            </div>

            <!-- Kolom untuk Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>

            <!-- Kolom untuk Lokasi -->
            <div class="mb-3">
                <label for="lokasi_ruangan" class="form-label">Lokasi Ruangan</label>
                <input type="text" class="form-control" id="lokasi_ruangan" name="lokasi" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Simpan Ruangan</button>
        </form>
    </div>

    <script>
        // Update Nama Kategori, Nama Ruangan dan Kapasitas otomatis berdasarkan pilihan Kode Kategori
        document.getElementById('kode_kategori').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('nama_kategori').value = selectedOption.getAttribute('data-nama');
            document.getElementById('nama_ruangan').value = selectedOption.getAttribute('data-nama-ruangan');
            document.getElementById('kapasitas_ruangan').value = selectedOption.getAttribute('data-kapasitas');
        });
    </script>
@endsection
