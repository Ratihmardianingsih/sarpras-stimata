@extends('layouts.app')

@section('content')
    <div class="main-content">
        <!-- Header -->
        <header>
            <div class="header-left">
                <h1>KATEGORI RUANGAN</h1>
                <p>Menampilkan kategori ruangan yang tersedia</p>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf <!-- Menambahkan CSRF token untuk keamanan -->
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        </header>
        <!-- Button Tambah Kategori -->
        <a href="{{ route('kategori.create') }}" class="add-category-btn">Tambah Kategori</a>
          <!-- Menampilkan Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Daftar Kategori -->
         <div>
        <table class="category-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategoris as $index => $kategori)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kategori->kode_kategori }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="edit-btn">EDIT</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori?');">
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