@extends('layouts.app')

@section('content')
    <div class="main-content">
                <header>
            <div>
                <h1>Form Pinjam Ruangan</h1>
            </div>
            <button class="logout-btn">Logout</button>
        </header>


        <!-- Form Peminjaman -->
        <form action="{{ route('peminjaman.store') }}" method="POST" class="add-room-form">
            @csrf

             <!-- Nama Ruangan -->
             <div class="mb-3">
                <label for="kode_ruangan" class="form-label">Pilih Ruangan</label>
                <select class="form-select" name="kode_ruangan" id="kode_ruangan" required>
                    <option selected disabled>-- Pilih Ruangan --</option>
                    @foreach ($ruangans as $ruangan)
                        <option value="{{ $ruangan->id }}" data-kode="{{ $ruangan->kode_kategori }}" data-kapasitas="{{ $ruangan->kapasitas }}">{{ $ruangan->nama_ruangan }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Peminjam -->
            <div class="mb-3">
                <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ auth()->user()->name }}" required>
            </div>

            <!-- Kode Kategori (Otamatiskan) -->
            <div class="mb-3">
                <label for="kode_kategori" class="form-label">Kode Kategori</label>
                <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" value="{{ old('kode_kategori') }}" required>
            </div>

            <!-- Kapasitas Ruangan (Otamatiskan) -->
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas Ruangan</label>
                <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}" required>
            </div>

           <!-- Tanggal dan Waktu Pinjam -->
            <div class="mb-3">
                <label for="tanggal_peminjaman" class="form-label">Tanggal dan Waktu Pinjam</label>
                <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}" required>
            </div>

            <div class="mb-3">
                <label for="waktu_mulai">Waktu Mulai</label>
                <input type="time" id="waktu_mulai" name="waktu_mulai" required>
            </div>

            <div class="mb-3">
                <label for="waktu_selesai">Waktu Selesai</label>
                <input type="time" id="waktu_selesai" name="waktu_selesai" required>
            </div>

            <!-- Keterangan -->
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
        </form>
    </div>
 <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
    <!-- JavaScript untuk mengupdate Kode Kategori dan Kapasitas -->
    <script>
        document.getElementById('kode_ruangan').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var kodeKategori = selectedOption.getAttribute('data-kode');
            var kapasitas = selectedOption.getAttribute('data-kapasitas');

            // Update the Kode Kategori and Kapasitas fields
            document.getElementById('kode_kategori').value = kodeKategori;
            document.getElementById('kapasitas').value = kapasitas;
        });
    </script>
    </div>
@endsection