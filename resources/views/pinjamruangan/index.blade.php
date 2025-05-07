@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Pinjam Ruang</h1>

        <a href="{{ route('pinjamruangan.create') }}" class="btn btn-primary mb-3">Pinjam Ruangan</a>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Peminjam</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Tanggal Pinjam</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $pinjam)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pinjam->kode_kategori }}</td>
                        <td>{{ $pinjam->peminjam->name }}</td>
                        <td>{{ $pinjam->ruangan->nama_ruangan }}</td>
                        <td>{{ $pinjam->kapasitas }}</td>
                        <td>{{ $pinjam->tanggal_pinjam }}</td>
                        <td>{{ $pinjam->keterangan }}</td>
                        <td>{{ $pinjam->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
