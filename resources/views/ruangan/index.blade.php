@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Daftar Ruangan</h1>

        <!-- Button Tambah Ruangan -->
        <a href="{{ route('ruangan.create') }}" class="btn btn-primary mb-3">Tambah Ruangan</a>

        <!-- Button Export -->
        <a href="{{ route('ruangan.export.pdf') }}" class="btn btn-danger mb-3">Export PDF</a>
        <a href="{{ route('ruangan.export.excel') }}" class="btn btn-success mb-3">Export Excel</a>

                @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
                @endif

        <!-- Daftar Ruangan -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan daftar ruangan -->
                @foreach($ruangans as $ruangan)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Menampilkan urutan no -->
                        <td>{{ $ruangan->kode_kategori }}</td>
                        <td>{{ $ruangan->kategori ? $ruangan->kategori->nama_kategori : 'Nama Kategori Tidak Tersedia' }}</td> <!-- Menampilkan Nama Kategori -->
                        <td>{{ $ruangan->nama_ruangan }}</td>
                        <td>{{ $ruangan->kapasitas }}</td>
                        <td>{{ $ruangan->deskripsi }}</td>
                        <td>{{ $ruangan->lokasi }}</td>
                        <td>
                            <!-- Edit button -->
                            <a href="{{ route('ruangan.edit', $ruangan->id) }}" class="btn btn-warning">Edit</a>

                            <!-- Hapus button -->
                            <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ruangan?');">
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
