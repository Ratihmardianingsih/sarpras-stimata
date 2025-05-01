@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kategori Ruangan</h1>

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode_kategori">Kode Kategori</label>
                <input type="text" name="kode_kategori" class="form-control" value="{{ $kategori->kode_kategori }}" required>
             </div>

             <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <textarea name="nama_kategori" class="form-control">{{ $kategori->nama_kategori }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Kategori</button>
        </form>
    </div>
@endsection
