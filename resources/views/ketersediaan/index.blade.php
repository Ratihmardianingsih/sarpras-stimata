@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <h1 class="my-4">Ketersediaan Ruangan</h1>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kategori</th>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Lokasi</th>
                        <th>Status Ketersediaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangans as $ruangan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ruangan->kode_kategori }}</td>
                            <td>{{ $ruangan->nama_ruangan }}</td>
                            <td>{{ $ruangan->kapasitas }}</td>
                            <td>{{ $ruangan->lokasi }}</td>
                            <td>{{ $ruangan->status_ketersediaan }}</td> <!-- Menampilkan status ketersediaan -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
