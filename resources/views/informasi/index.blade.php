@extends('layouts.app')

@section('content')
  <div class="main-content1">
    <header>
        <div>
            <h1>INFORMASI RUANGAN</h1>
            <p> Baca informasi selengkapnya ada di Detail. </P>
        </div>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                 @csrf 
            <button class="logout-btn">Logout</button>
    </header>

    <!-- Tabel Informasi Ruangan -->
    <table class="category-table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode Kategori</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($informasi as $index => $ruangan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ruangan->kode_kategori }}</td>
                    <td>{{ $ruangan->nama_ruangan }}</td>
                    <td>{{ $ruangan->kapasitas }}</td>
                    <td>{{ $ruangan->lokasi }}</td>
                    <td>
  <button class="btn btn-info" onclick="showModal({{ $ruangan->id }})">Detail</button>

  <!-- Modal -->
  <div id="modal-{{ $ruangan->id }}" class="modal">
    <div class="modal-content">
      <span class="close" onclick="hideModal({{ $ruangan->id }})">&times;</span>
      <h3>{{ $ruangan->nama_ruangan }}</h3>
      <p><strong>Lokasi:</strong> {{ $ruangan->lokasi }}</p>
      <p><strong>Kapasitas:</strong> {{ $ruangan->kapasitas }} orang</p>
      <p><strong>Keterangan:</strong> {{ $ruangan->deskripsi ?? 'Informasi tidak tersedia.' }}</p>
      <p><strong>Fasilitas:</strong> {{ $ruangan->fasilitas ?? '-' }}</p>
    </div>
  </div>
</td>
                </tr>
            @endforeach
        </tbody>
        <script>
  function showModal(id) {
    document.getElementById('modal-' + id).style.display = 'block';
  }

  function hideModal(id) {
    document.getElementById('modal-' + id).style.display = 'none';
  }

  // Optional: tutup modal saat klik di luar kotak
  window.onclick = function(event) {
    document.querySelectorAll('.modal').forEach(modal => {
      if (event.target === modal) modal.style.display = "none";
    });
  };
</script>
    </table>

    <footer>
        <p>Copyright @Stimata2025</p>
    </footer>
</div>

