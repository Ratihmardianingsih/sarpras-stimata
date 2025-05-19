@extends('layouts.app')

@section('content')
    <div class="main-content">
        <header>
            <div>
                <h1>LAPORAN</h1>
                <p>Menampilkan laporan ketersediaan ruangan</p>
            </div>
             <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf <!-- Menambahkan CSRF token untuk keamanan -->
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        </header>

        <!-- Button Export -->
        <div class="export-btns">
            <a href="{{ route('riwayat.export.pdf') }}" class="export-btn">Export PDF</a>
            <a href="{{ route('riwayat.export.excel') }}" class="export-btn">Export Excel</a>
        </div>

        <!-- Filter -->
        <div class="filter">
            <form action="{{ route('riwayat.transaksi') }}" method="GET">
                <input type="date" name="tanggal_mulai" placeholder="Tanggal mulai" value="{{ request('tanggal_mulai') }}">
                <input type="date" name="tanggal_selesai" placeholder="Tanggal selesai" value="{{ request('tanggal_selesai') }}">
                <button type="submit">Filter</button>
            </form>
        </div>

        <!-- Daftar Laporan -->
        <table class="category-table">
            <thead>
                <tr>
                    <th>NO</th>
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

        <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
    </div>
@endsection
