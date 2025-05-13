@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Data Peminjaman</h1>

         <!-- Tombol Export PDF dan Excel -->
        <div class="mb-3">
            <a href="{{ route('peminjaman.exportPDF') }}" class="btn btn-primary">Export PDF</a>
            <a href="{{ route('peminjaman.exportExcel') }}" class="btn btn-success">Export Excel</a>
        </div>
        
        <table class="table table-bordered">
            <thead class="table-light">
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
                    <th>Aksi</th> <!-- Aksi untuk admin -->
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
                        <td>{{ $pinjam->waktu_mulai }}</td>
                        <td>{{ $pinjam->waktu_selesai }}</td>
                        <td>{{ $pinjam->keterangan }}</td>
                        <td>
                            <!-- Form untuk menerima peminjaman -->
                            <form action="{{ route('peminjaman.terima', $pinjam->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Terima</button>
                            </form>

                            <!-- Form untuk menolak peminjaman -->
                            <form action="{{ route('peminjaman.tolak', $pinjam->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                        </td>
                        </td>
                    </tr>             
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
