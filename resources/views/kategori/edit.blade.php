@extends('layouts.app')

@section('content')
    <div class="main-content1">
        <header>
            <div>
                <h1>Edit Kategori Ruangan</h1>
                <p>Form untuk mengedit kategori ruangan yang sudah ada.</p>
            </div>
        </header>

        <!-- Form Edit Kategori -->
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="add-category-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_kategori">Kode Kategori</label>
                <input type="text" id="kode_kategori" name="kode_kategori" class="form-control" value="{{ $kategori->kode_kategori }}" required>
            </div>
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Kategori</button>
        </form>

        <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
    </div>
</body>
</html>