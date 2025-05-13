@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Riwayat Transaksi</h1>

         <!-- Form Filter berdasarkan Tanggal -->
         <form action="{{ route('riwayat.transaksi') }}" method="GET">
            <div class="form-row">
                <div class="col-md-3">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}">
                </div>
                <div class="col-md-3">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>
        </form>

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
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
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
                        <td>{{ $item->peminjaman->waktu_mulai ?? 'Data tidak ditemukan' }}</td>
                        <td>{{ $item->peminjaman->waktu_selesai ?? 'Data tidak ditemukan' }}</td>
                        <td>{{ $item->peminjaman->keterangan ?? 'Data tidak ditemukan' }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
