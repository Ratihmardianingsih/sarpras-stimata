@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Informasi Ruangan</h1>

        <!-- Tabel Ruangan -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informasi as $index => $ruangan)  <!-- Pastikan variabel yang digunakan sesuai -->
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $ruangan->kode_kategori }}</td>
                        <td>{{ $ruangan->nama_ruangan }}</td>
                        <td>{{ $ruangan->kapasitas }}</td>
                        <td>{{ $ruangan->lokasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
