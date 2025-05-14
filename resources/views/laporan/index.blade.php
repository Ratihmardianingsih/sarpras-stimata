
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Riwayat Peminjaman Ruang</h1>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Peminjam</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Tanggal Pinjam</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporanData as $laporan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $laporan->kode_kategori }}</td>
                <td>{{ $laporan->user ? $laporan->user->name : 'Tidak Ada Pemimjam' }}</td> <!-- Pastikan user tidak null -->
                <td>{{ $laporan->ruangan ? $laporan->ruangan->nama_ruangan : 'Tidak Ada Ruangan' }}</td> <!-- Pastikan ruangan tidak null -->
                <td>{{ $laporan->kapasitas }}</td>
                <td>{{ $laporan->tanggal_pinjam }}</td>
                <td>{{ $laporan->waktu_mulai }}</td>
                <td>{{ $laporan->waktu_selesai }}</td>
                <td>{{ $laporan->keterangan }}</td>
                <td>{{ $laporan->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
