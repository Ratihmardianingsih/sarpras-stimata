@extends('layouts.app')

@section('content')
    <div class="main-content">
        <header>
            <div>
                <h1>DATA PEMINJAM</h1>
                <p>Menampilkan data peminjam ruangan</p>
            </div>
           <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf <!-- Menambahkan CSRF token untuk keamanan -->
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        </header>

        <!-- Daftar Data Peminjam -->
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
                            <!-- Form untuk menerima peminjaman -->
                            <form action="{{ route('peminjaman.terima', $pinjam->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="approve-btn">Terima</button>
                            </form>

                            <!-- Form untuk menolak peminjaman -->
                            <form action="{{ route('peminjaman.tolak', $pinjam->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="reject-btn">Tolak</button>
                            </form>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>

        <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
    </div>
@endsection
