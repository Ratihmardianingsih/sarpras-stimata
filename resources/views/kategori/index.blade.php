@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Halaman Kategori Ruangan</h1>

        <!-- Button Tambah Kategori -->
        <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Daftar Kategori -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan daftar kategori -->
                @foreach($kategoris as $index => $kategori)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor berdasarkan index -->
                        <td>{{ $kategori->kode_kategori }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
