@extends('layouts.app')

@section('content')
    <div class="main-content1">
        <header>
            <div>
                <h1>Form Edit Ruangan</h1>
            </div>
           <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf <!-- Menambahkan CSRF token untuk keamanan -->
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        </header>

        <!-- Form Edit Ruangan -->
        <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST" class="add-room-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode_kategori">Kode Kategori</label>
                <select id="kode_kategori" name="kode_kategori" class="form-control" required>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->kode_kategori }}" 
                                @if($kategori->kode_kategori == $ruangan->kode_kategori) selected @endif>
                            {{ $kategori->kode_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" 
                       value="{{ old('nama_kategori', $ruangan->kategori->nama_kategori) }}" required>
            </div>

            <div class="form-group">
                <label for="nama_ruangan">Nama Ruangan</label>
                <input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control" 
                       value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}" required>
            </div>

            <div class="form-group">
                <label for="kapasitas">Kapasitas Ruangan</label>
                <input type="number" id="kapasitas" name="kapasitas" class="form-control" 
                       value="{{ old('kapasitas', $ruangan->kapasitas) }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" required>{{ old('deskripsi', $ruangan->deskripsi) }}</textarea>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" 
                       value="{{ old('lokasi', $ruangan->lokasi) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Ruangan</button>
        </form>

        <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
    </div>

</body>
</html>