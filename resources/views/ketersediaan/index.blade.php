@extends('layouts.app')

@section('content')
    <div class="main-content">
        <!-- Header -->
        <header>
            <div>
                <h1>KETERSEDIAAN RUANGAN</h1>
                <p>Menampilkan daftar ketersediaan ruangan</p>
            </div>
           <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                 @csrf 
            <button class="logout-btn">Logout</button>
        </form>
        </header>
        
        <!-- Daftar Ketersediaan Ruangan -->
        <table class="category-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Kapasitas</th>
                    <th>Lokasi</th>
                    <th>Status Ketersediaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ruangans as $ruangan)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Menampilkan urutan no -->
                        <td>{{ $ruangan->kode_kategori }}</td>
                        <td>{{ $ruangan->kategori ? $ruangan->kategori->nama_kategori : 'Nama Kategori Tidak Tersedia' }}</td>
                        <td>{{ $ruangan->kapasitas }}</td>
                        <td>{{ $ruangan->lokasi }}</td>
                        <td>{{ $ruangan->status_ketersediaan }}</td> <!-- Menampilkan status ketersediaan -->
                    </tr>
                @endforeach
            </tbody>
        </table>

        <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
    </div>
@endsection
