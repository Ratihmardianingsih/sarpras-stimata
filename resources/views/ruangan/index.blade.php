@extends('layouts.app')

@section('content')
    <div class="main-content">
        <!-- Header -->
        <header>
            <div>
                <h1>DAFTAR RUANGAN</h1>
                <p>Menampilkan daftar ruangan yang tersedia</p>
            </div>
           <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                 @csrf 
            <button class="logout-btn">Logout</button>
</form>
        </header>

        <!-- Button Tambah Ruangan -->
        <a href="{{ route('ruangan.create') }}" class="add-room-btn">Tambah Ruangan</a>

        <!-- Menampilkan Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Daftar Ruangan -->
        <table class="category-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan daftar ruangan -->
                @foreach($ruangans as $ruangan)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Menampilkan urutan no -->
                        <td>{{ $ruangan->kode_kategori }}</td>
                        <td>{{ $ruangan->kategori ? $ruangan->kategori->nama_kategori : 'Nama Kategori Tidak Tersedia' }}</td> <!-- Menampilkan Nama Kategori -->
                        <td>{{ $ruangan->nama_ruangan }}</td>
                        <td>{{ $ruangan->kapasitas }}</td>
                        <td>{{ $ruangan->deskripsi }}</td>
                        <td>{{ $ruangan->lokasi }}</td>
                        <td>
                            <!-- Edit button -->
                            <a href="{{ route('ruangan.edit', $ruangan->id) }}" class="edit-btn">EDIT</a>

                            <!-- Hapus button -->
                            <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori?');">
                                @csrf
                                @method('DELETE') <!-- Menambahkan metode DELETE -->
                                <button type="submit" class="delete-btn">HAPUS</button>
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
