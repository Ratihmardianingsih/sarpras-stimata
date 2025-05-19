@extends('layouts.app')

@section('content')
    <div class="main-content1">
    <header>
        <div>
            <h1>PINJAM RUANGAN</h1>
        </div>
       <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                 @csrf 
            <button class="logout-btn">Logout</button>
        </form>
    </header>

     <a href="{{ route('pinjamruangan.create') }}" class="btn btn-primary mb-3">Pinjam Ruangan</a>
   @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <!-- Tabel Pinjam Ruangan -->
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $pinjam)
                @if($pinjam->status != 'Dikembalikan')
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
                        <td>{{ $pinjam->status }}</td>
                        <td>
                            <!-- Form untuk mengembalikan peminjaman -->
                            <form action="{{ route('pinjamruangan.kembalikan', $pinjam->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning">Kembalikan</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
