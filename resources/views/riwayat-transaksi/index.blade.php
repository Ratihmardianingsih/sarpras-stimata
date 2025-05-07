@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Riwayat Transaksi</h1>

        <!-- Tabel Riwayat Transaksi -->
        <table class="table table-bordered">
            <thead>
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
                @foreach ($riwayat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->peminjaman->kode_kategori ?? 'Data tidak ditemukan' }}</td>
                        <td>{{ $item->peminjaman->peminjam->name ?? 'Data tidak ditemukan' }}</td>
                        <td>{{ $item->peminjaman->ruangan->nama_ruangan ?? 'Data tidak ditemukan' }}</td>
                        <td>{{ $item->peminjaman->kapasitas ?? 'Data tidak ditemukan' }}</td>
                        <td>{{ $item->peminjaman->tanggal_pinjam ?? 'Data tidak ditemukan' }}</td>
                        <td>{{ $item->peminjaman->keterangan ?? 'Data tidak ditemukan' }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
