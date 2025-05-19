@extends('layouts.app')

@section('content')
     <div class="main-content1">
        <header>
            <div>
                <h1>Form Tambah Ruangan</h1>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf <!-- Menambahkan CSRF token untuk keamanan -->
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        </header>

        <!-- Form Tambah Ruangan -->
        <form action="{{ route('ruangan.store') }}" method="POST" class="add-room-form">
            @csrf
            <div class="form-group">
                <label for="kode_kategori">Kode Kategori</label>
                <select id="kode_kategori" name="kode_kategori" class="form-control" required>
                    <option value="">Pilih Kode Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->kode_kategori }}" 
                                data-nama="{{ $kategori->nama_kategori }}" 
                                data-nama-ruangan="{{ $kategori->nama_ruangan }}" 
                                data-kapasitas="{{ $kategori->kapasitas }}">
                            {{ $kategori->kode_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nama_ruangan">Nama Ruangan</label>
                <input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="kapasitas">Kapasitas Ruangan</label>
                <input type="number" id="kapasitas" name="kapasitas" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Ruangan</button>
        </form>

        <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
    </div>

    <script>
        // Update Nama Kategori, Nama Ruangan dan Kapasitas otomatis berdasarkan pilihan Kode Kategori
        document.getElementById('kode_kategori').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('nama_kategori').value = selectedOption.getAttribute('data-nama');
            document.getElementById('nama_ruangan').value = selectedOption.getAttribute('data-nama-ruangan');
            document.getElementById('kapasitas').value = selectedOption.getAttribute('data-kapasitas');
        });
    </script>
</body>
</html>