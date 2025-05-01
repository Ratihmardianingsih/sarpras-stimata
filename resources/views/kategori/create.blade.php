@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Tambah Kategori Ruangan</h1>

        <!-- Form Tambah Kategori -->
        <form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kode_kategori">Kode Kategori</label>
        <input type="text" name="kode_kategori" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <textarea name="nama_kategori" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan Kategori</button>
</form>

@endsection
