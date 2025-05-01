@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Ruangan</h1>

        <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_kategori" class="form-label">Kode Kategori</label>
                <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" value="{{ $ruangan->kode_kategori }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $ruangan->nama_kategori }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}" required>
            </div>

            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas Ruangan</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="{{ $ruangan->kapasitas }}" required>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Ruangan</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $ruangan->lokasi }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Ruangan</button>
        </form>
    </div>
@endsection
