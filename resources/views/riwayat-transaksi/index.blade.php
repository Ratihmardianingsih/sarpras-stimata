@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Riwayat Transaksi</h1>

        <!-- Tabel Riwayat Transaksi -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Peminjam</th> <!-- Mengganti nama_pembeli dengan nama_peminjam -->
                    <th>Jumlah</th>
                    <th>Status Transaksi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id }}</td>
                        <td>{{ $transaksi->nama_peminjam }}</td> <!-- Pastikan nama_peminjam ada di data -->
                        <td>{{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $transaksi->status }}</td>
                        <td>{{ $transaksi->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{{ route('riwayat-transaksi.show', $transaksi->id) }}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
