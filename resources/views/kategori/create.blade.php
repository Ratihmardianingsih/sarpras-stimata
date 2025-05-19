@extends('layouts.app')

@section('content')
     <div class="main-content1">
        <header>
            <div>
                <h1>Form Tambah Kategori</h1>
                 <p>Form untuk menambah kategori ruangan.</p>
            </div>
        </header>

        <!-- Form Tambah Kategori -->
        <form action="{{ route('kategori.store') }}" method="POST" class="add-category-form">
            @csrf
            <div class="form-group">
                <label for="kode_kategori">Kode Kategori</label>
                <input type="text" id="kode_kategori" name="kode_kategori" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan kategori</button>
        </form>

        <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
    </div>
</body>
</html>